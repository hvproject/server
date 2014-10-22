<?php
namespace HVP\CoreApiBundle\Deserializers;

use HVP\CoreApiBundle\Deserializers\AbstractDeserializer;
use HVP\CoreApiBundle\Deserializers\HolderDeserializer;

class HolderReferenceDeserializer extends AbstractDeserializer
{
	public function convert($object, $targetObject)
	{
		if($object['holderID'])
			if($holder = $this->em->getRepository('HVPCoreModelBundle:Holder')->find($object['holderID']))
			$targetObject->setHolder($holder);
		
		if($object['ident'])	
			$targetObject->setIdent($object['ident']);
		
		if($object['type'])	
			$targetObject->setType($object['type']);
		
		if($object['active'])	
			$targetObject->setActive(intVal($object['active']));

		return $targetObject;
	}
}