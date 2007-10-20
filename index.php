<?php head(); ?>	

	<div id="primary">
		<div id="featured">
		<?php $randomitem = random_featured_item();  ?>
			<h2>Featured Item</h2>
			<h3><a href="<?php echo uri('items/show/'.$randomitem->id); ?>"><?php echo $randomitem->title; ?></a></h3>
			<a class="image" href="<?php echo uri('items/show/'.$randomitem->id); ?>"><?php square_thumbnail($randomitem); ?></a>
			<p class="desc"><?php echo ($randomitem->description); ?></p>			
		</div><!--end featured-item-->	
		<p><a href="<?php echo uri('items/browse'); ?>">View All Items</a></p>
	</div>
	
<?php foot(); ?>