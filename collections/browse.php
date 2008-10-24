<?php head(array('title'=>'Browse Collections')); ?>
<div id="primary">
	<h1>Collections</h1>

		<?php while (loop_collections()): ?>
			<div class="collection">
            	<h2><?php echo link_to_collection(); ?></h2>
	
            	<div class="element">
            	<h3>Description</h3>
            	<div class="element-text"><?php echo nls2p(collection('Description', array('snippet'=>150))); ?></div>
	            </div>
	            
            	<div class="element">
            	<h3>Collector(s)</h3> 
            	    <div class="element-text">
            	        <ul>
            	            <li><?php echo collection('Collectors', array('delimiter'=>'</li><li>')); ?></li>
            	        </ul>
            	    </div>
            	</div>
	
            	<p class="view-items-link"><?php echo link_to_browse_items('View the items in' . collection('Name'), array('collection' => collection('id'))); ?></p>
            <?php echo plugin_append_to_collections_browse_each(); ?>
            </div>
		<?php endwhile; ?>
        <?php echo plugin_append_to_collections_browse(); ?>
</div>
			
<?php foot(); ?>	