<?php

namespace HVP\CoreApiBundle\Controller;

use FOS\RestBundle\Util\Codes;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\RouteRedirectView;

use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use HVP\CoreApiBundle\Serializers\ProductInstanceSerializer;

/**
 * Rest controller for ProductInstances
 *
 * @package HVP\CoreApiBundle\Controller
 * @author Jeffrey den Drijver
 */
class ProductInstanceController extends FOSRestController
{

    /**
     * List all Product Instances.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
	 * @Get("/products/instances")
     */
    public function getProductInstancesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new ProductInstanceSerializer();
        
        $productInstances = $em->getRepository('HVPCoreModelBundle:ProductInstance')->findAll();

	    return $this->handleView($this->view($sr->batch($productInstances), 200));
    }

    /**
     * Get a single Product Instance.
     *
     * @ApiDoc(
     *   output = "HVP\CoreModelBundle\Model\ProductInstance",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the product instance is not found"
     *   }
     * )
	 * @Get("/products/instances/{id}")
     */
    public function getProductInstanceAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new ProductInstanceSerializer(array('incHolder','incProduct','incProductEventInstances'));
      
        $productInstance = $em->getRepository('HVPCoreModelBundle:ProductInstance')->find($id);

        if (false === $productInstance) {
            throw $this->createNotFoundException("ProductInstance does not exist.");
        }

	    return $this->handleView($this->view($sr->convert($productInstance), 200));
    }
  }
