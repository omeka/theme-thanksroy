<?php head(); ?>	

	<div id="primary">
		<div id="featured">
			<?php $randomitem = random_featured_item();  ?>
			<h2>Featured Item</h2>
			<?php if(!empty($randomitem)):?>
			
			<h3><a href="<?php echo uri('items/show/'.$randomitem->id); ?>"><?php echo $randomitem->title; ?></a></h3>
			<?php if(has_thumbnail($randomitem)): ?>
			<a class="image" href="<?php echo uri('items/show/'.$randomitem->id); ?>"><?php square_thumbnail($randomitem); ?></a>
			<?php endif; ?>
			<p class="desc"><?php echo ($randomitem->description); ?></p>	
			<?php else: ?>
				<h3>No Featured Items</h3>
				<p>You have no featured items. Please make some featured.</p>	
			<?php endif; ?>	
		</div><!--end featured-item-->	
		
		<div id="recent-items">
		<h2>Recently Added</h2>
			<?php $recent = recent_items(10); ?>
			<?php if(!empty($recent)): ?>
			<ul id="recent-items-list" class="items-list">
				<?php foreach( $recent as $item ): ?>
				<li class="item">
					<h3><a href="<?php echo uri('items/show/'.$item->id); ?>"><?php if(!empty($item->title)) echo $item->title; else echo 'Untitled'; ?></a></h3>
				<?php if(!empty($item->description)): ?>
					<p class="item-description"><?php echo snippet($item->description,'0','150'); ?></p>
				<?php endif; ?>			
				</li>
				<?php endforeach; ?>
			</ul>
			<?php else: ?>
				<h3>No Recent Items</h3>
				<p>No recent items available.</p>	
			<?php endif; ?>
		</div><!--end recent-items -->		
		<p><a href="<?php echo uri('items/browse'); ?>">View All Items</a></p>
	</div>
	
<?php foot(); ?>