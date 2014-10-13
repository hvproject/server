<?php
namespace HVP\CoreApiBundle\Serializers;

use HVP\CoreApiBundle\Serializers\AbstractSerializer;
use HVP\CoreApiBundle\Serializers\ProductInstanceSerializer;

class ProductSerializer extends AbstractSerializer
{
	public function convert($object)
	{
		$ret 				= array();
		$ret['ID']			= $object->getId();
		$ret['name']		= $object->getName();
		$ret['type']		= $object->getType();
		
		if(in_array('incProductEvents', $this->opts)){
			$productEvent_sr = new ProductEventSerializer(array('incProductEventConditions','incProductEventActions'));
			$ret['product_events'] = $productEvent_sr->batch($object->getProductEvents());
		}

		if(in_array('incProductInstances', $this->opts)){
			$productInstance_sr = new ProductInstanceSerializer();
			$ret['product_instances'] = $productInstance_sr->batch($object->getProductInstances());
		}

		return $ret;
	}
}