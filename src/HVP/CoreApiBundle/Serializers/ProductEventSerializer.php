<?php
namespace HVP\CoreApiBundle\Serializers;

use HVP\CoreApiBundle\Serializers\AbstractSerializer;
use HVP\CoreApiBundle\Serializers\ProductSerializer;

class ProductEventSerializer extends AbstractSerializer
{
	public function convert($object)
	{
		$ret 				= array();
		$ret['ID']			= $object->getId();
		$ret['name']		= $object->getName();
		$ret['summ']		= $object->getSumm();
		
		if(in_array('incProduct', $this->opts)){
			$product_sr = new ProductSerializer();
			$ret['product'] = $product_sr->convert($object->getProduct());
		}

		if(in_array('incProductEventConditions', $this->opts)){
			$ret['product_event_conditions'] = array();
			foreach($object->getProductEventConditions() as $eventCondition){
				$ec 					= array();
				$ec['ID']				= $eventCondition->getId();
				$ec['instanceValue']	= $eventCondition->getInstanceValue();
				$ec['comperator']		= $eventCondition->getComperator();
				$ec['conditionValue']	= $eventCondition->getConditionValue();
				$ec['combinator']		= $eventCondition->getCombinator();
				$ret['product_event_conditions'][] = $ec;
			}
		}

		if(in_array('incProductEventActions', $this->opts)){
			$ret['product_event_actions'] = array();
			foreach($object->getProductEventActions() as $eventAction){
				$ea 					= array();
				$ea['ID']				= $eventAction->getId();
				$ea['instanceValue']	= $eventAction->getInstanceValue();
				$ea['operator']			= $eventAction->getOperator();
				$ea['changeValue']		= $eventAction->getChangeValue();
				$ret['product_event_actions'][] = $ea;
			}
		}

		return $ret;
	}
}