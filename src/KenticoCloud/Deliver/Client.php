<?php

namespace KenticoCloud\Deliver;

class Client {

	const MODE_PREVIEW = 1;
	const MODE_PUBLISHED = 2;

	public $projectID = null;
	public $apiKey = null;
	public $uri = 'https://deliver.kenticocloud.com/';
	public $_debug = true;
	public $lastRequest = null;
	public $mode = null;

	protected $contentTypesMap = null;
	protected $contentElementTypesMap = null;

	protected $taxonomyTypesMap = null;

	public function __construct($projectID, $apiKey = null, $contentTypesMap = null, $contentElementTypesMap = null, $taxonomyTypesMap = null){
		$this->projectID = $projectID;
		$this->apiKey = $apiKey;
		$self = get_class($this);
		$this->mode = $self::MODE_PUBLISHED;

		if(!$contentTypesMap){
			$contentTypesMap = new ContentTypesMap();
		}
		$this->setContentTypesMap($contentTypesMap);

		if(!$contentElementTypesMap){
			$contentElementTypesMap = new ContentElementTypesMap();
		}
		$this->setContentElementTypesMap($contentElementTypesMap);

		if(!$taxonomyTypesMap){
			$taxonomyTypesMap = new TaxonomyTypesMap();
		}
		$this->setTaxonomyTypesMap($taxonomyTypesMap);
	}

	public function getContentTypesMap(){
		return $this->contentTypesMap;
	}

	public function setContentTypesMap($map){
		$this->contentTypesMap = $map;
	}

	public function getContentElementTypesMap(){
		return $this->contentElementTypesMap;
	}

	public function setContentElementTypesMap($map){
		$this->contentElementTypesMap = $map;
	}
	
	public function buildURL($endpoint, $query = NULL){
		$segments = array(
			trim($this->uri, '/'),
			trim($this->projectID, '/'),
			trim($endpoint, '/')
		);
		$url = implode('/', $segments);
		if(is_array($query)) $query = http_build_query($query);
		if(is_string($query)) $url = rtrim($url, '?') . '?' . ltrim($query, '?');

		return $url;
	}

	public function setRequestAuthorization($request){
		$request->addHeader('Authorization', 'Bearer ' . $this->apiKey);
		return $request;
	}

	public function prepRequest($request){
		$request->_debug = $this->_debug;
		$request->mime('json');
		$request = $this->setRequestAuthorization($request);
		$this->lastRequest = $request;
		return $request;
	}

	public function getRequest($endpoint, $params = null){
		$uri = $this->buildURL($endpoint, $params);		
		
		$request = \Httpful\Request::get($uri);
		$request = $this->prepRequest($request);
		return $request;
	}

	public function send($request = null){
		if(!$request) $request = $this->lastRequest;
		else $this->lastRequest = $request;		
		$response = $request->send();
		$this->lastResponse = $response;
		return $response;
	}

	public function getItems($params){
		$request = $this->getRequest('items', $params);
		$response = $this->send();
		$items = new Models\ContentItems($response->body, $this);

		return $items;
	}

	public function getItem($params){
		if(is_string($params)){
			$params = array(
				'system.codename' => $params
			);
		}
		$params['limit'] = 1;
		$results = $this->getItems($params);
		$items = $results->getItems();
		if(is_null($items) || !count($items)) return null;

		$item = reset($items);
		return $item;
	}

	public function getTypes($params){
		$request = $this->getRequest('types', $params);
		$response = $this->send();
		$types = new Models\ContentItems($response->body, $this);

		return $types;
	}

	public function getType($params){
		if(is_string($params)){
			$params = array(
				'system.codename' => $params
			);
		}
		$params['limit'] = 1;
		$results = $this->getTypes($params);
		$types = $results->getItems();
		if(is_null($types) || !count($types)) return null;

		$type = reset($types);
		return $type;
	}

	public function getTaxonomyTypesMap(){
		return $this->taxonomyTypesMap;
	}

	public function setTaxonomyTypesMap($map){
		$this->taxonomyTypesMap = $map;
	}


	public function getTaxonomies($params){
		$request = $this->getRequest('taxonomies', $params);
		$response = $this->send();
		$items = new Models\Taxonomies($response->body, $this);

		return $items;
	}

	public function getTaxonomy($params){
		if(is_string($params)){
			$params = array(
				'system.codename' => $params
			);
		}
		$params['limit'] = 1;
		$results = $this->getTaxonomies($params);
		$items = $results->getTaxonomies();
		if(is_null($items) || !count($items)) return null;

		$item = reset($items);
		return $item;
	}

}