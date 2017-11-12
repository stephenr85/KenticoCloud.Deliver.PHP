<?php

namespace KenticoCloud\Deliver\Models;

use \KenticoCloud\Deliver\ContentTypesMap;

class Taxonomies extends ContentModel implements \Iterator {

	public $taxonomies = null;
	public $pagination = null;
	public $message = null;
	public $request_id = null;
	public $error_code = null;
	public $specific_code = null;

	private $_index = 0;

	public function getItem($index){
		return $this->taxonomies[$index];
	}

	public function getItems(){
		return $this->taxonomies;
	}

	public function setTaxonomies($value){
		$this->taxonomies = array();
		$typesMap = $this->client->getTaxonomyTypesMap();
		foreach($value as $item){
			if(isset($item->system->type)){
				$class = $typesMap->getTypeClass($item->system->type);
			}else{
				$class = $typesMap->defaultTypeClass;
			}
			$this->taxonomies[] = new $class($item, $this->client);
		}
		return $this;
	}

	public function setPagination($value){
		$this->pagination = new Pagination($value);
		return $this;
	}

	public function first(){
		return $this->items[0];
	}

	public function last(){
		return $this->items[count($this->items) - 1];
	}

	public function current()
    {
        return $this->items[$this->_index];
    }

    public function next()
    {
        $this->_index ++;
    }

    public function key()
    {
        return $this->_index;
    }

    public function valid()
    {
        return isset($this->items[$this->key()]);
    }

    public function rewind()
    {
        $this->_index = 0;
    }

    public function reverse()
    {
        $this->items = array_reverse($this->items);
        $this->rewind();
    }
	
}