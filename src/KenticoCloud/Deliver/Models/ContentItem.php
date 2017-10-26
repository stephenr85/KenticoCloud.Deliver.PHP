<?php

namespace KenticoCloud\Deliver\Models;

use KenticoCloud\Deliver\ContentElementTypesMap;

class ContentItem extends Model {

	public $system = null;
	public $elements = null;

	public function setSystem($system){
		$this->system = ContentItemSystem::create($system);
		return $this;
	}

	public function getModularContent($huh){

	}

	public function getElementAs($name, $type = null){
		//ContentElementTypesMap
		$element = is_string($name) ? $this->getElement($name) : $name;
		if(!$type){
			$type = ContentElementTypesMap::getTypeClass($element->type);
		}
		return $type::create($element);
	}

	public function getElement($name){
		if(!$this->elements) return null;
		foreach($this->elements as $key => $element){
			if($key == $name || $name == $element->name){
				return $element;
			}
		}
		return null;
	}

	public function getElementValue($name){
		$element = $this->getElement($name);
		if(is_object($element)){
			return $element->value;
		}
		return null;
	}

	public function getString($name){
		$value = $this->getElementValue($name);
		return (string)$value;
	}

	public function getNumber($name){
		$value = $this->getElementValue($name);
		return floatval($value) !== intval($value) ? floatval($value) : intval($value);
	}

	public function getDateTime($name, $format = NULL){
		$value = $this->getElementValue($name);
		if(is_string($value)){
			$value = strtotime($value);
		}
		if($format){
			$value = date($format, $value);
		}
		return $value;
	}

	public function getAssets($name){
		$element = $this->getElement($name);
		if(is_object($element) && $element->type == 'asset'){

		}
		return null;
	}

	
}