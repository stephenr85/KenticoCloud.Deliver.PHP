<?php require_once('inc/Site.php'); $site = Site::getInstance(); ?>
<?php
	$contentItem = $site->deliver()->getItem(array(
		'codename'=>$_REQUEST['name'],
		'elements'=>'title,summary,post_date,teaser_image',
		'depth'=>10
	));
	echo "<pre>$contentItem</pre>";
	//if(!$contentItem) 404;
?>
<?php echo $site->inc('site/inc/head', array('seoTitle'=>$contentItem->system->name)); ?>

<div class="row">
	<div class="columns">

		<h1><?php echo $contentItem->system->name ?></h1>

		<?php echo $contentItem->getGuidelines() ?>


	</div>
</div>

<?php echo $site->inc('site/inc/foot', array()); ?>
    