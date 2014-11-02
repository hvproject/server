<?php
namespace HVP\CoreApiBundle\Deserializers;

use HVP\CoreApiBundle\Deserializers\AbstractDeserializer;
use HVP\CoreApiBundle\Deserializers\HolderReferenceDeserializer;
use HVP\CoreApiBundle\Deserializers\ProductInstanceDeserializer;

class HolderDeserializer extends AbstractDeserializer
{
	public function convert($object, $targetObject)
	{
		return $targetObject;
	}
}