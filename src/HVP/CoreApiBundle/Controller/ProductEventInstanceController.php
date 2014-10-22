<?php

namespace HVP\CoreApiBundle\Controller;

use FOS\RestBundle\Util\Codes;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\RouteRedirectView;

use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use HVP\CoreModelBundle\Entity\ProductEventInstance;

use HVP\CoreApiBundle\Filter\ProductEventInstanceFilterType;

use HVP\CoreApiBundle\Serializers\ProductEventInstanceSerializer;

/**
 * Rest controller for Product Events, meant for updating offline devices
 *
 * @package HVP\CoreApiBundle\Controller
 * @author Jeffrey den Drijver
 */
class ProductEventInstanceController extends FOSRestController
{

    /**
     * List all Events.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
	 * @Get("/products/events/instances")
     */
    public function getProductEventInstancesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new ProductEventInstanceSerializer();

        $filteredBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('HVPCoreModelBundle:ProductEventInstance')
            ->createQueryBuilder('pei');
        
        $form = $this->get('form.factory')->create(new ProductEventInstanceFilterType());
        
        if ($this->get('request')->query->has($form->getName())) {
           $form->submit($this->get('request')->query->get($form->getName()));
           $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filteredBuilder);
        }
        
		$query = $filteredBuilder->getQuery();
		$eventInstances = $query->getResult();        

	    return $this->handleView($this->view($sr->batch($eventInstances), 200));
    }

    /**
     * Count all Events.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
	 * @Get("/products/events/instances/count")
     */
    public function getProductEventInstanceCountAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new ProductEventInstanceSerializer();

        $filteredBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('HVPCoreModelBundle:ProductEventInstance')
            ->createQueryBuilder('pei');
	    $filteredBuilder->select('count(pei)');
        
        $form = $this->get('form.factory')->create(new ProductEventInstanceFilterType());
        
        if ($this->get('request')->query->has($form->getName())) {
           $form->submit($this->get('request')->query->get($form->getName()));
           $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filteredBuilder);
        }
        
		$eventInstancesCount = $filteredBuilder->getQuery()->getSingleScalarResult();       

	    return $this->handleView($this->view(array("num"=>$eventInstancesCount), 200));
    }

    /**
     * Push an Event Instance and process it.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when processed successful"
     *   }
     * )
	 * @Post("/products/events/instances")
     */
    public function postProductEventInstanceAction(Request $request)
    {
        $productInstanceId =  $this->get('request')->request->get('product_instanceID');
		if(!$productInstanceId)
			die('no product_instanceID param set');

        $productEventId =  $this->get('request')->request->get('product_eventID');
		if(!$productEventId)
			die('no product_eventID param set');
		
        $change =  $this->get('request')->request->get('change');
		if(!$change)
			die('no change param set');

        $timestamp =  $this->get('request')->request->get('timestamp');
		if(!$timestamp)
			die('no timestamp param set');
		else
			$timestamp = round(intVal($timestamp) / 1000); // JS Submits Milliseconds

        $em = $this->getDoctrine()->getManager();
		$sr = new ProductEventInstanceSerializer();
		
		// Get Relevant Entities
		$productInstance = $em->getRepository('HVPCoreModelBundle:ProductInstance')->find($productInstanceId);
		$productEvent 	 = $em->getRepository('HVPCoreModelBundle:ProductEvent')->find($productEventId);

		// SetUp EventInstance & Persist + Flush
		$eventInstance = new ProductEventInstance();
		$eventInstance->setProductInstance($productInstance);		
		$eventInstance->setProductEvent($productEvent);
		$eventInstance->setEventChange(json_encode($change));
		$eventInstance->setTs(new \DateTime('@'.$timestamp));
		$em->persist($eventInstance);
		$em->flush();

		// Execute EventInstance on ProductInstance and Persist
		$productInstance = $this->processEventInstanceEntity($productInstance, $eventInstance);
		$em->persist($productInstance);
				
		// Update EventInstance to processed and Persist + Flush the whole bunch
		$eventInstance->setProcessed(new \DateTime('NOW'));
		$em->persist($eventInstance);	
		$em->flush();
        
	    return $this->handleView($this->view($sr->convert($eventInstance), 200));
    }
	
	private function processEventInstanceEntity($productInstance, $eventInstance)
	{
		$value	= $productInstance->getValue();
		$change = $eventInstance->getEventChange();
		$changaArr = json_decode($change);
		
		foreach($changaArr as $change){
			if(stripos($change,'-') === 0){
				$changeVal = str_ireplace('-','',$change);
				$newVal = $value - $changeVal;
			}elseif(stripos($change,'=') === 0){
				$changeVal = str_ireplace('=','',$change);
				$newVal = $changeVal;
			}elseif(stripos($change,' ') === 0){
				$changeVal = str_ireplace(' ','',$change);
				$newVal = $value + $changeVal;
			}else{
				die('invalid change operator: '.$change);
			}
		
			$productInstance->setValue($newVal);	
		}
		
		return $productInstance;
	}
	
  }
