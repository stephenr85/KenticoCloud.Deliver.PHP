<?php

namespace KenticoCloud\Deliver\Models;

use KenticoCloud\Deliver\ContentElementTypesMap;

class ContentModel extends Model {

	protected $client = null;
	
	function __construct($obj, $client){			
		$this->client = $client;
		$this->populate($obj);
	}

	public function getClient(){
		return $this->client;
	}

}