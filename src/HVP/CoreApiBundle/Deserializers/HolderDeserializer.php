<?php
namespace HVP\CoreApiBundle\Deserializers;

use HVP\CoreApiBundle\Deserializers\AbstractDeserializer;
use HVP\CoreApiBundle\Deserializers\HolderReferenceDeserializer;
use HVP\CoreApiBundle\Deserializers\ProductInstanceDeserializer;

class HolderDeserializer extends AbstractDeserializer
{
	public function convert($object)
	{
		$ret 			= array();
		$ret['ID']		= $object->getId();
		
		if(in_array('incHolderReferences', $this->opts)){
			$ref_sr = new HolderReferenceDeserializer();
			$ret['holder_references'] = $ref_sr->batch($object->getHolderReferences());
		}

		if(in_array('incProductInstances', $this->opts)){
			$productInstance_sr = new ProductInstanceDeserializer(array('incProductEventInstances'));
			$ret['product_instances'] = $productInstance_sr->batch($object->getProductInstances());
		}
			
		return $ret;
	}
}