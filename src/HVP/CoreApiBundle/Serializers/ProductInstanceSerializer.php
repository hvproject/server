<?php
namespace HVP\CoreApiBundle\Serializers;

use HVP\CoreApiBundle\Serializers\AbstractSerializer;
use HVP\CoreApiBundle\Serializers\HolderSerializer;
use HVP\CoreApiBundle\Serializers\ProductSerializer;
use HVP\CoreApiBundle\Serializers\ProductEventInstanceSerializer;

class ProductInstanceSerializer extends AbstractSerializer
{
	public function convert($object)
	{
		$ret 				= array();
		$ret['ID']			= $object->getId();
		$ret['value']		= $object->getValue();
		$ret['productID']	= $object->getProduct()->getId();
		$ret['holderID']	= $object->getHolder()->getId();
		
		if(in_array('incHolder', $this->opts)){
			$holder_sr = new HolderSerializer();
			$ret['holder'] = $holder_sr->convert($object->getHolder());
		}

		if(in_array('incProduct', $this->opts)){
			$product_sr = new ProductSerializer();
			$ret['product'] = $holder_sr->convert($object->getProduct());
		}

		if(in_array('incProductEventInstances', $this->opts)){
			$eventInstance_sr = new ProductEventInstanceSerializer();
			$ret['product_event_instances'] = $eventInstance_sr->batch($object->getProductEventInstances());
		}

		return $ret;
	}
}