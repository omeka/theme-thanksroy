<?php head(array('title'=>'Browse Collections')); ?>
<div id="primary">
	<h1>Collections</h1>

		<?php while (loop_collections()): ?>
			<div class="collection">
            	<h2><?php echo link_to_collection(); ?></h2>
	
            	<div class="field">
            	<h3>Description</h3>
            	<div class="field-value"><?php echo nls2p(collection('Description', array('snippet'=>150))); ?></div>
	            </div>
	            
            	<div class="field">
            	<h3>Collector(s)</h3> 
            	    <div class="field-value">
            	        <ul>
            	            <li><?php echo collection('Collectors', array('delimiter'=>'</li><li>')); ?></li>
            	        </ul>
            	    </div>
            	</div>
	
            	<p class="view-items-link"><?php echo link_to_browse_items('View the items in' . collection('Name'), array('collection' => collection('id'))); ?></p>
            </div>
		<?php endwhile; ?>

</div>
			
<?php foot(); ?>	