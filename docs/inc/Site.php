<?php

require('../vendor/autoload.php');

class Site {

	protected static $instance = null;
	public static function getInstance(){
		if(self::$instance == null){
			$class = get_called_class();
			self::$instance = new $class;
		}
		return self::$instance;
	}

	public function inc($path, $params = null){		
		ob_start();
		if(is_array($params)) extract($params);
		$fullpath = $_SERVER['DOCUMENT_ROOT'].'/'.ltrim($path, '/');
		if(file_exists($fullpath.'.php')) $fullpath .= '.php';
		require($fullpath);
		$output = ob_get_clean();
		return $output;
	}

	public $kcdClient = null;
	public function deliver(){
		if(is_null($this->kcdClient)){
			$this->kcdClient = new \KenticoCloud\Deliver\Client('ace71be0-4898-4e7f-b0b6-f416080e5b8b', 'ew0KICAiYWxnIjogIkhTMjU2IiwNCiAgInR5cCI6ICJKV1QiDQp9.ew0KICAidWlkIjogInVzcl8wdkdNbVI4WkNIamxZVHpHMmdwYU8xIiwNCiAgImVtYWlsIjogInN0ZXBoZW4ucnVzaGluZ0Blc2l0ZWZ1bC5jb20iLA0KICAiZ2l2ZW5fbmFtZSI6ICJTdGVwaGVuIiwNCiAgImZhbWlseV9uYW1lIjogIlJ1c2hpbmciLA0KICAicHJvamVjdF9pZCI6ICI4NTRhOWFiZi04YWNkLTQ0MTktOTczNi01YjRlMWU0YWQzZmUiLA0KICAianRpIjogIjI3Q3p2UDZ6Y1ZfYTAzU3ciLA0KICAidmVyIjogIjEuMC4wIiwNCiAgImF1ZCI6ICJwcmV2aWV3LmRlbGl2ZXIua2VudGljb2Nsb3VkLmNvbSINCn0.wjYmSJx-tX3NSvfhp3gcw_DdKLyTe40B0LHQPpx5XJY');
		}		
		return $this->kcdClient;
	}

	public $kceClient = null;
	public function engage(){
		if(is_null($kceClient)){
			//$this->kceClient = new \KenticoCloud\Engage\Client('', '');
		}		
		return $this->kceClient;
	}

	public function setPreviewMode($yes = true){
		if($yes){
			$deliver = $this->deliver();
			$deliver->mode = $deliver::MODE_PUBLISHED;
		}
		return $this;
	}

	public function init(){

	}

	

}

$site = Site::getInstance();
$site->setPreviewMode();
$site->init();

