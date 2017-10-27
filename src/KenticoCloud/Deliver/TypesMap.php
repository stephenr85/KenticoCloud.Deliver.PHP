<?php

namespace KenticoCloud\Deliver;

class TypesMap {

	public $defaultTypeClass = null;

	protected $types = array(
		
	);	

	public function setTypeClass($type, $class){
		$this->$types[$type] = $class;
	}

	public function getTypeClass($type){
		$self = get_called_class();
		return isset($this->types[$type]) ? $this->$types[$type] : $this->defaultTypeClass;
	}

}