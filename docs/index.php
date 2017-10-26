<?php require('inc/head.php'); ?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">

		<div class="cell medium-3">
			<div class="callout secondary">
				<ul class="vertical menu">
					<li><a href="#connect">Connect to the API</a></li>
					<li><a href="#get-item">Get a content item</a></li>
					<li><a href="#get-items">Get content items</a></li>
					<li><a href="#map-types">Mapping content types</a></li>
					<li><a href="#map-types">Mapping content element types</a></li>
				</ul>
			</div>
		</div>
		<div class="cell medium-9">


			<h2 id="connect">Connect to the API</h2>
			<p>...</p>

			<h2 id="get-item">Get a content item</h2>

			<?php echo $deliver->getItem(array('system.codename'=>'coffee_processing_techniques', 'elements'=>'title,teaser_image,post_date,summary')) ?>

			<h2 id="get-item">Get content items</h2>
			<?php echo $deliver->getItems(array('system.type'=>'article', 'elements'=>'title,teaser_image,post_date,summary')) ?>
			<p>...</p>

			<h2 id="map-types">Mapping content types</h2>
			<p>...</p>

			<h2 id="map-types">Mapping content element types</h2>
			<p>...</p>

		</div>

	</div>
</div>
<?php require('inc/foot.php'); ?>
    