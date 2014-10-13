<?php
namespace HVP\CoreApiBundle\Serializers;

use HVP\CoreApiBundle\Serializers\AbstractSerializer;
use HVP\CoreApiBundle\Serializers\HolderSerializer;

class HolderReferenceSerializer extends AbstractSerializer
{
	public function convert($object)
	{
		$ret 			= array();
		$ret['ID']		= $object->getId();
		$ret['holderID']= $object->getHolder()->getId();
		$ret['ident']	= $object->getIdent();
		$ret['type']	= $object->getType();
		$ret['active']	= $object->getActive();
		
		if(in_array('incHolder', $this->opts)){
			$holder_sr = new HolderSerializer();
			$ret['holder'] = $holder_sr->convert($object->getHolder());
		}

		return $ret;
	}
}