<?php require_once('inc/Site.php'); $site = Site::getInstance(); ?>
<?php
	$contentItem = $site->deliver()->getItem('home');
	//if(!$contentItem) 404;
?>
<?php echo $site->inc('docs/inc/head', array('seoTitle'=>$contentItem->system->name)); ?>

<?php echo '<!--'. $contentItem .'-->'; ?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="cell">

			<h1><?php echo $contentItem->system->name ?></h1>

			<?php //echo $contentItem->getGuidelines() ?>

			<div class="feature-article">
				<?php 
				$articles = $contentItem->getModularContent('articles')->getItems();
				$article = array_shift($articles);
				$teaser_image = $article->getElementValue('teaser_image');
				$img = $teaser_image[0];
				?>
				<img src="<?php echo $img->url ?>">
				<h2><?php echo $article->system->name ?></h2>
				<p><?php echo $article->getElementValue('summary') ?></p>
			</div>

			<div class="grid-x grid-padding-x">
			<?php foreach($articles as $article){
				$teaser_image = $article->getElementValue('teaser_image');
				$img = $teaser_image[0];
				echo '<!--' . $article . '-->';
				?>
				<div class="cell medium-3">
					<img src="<?php echo $img->url ?>">
					<h4><?php echo $article->system->name ?></h4>
					<p><?php echo $article->getElementValue('summary') ?></p>
				</div>
			<?php } ?>
			</div>

			<?php
			$modularItem = $contentItem->getModularContent('our_story')->first();
			$teaser_image = $modularItem->getElementValue('image');
			$img = $teaser_image[0];
			echo '<!--' . $modularItem . '-->';
			?>
			<img src="<?php echo $img->url ?>" alt="<?php echo $img->description ?>">
			<h2><?php echo $modularItem->getString('title') ?></h2>
			<?php echo $modularItem->getString('description') ?>
		</div>
	</div>
</div>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="cell medium-4">
			<?php echo $contentItem->getString('contact') ?>

		</div>
	</div>
</div>
<?php echo $site->inc('docs/inc/foot', array()); ?>
    