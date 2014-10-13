<?php
namespace HVP\CoreApiBundle\Serializers;

use HVP\CoreApiBundle\Serializers\AbstractSerializer;
use HVP\CoreApiBundle\Serializers\HolderReferenceSerializer;
use HVP\CoreApiBundle\Serializers\ProductInstanceSerializer;

class HolderSerializer extends AbstractSerializer
{
	public function convert($object)
	{
		$ret 			= array();
		$ret['ID']		= $object->getId();
		
		if(in_array('incHolderReferences', $this->opts)){
			$ref_sr = new HolderReferenceSerializer();
			$ret['holder_references'] = $ref_sr->batch($object->getHolderReferences());
		}

		if(in_array('incProductInstances', $this->opts)){
			$productInstance_sr = new ProductInstanceSerializer(array('incProductEventInstances'));
			$ret['product_instances'] = $productInstance_sr->batch($object->getProductInstances());
		}
			
		return $ret;
	}
}