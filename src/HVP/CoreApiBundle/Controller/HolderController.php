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

use HVP\CoreApiBundle\Serializers\HolderSerializer;

/**
 * Rest controller for Holders
 *
 * @package HVP\CoreApiBundle\Controller
 * @author Jeffrey den Drijver
 */
class HolderController extends FOSRestController
{

    /**
     * List all holders.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
	 * @Get("/holders")
	 * @Get("/1/holders", name="__API1")
     */
    public function getHoldersAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
		
		$srOpts = array();
		if($this->get('request')->request->get('incHolderReferences'))
			$srOpts[]	= 'incHolderReferences';
		if($this->get('request')->request->get('incProductInstances'))
			$srOpts[]	= 'incProductInstances';
		
		$sr = new HolderSerializer($this->parseSrOpts());
        
        $holders = $em->getRepository('HVPCoreModelBundle:Holder')->findAll();
		
	    return $this->handleView($this->view($sr->batch($holders), 200));
    }

    /**
     * Get a single Holder.
     *
     * @ApiDoc(
     *   output = "HVP\CoreModelBundle\Model\Holder",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the note is not found"
     *   }
     * )
	 * @Get("/holders/{id}")
	 * @Get("/1/holders/{id}", name="__API1")
     */
    public function getHolderAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
		$sr = new HolderSerializer(array('incHolderReferences','incProductInstances'));
		
        $holder = $em->getRepository('HVPCoreModelBundle:Holder')->find($id);

        if (false === $holder) {
            throw $this->createNotFoundException("Holder does not exist.");
        }
		
	    return $this->handleView($this->view($sr->convert($holder), 200));
    }
	
	private function parseSrOpts(){
		$srOpts = array();
		
		if($this->get('request')->query->get('incHolderReferences'))
			$srOpts[]	= 'incHolderReferences';
		if($this->get('request')->query->get('incProductInstances'))
			$srOpts[]	= 'incProductInstances';
		
		return $srOpts;	
	}
  }
