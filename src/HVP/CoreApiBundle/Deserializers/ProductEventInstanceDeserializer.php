<?php
namespace HVP\CoreApiBundle\Deserializers;

use HVP\CoreApiBundle\Deserializers\AbstractDeserializer;

class ProductEventInstanceDeserializer extends AbstractDeserializer
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