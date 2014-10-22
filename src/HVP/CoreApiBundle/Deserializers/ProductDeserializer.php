<?php
namespace HVP\CoreApiBundle\Deserializers;

use HVP\CoreApiBundle\Deserializers\AbstractDeserializer;
use HVP\CoreApiBundle\Deserializers\ProductInstanceDeserializer;

class ProductDeserializer extends AbstractDeserializer
{
	public function convert($object)
	{
		$ret 				= array();
		$ret['ID']			= $object->getId();
		$ret['name']		= $object->getName();
		$ret['type']		= $object->getType();
		
		if(in_array('incProductEvents', $this->opts)){
			$productEvent_sr = new ProductEventDeserializer(array('incProductEventConditions','incProductEventActions'));
			$ret['product_events'] = $productEvent_sr->batch($object->getProductEvents());
		}

		if(in_array('incProductInstances', $this->opts)){
			$productInstance_sr = new ProductInstanceDeserializer();
			$ret['product_instances'] = $productInstance_sr->batch($object->getProductInstances());
		}

		return $ret;
	}
}