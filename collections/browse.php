<?php head(array('title'=>'Browse Collections')); ?>
<div id="primary">
	<h1>Collections</h2>

		<?php foreach ($collections as $collection ): ?>
			<div class="collection">
            	<h2><?php echo link_to_collection($collection); ?></h2>
	
            	<div class="field">
            	<h3>Description</h3>
            	<div class="field-value"><?php echo nls2p(snippet(h($collection->description), 0, 150)); ?></div>
	
            	<div class="field">
            	<h3>Collector(s)</h3> 
            	    <div class="field-value">
            	        <ul><?php foreach($collection->Collectors as $collector):?>
            	            <li><?php echo h($collector->name); ?></li>
            	            <?php endforeach; ?>
            	        </ul>
            	    </div>
            	</div>
	
            	<p><a href="<?php echo uri('items/browse/', array('collection'=>$collection->id)); ?>">View the items in &quot;<?php echo h($collection->name); ?>&quot;</a></p>
            </div>
		<?php endforeach; ?>

</div>
			
<?php foot(); ?>	