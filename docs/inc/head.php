<?php 

require($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

global $deliver;
$deliver = new \KenticoCloud\Deliver\Client('ace71be0-4898-4e7f-b0b6-f416080e5b8b', 'ew0KICAiYWxnIjogIkhTMjU2IiwNCiAgInR5cCI6ICJKV1QiDQp9.ew0KICAidWlkIjogInVzcl8wdkdNbVI4WkNIamxZVHpHMmdwYU8xIiwNCiAgImVtYWlsIjogInN0ZXBoZW4ucnVzaGluZ0Blc2l0ZWZ1bC5jb20iLA0KICAiZ2l2ZW5fbmFtZSI6ICJTdGVwaGVuIiwNCiAgImZhbWlseV9uYW1lIjogIlJ1c2hpbmciLA0KICAicHJvamVjdF9pZCI6ICI4NTRhOWFiZi04YWNkLTQ0MTktOTczNi01YjRlMWU0YWQzZmUiLA0KICAianRpIjogIjI3Q3p2UDZ6Y1ZfYTAzU3ciLA0KICAidmVyIjogIjEuMC4wIiwNCiAgImF1ZCI6ICJwcmV2aWV3LmRlbGl2ZXIua2VudGljb2Nsb3VkLmNvbSINCn0.wjYmSJx-tX3NSvfhp3gcw_DdKLyTe40B0LHQPpx5XJY');;


if(!isset($seoTitle)) $seoTitle = 'Home';
if(!isset($bodyCssClass)) $bodyCssClass = '';

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $seoTitle ?> - KenticoCloud.Deliver.PHP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.css" integrity="" crossorigin="anonymous" />
  </head>
  <body class="<?php echo is_array($bodyCssClass) ? implode(' ', $bodyCssClass) : $bodyCssClass ?>">

  	<div class="top-bar">
	  <div class="top-bar-left">
	    <ul class="menu">
	      <li class="menu-text">KenticoCloud.Deliver.PHP</li>
	    </ul>
	  </div>
	  <div class="top-bar-right">
	    <ul class="menu dropdown" data-dropdown-menu>
	      <li><a href="/examples">About</a></li>
	      <li>
	        <a href="#">Examples</a>
	        <ul class="menu vertical">
	          <li><a href="/examples/basic.php">Basic</a></li>
	        </ul>
	      </li>
	      <li><a href="/docs/api">API</a></li>
	    </ul>
	  </div>
	</div>

	<div style="height:80px;"></div>

<!--
	<div class="row">
		<div class="columns">
			<h1>Site Title</h1>
		</div>
	</div>
-->