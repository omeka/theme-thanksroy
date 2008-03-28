<?php head(); ?>	

	<div id="primary">
		<!-- Featured Item -->
		<div id="featured-item">
			<?php $featuredItem = random_featured_item();  ?>
			<h2>Featured Item</h2>
			<?php if ( $featuredItem ): ?>
			    <h3><?php echo link_to_item($featuredItem); ?></h3>
    			<?php if(has_thumbnail($featuredItem)): ?>
    			    <?php echo link_to_square_thumbnail($featuredItem, array('class'=>'image')); ?>
    			<?php endif; ?>
    			<p class="item-description"><?php echo h(snippet($featuredItem->description, 0, 150)); ?></p>	
    		<?php else: ?>
    				<p>You have no featured items. </p>	
    		<?php endif; ?>	
		</div><!--end featured-item-->	
		
		<!-- Featured Collection -->
		<div id="featured-collection">
		    <?php $featuredCollection = random_featured_collection(); ?>
		    <h2>Featured Collection</h2>
		    <?php if ( $featuredCollection ): ?>
		        <h3><?php echo link_to_collection($featuredCollection); ?></h3>
		    <?php else: ?>
		        <p>You have no featured collections.</p>
		    <?php endif; ?>
		</div><!-- end featured collection -->
		
		<!-- Featured Exhibit -->
		<div id="featured-exhibit">
		    <?php $featuredExhibit = random_featured_exhibit(); ?>
		    <h2>Featured Exhibit</h2>
		    <?php if ( $featuredExhibit ): ?>
		      <h3><?php echo link_to_exhibit($featuredExhibit); ?></h3>
		    <?php else: ?>
		        <p>You have no featured exhibits.</p>
		    <?php endif; ?>
		</div><!-- end featured exhibit -->
		
		<div id="recent-items">
		<h2>Recently Added Items</h2>
			<?php $recent = recent_items(10); ?>
			<?php if(!empty($recent)): // Loop through the 10 most recently added items ?>
			<ul class="items-list">
				<?php foreach( $recent as $item ): ?>
				<li class="item">
					<h3><?php echo link_to_item($item); ?></h3>
				<?php if(!empty($item->description)): ?>
					<div class="item-description"><?php echo h(snippet($item->description,0,150)); ?></div>
				<?php endif; ?>			
				</li>
				<?php endforeach; ?>
			</ul>
			<?php else: ?>
				<h3>No Recent Items</h3>
				<p>No recent items available.</p>	
			<?php endif; ?>
		</div><!--end recent-items -->
		
		<p class="view-items-link"><a href="<?php echo uri('items'); ?>">View All Items</a></p>
			
		<div id="recent-collections">
		    <h2>Recent Collections</h2>
		    <?php $recentCollections = recent_collections(2); ?>
		    <?php if($recentCollections): ?>
		        <ul class="collections-list">
		            <?php foreach( $recentCollections as $collection ): ?>
		                <li class="collection">
		                <h3><?php echo link_to_collection($collection); ?></h3>
		            <?php endforeach; ?>
		        </ul>
		    <?php endif; ?>
		</div><!-- end recent collections -->
			
	</div>
	
<?php foot(); ?>