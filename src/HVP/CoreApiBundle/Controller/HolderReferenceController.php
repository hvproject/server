<?php

namespace HVP\CoreApiBundle\Controller;

use HVP\CoreApiBundle\Filter\HolderReferenceFilterType;

use FOS\RestBundle\Util\Codes;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\RouteRedirectView;

use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use HVP\CoreModelBundle\Entity\HolderReference;

use HVP\CoreApiBundle\Form\HolderReferenceType;

use HVP\CoreApiBundle\Serializers\HolderReferenceSerializer;
use HVP\CoreApiBundle\Deserializers\HolderReferenceDeserializer;

/**
 * Rest controller for HolderReferences
 *
 * @package HVP\CoreApiBundle\Controller
 * @author Jeffrey den Drijver
 */
class HolderReferenceController extends FOSRestController
{

    /**
     * List all holder references.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
	 * @Get("/holders/references")
     */
    public function getHolderReferencesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new HolderReferenceSerializer(array('incHolders'));

        // initialize a query builder
        $filteredBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('HVPCoreModelBundle:HolderReference')
            ->createQueryBuilder('hr');
        
        $form = $this->get('form.factory')->create(new HolderReferenceFilterType());
        
        if ($this->get('request')->query->has($form->getName())) {
           // manually bind values from the request
           $form->submit($this->get('request')->query->get($form->getName()));

           // build the query from the given form object
           $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filteredBuilder);
        }
        
    		$query = $filteredBuilder->getQuery();
    		$holderReferences = $query->getResult();

	    return $this->handleView($this->view($sr->batch($holderReferences), 200));
    }

    /**
     * Get a single HolderReference.
     *
     * @ApiDoc(
     *   output = "HVP\CoreModelBundle\Model\HolderReference",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the note is not found"
     *   }
     * )
	 * @Get("/holders/references/{id}")
     */
    public function getHolderReferenceAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new HolderReferenceSerializer(array('incHolders'));
      
        $holderReference = $em->getRepository('HVPCoreModelBundle:HolderReference')->find($id);

        if (false === $holderReference) {
            throw $this->createNotFoundException("Holder reference does not exist.");
        }

	    return $this->handleView($this->view($sr->convert($holderReference), 200));
    }
	
    /**
     * Update a single HolderReference.
     *
     * @ApiDoc(
     *   output = "HVP\CoreModelBundle\Model\HolderReference",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the note is not found"
     *   }
     * )
	 * @Post("/holders/references", name="_new")
	 * @Post("/holders/references/{id}", name="_update")
     */
    public function postHolderReferenceAction(Request $request, $id = false)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new HolderReferenceSerializer(array('incHolders'));
		$dsr = new HolderReferenceDeserializer($em);
      	
		if(!$id)
			$holderReference = new HolderReference();
		else
		    $holderReference = $em->getRepository('HVPCoreModelBundle:HolderReference')->find($id);

		if (false === $holderReference) {
			throw $this->createNotFoundException("Holder reference does not exist.");
		}
		
		$params = $this->get('request')->request->all();
		
		$holderReference = $dsr->convert($params, $holderReference);
		
		$em->persist($holderReference);
		
		if ($em->flush() == null) {
			$ret = $sr->convert($holderReference);
			if($id)
				$ret['UPDATE'] = 'OK';
			else
				$ret['INSERT'] = 'OK';
			$st = 200;
		}else{
			$ret = $sr->convert($holderReference);
			if($id)
				$ret['UPDATE'] = 'ERR';
			else
				$ret['INSERT'] = 'ERR';
			$ret['MESSAGE']= 'FLUSH_FAILED';
			$st = 500;
		}

	    return $this->handleView($this->view($ret), $st);
    }
  }
