<?php
namespace HVP\CoreApiBundle\Deserializers;

use HVP\CoreApiBundle\Deserializers\AbstractDeserializer;
use HVP\CoreApiBundle\Deserializers\HolderDeserializer;

class HolderReferenceDeserializer extends AbstractDeserializer
{
	public function convert($object, $targetObject)
	{
		if(isset($object['holderID']))
			if($holder = $this->em->getRepository('HVPCoreModelBundle:Holder')->find($object['holderID']))
			$targetObject->setHolder($holder);
		
		if(isset($object['ident']))	
			$targetObject->setIdent($object['ident']);
		
		if(isset($object['type']))	
			$targetObject->setType($object['type']);
		
		if(isset($object['active']))	
			$targetObject->setActive(intVal($object['active']));

		return $targetObject;
	}
}