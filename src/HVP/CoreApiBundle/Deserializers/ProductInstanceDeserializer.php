<?php
namespace HVP\CoreApiBundle\Deserializers;

use HVP\CoreApiBundle\Deserializers\AbstractDeserializer;
use HVP\CoreApiBundle\Deserializers\HolderDeserializer;
use HVP\CoreApiBundle\Deserializers\ProductDeserializer;
use HVP\CoreApiBundle\Deserializers\ProductEventInstanceDeserializer;

class ProductInstanceDeserializer extends AbstractDeserializer
{
	public function convert($object)
	{
		$ret 				= array();
		$ret['ID']			= $object->getId();
		$ret['value']		= $object->getValue();
		$ret['productID']	= $object->getProduct()->getId();
		$ret['holderID']	= $object->getHolder()->getId();
		
		if(in_array('incHolder', $this->opts)){
			$holder_sr = new HolderDeserializer();
			$ret['holder'] = $holder_sr->convert($object->getHolder());
		}

		if(in_array('incProduct', $this->opts)){
			$product_sr = new ProductDeserializer();
			$ret['product'] = $holder_sr->convert($object->getProduct());
		}

		if(in_array('incProductEventInstances', $this->opts)){
			$eventInstance_sr = new ProductEventInstanceDeserializer();
			$ret['product_event_instances'] = $eventInstance_sr->batch($object->getProductEventInstances());
		}

		return $ret;
	}
}