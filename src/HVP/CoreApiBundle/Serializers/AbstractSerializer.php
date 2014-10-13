<?php
namespace HVP\CoreApiBundle\Serializers;

abstract class AbstractSerializer {

	protected $opts;
	
    public function __construct($opts = false)
    {
		if($opts)
	        $this->opts = $opts;
		else
			$this->opts = array();
    }

	abstract public function convert($object);
	
	public function batch($array)
	{
		$ret = array();
		
		foreach($array as $object)
			$ret[] = $this->convert($object);
		
		return $ret;
	}

	public function json_encode($object)
	{
		return json_encode($this->convert($object));
	}

	public function php_serialize($object)
	{
		return serialize($this->convert($object));
	}

} 