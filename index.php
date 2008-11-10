<?php head(); ?>	

<div id="primary">
    
    <!-- Featured Item -->
	<div id="featured-item">
		<?php echo display_random_featured_item(); ?>
	</div><!--end featured-item-->
	
	<!-- Featured Collection -->
	<div id="featured-collection">
	    <?php echo display_random_featured_collection(); ?>
	</div><!-- end featured collection -->
	
	<!-- Recent Items -->		
	<div id="recent-items">
    	<h2>Recently Added Items</h2>
	
    		<?php set_items_for_loop(recent_items(10)); ?>
    		<?php if (has_items_for_loop()): ?>
		    
    		<ul class="items-list">
    			<?php while (loop_items()): ?>
			    
    			<li class="item">
    				<h3><?php echo link_to_item(); ?></h3>
				
        			<?php if($desc = item('Dublin Core', 'Description', array('snippet'=>150))): ?>
        				<div class="item-description"><?php echo $desc; ?></div>
        			<?php endif; ?>						
    			</li>
			
    			<?php endwhile; ?>
    		</ul>
		
    		<?php else: ?>
    			<p>No recent items available.</p>
			
    		<?php endif; ?>
		
    	<p class="view-items-link"><a href="<?php echo uri('items'); ?>">View All Items</a></p>
	
	</div><!-- end recent-items -->
		
	<div id="recent-collections">
	    <h2>Recent Collections</h2>
	    
	    <?php if (has_collections()): ?>
	    <?php set_collections_for_loop(recent_collections(2)); ?>
	        
	    <ul class="collections-list">
	        <?php while (loop_collections()): ?>
	            
                <li class="collection">
                    <h3><?php echo link_to_collection(); ?></h3>
                    <p class="collection-description"><?php echo collection('Description', array('snippet'=>150)); ?></p>
                </li>
	                    
	        <?php endwhile; ?>
	    </ul>
	    
	    <?php else: ?>
			<p>No recent collections available.</p>	
				        
	    <?php endif; ?>
	</div><!-- end recent-collections -->
		
</div><!-- end primary -->

<?php foot(); ?>