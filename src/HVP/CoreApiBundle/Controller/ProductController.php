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

use HVP\CoreApiBundle\Serializers\ProductSerializer;

/**
 * Rest controller for Products
 *
 * @package HVP\CoreApiBundle\Controller
 * @author Jeffrey den Drijver
 */
class ProductController extends FOSRestController
{

    /**
     * List all Products.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
	 * @Get("/products")
     */
    public function getProductsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new ProductSerializer(array('incProductEvents'));
        
        $products = $em->getRepository('HVPCoreModelBundle:Product')->findAll();

	    return $this->handleView($this->view($sr->batch($products), 200));
    }

    /**
     * Get a single Product.
     *
     * @ApiDoc(
     *   output = "HVP\CoreModelBundle\Model\Product",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the product is not found"
     *   }
     * )
	 * @Get("/products/{id}")
     */
    public function getProductAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new ProductSerializer(array('incProductEvents','incProductInstances'));
      
        $product = $em->getRepository('HVPCoreModelBundle:Product')->find($id);

        if (false === $product) {
            throw $this->createNotFoundException("Product does not exist.");
        }

	    return $this->handleView($this->view($sr->convert($product), 200));
    }
  }
