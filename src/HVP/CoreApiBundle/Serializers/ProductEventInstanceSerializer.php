<?php
namespace HVP\CoreApiBundle\Serializers;

use HVP\CoreApiBundle\Serializers\AbstractSerializer;

class ProductEventInstanceSerializer extends AbstractSerializer
{
	public function convert($object)
	{
		$ret 						= array();
		$ret['ID']					= $object->getId();
		$ret['product_instanceID']	= $object->getProductInstance()->getId();
		$ret['product_eventID']		= $object->getProductEvent()->getId();
		$ret['timestamp']			= $object->getTs();
		$ret['processed']			= $object->getProcessed();
		$ret['change']				= $object->getEventChange();

		return $ret;
	}
}