<?php
namespace HVP\CoreApiBundle\Deserializers;

abstract class AbstractDeserializer {

	protected $em;
	
	protected $opts;
	
    public function __construct($em, $opts = false)
    {
		$this->em 	= $em;
		if($opts)
	        $this->opts = $opts;
		else
			$this->opts = array();
    }

	abstract public function convert($object, $targetObject);
	
	/*
	public function batch($array)
	{
		$ret = array();
		
		foreach($array as $object)
			$ret[] = $this->convert($object);
		
		return $ret;
	}
	*/

	public function json_encode($object, $targetObject)
	{
		return json_encode($this->convert($object));
	}

	public function php_serialize($object, $targetObject)
	{
		return serialize($this->convert($object));
	}

} 