<?php

namespace KenticoCloud\Deliver\Models;

use \KenticoCloud\Deliver\Helpers\TextHelper;

class Model {

	public function populate($obj){
		if(is_string($obj)){
			$obj = json_decode($obj);
		}
		if(is_object($obj)){
			$properties = get_object_vars($obj);
		}else{
			$properties = $obj; //assume it's an array
		}
		
		foreach($properties as $property=>$value){
			$setMethod = 'set'.TextHelper::getInstance()->camelize($property);
			if(method_exists($this, $setMethod)){
				call_user_func_array(array($this, $setMethod), array($value));
			}else{
				$this->$property = $value;
			}
		}
		return $this;
	}

	public function __construct($obj = null){
		$this->populate($obj);
	}

	public function __call($val, $x) {
	    if(substr($val, 0, 3) == 'get') {
	    	$varname = substr($val, 3);

	        if(property_exists($this, $dcvarname = TextHelper::getInstance()->decamelize($varname))) {
		        return $this->$dcvarname;
		    } else if(property_exists($this, $lcfvarname = lcfirst($varname))) {
		        return $this->$lcfvarname;
		    } else {
		        throw new \Exception('Property does not exist: '.$varname, 500);
		    }
	    }
	    else if(substr($val, 0, 3) == 'set') {
	    	$varname = substr($val, 3);
	        $varname = TextHelper::getInstance()->decamelize($varname);
	        $this->$varname = reset($x);
	        return $this;
	    }
	    else {
	        throw new \Exception('Bad method.', 500);
	    }
	    
	}

	public function __toString(){
		return json_encode($this);
	}
}