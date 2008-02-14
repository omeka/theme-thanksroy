<?php head(array('title' => h($item->title))); ?>

<div id="primary" class="show">

	<h1><?php if($item->title) echo h($item->title); else echo 'Untitled'; ?></h1>
	
<!--  The following is extended metadata that is assigned based on the Type that is assigned to an item -->
	
	<div id="extended-metadata">
	    <?php if(has_type($item)): ?>
	        <div id="item-type">
            <h2>Item Type</h2>
            <div class="field-value"><?php echo h($item->Type->name); ?></div>
            </div>
            
            <!-- This loop outputs all of the extended metadata -->
            <?php foreach( $item->TypeMetadata as $field => $text ): ?>
                <div id="<?php echo text_to_id($field); ?>">
                    <h2><?php echo h($field); ?></h2>
                    <div class="field-value"><?php echo nls2p(h($text)); ?>
                </div>
            <?php endforeach; ?>
            
	    <?php endif; ?>

	</div>
	
	<div id="item-metadata">

<!-- The following is dublin core metadata.  You can remove these fields if you do not wish
    to display that data on the public theme -->

	    <?php if($item->publisher): ?>
	        <div id="publisher" class="field">
            <h2>Publisher</h2>
            <div class="field-value"><?php echo h($item->publisher); ?></div> 
            </div>   
	    <?php endif; ?>
	
	    <?php if($item->creator): ?>
	        <div id="creator" class="field">
            <h2>Creator</h2>
            <div class="field-value"><?php echo h($item->creator); ?></div>
            </div>
	    <?php endif; ?>
	

        <?php if($item->description): ?>
            <div id="description" class="field">
            <h2>Description</h2>
            <div class="field-value"><?php echo nls2p(h($item->description)); ?></div>
            </div>
        <?php endif; ?>
	    	    
	    <?php if($item->relation): ?>
	        <div id="relation" class="field">
            <h2>Relation</h2>
            <div class="field-value"><?php echo h($item->relation); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->spatial_coverage): ?>
	        <div id="spatial Coverage">
            <h2>Spatial Coverage</h2>
            <div class="field-value"><?php echo h($item->spatial_coverage); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->rights): ?>
	        <div id="rights" class="field">
            <h2>Rights</h2>
            <div class="field-value"><?php echo h($item->rights); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->source): ?>
	        <div id="source" class="field">
            <h2>Source</h2>
            <div class="field-value"><?php echo h($item->source); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->subject): ?>
	        <div id="subject" class="field">
            <h2>Subject</h2>
            <div class="field-value"><?php echo h($item->subject); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->additional_creator): ?>
	        <div id="additional-creator">
            <h2>Additional Creator</h2>
            <div class="field-value"><?php echo h($item->additional_creator); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->format): ?>
	        <div id="format" class="field">
            <h2>Format</h2>
            <div class="field-value"><?php echo h($item->format); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->contributor): ?>
	        <div id="contributor" class="field">
            <h2>Contributor</h2>
            <div class="field-value"><?php echo h($item->contributor); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->rights_holder): ?>
	        <div id="rights-holder">
            <h2>Rights Holder</h2>
            <div class="field-value"><?php echo h($item->rights_holder); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->provenance): ?>
	        <div id="provenance" class="field">
            <h2>Provenance</h2>
            <div class="field-value"><?php echo h($item->provenance); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->date): ?>
	        <div id="date" class="field">
            <h2>Provenance</h2>
            <div class="field-value"><?php echo date('m.d.Y', strtotime($item->date)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->temporal_coverage_start): ?>
	        <div id="temporal-coverage" class="field">
            <h2>Temporal Coverage</h2>
            <div class="field-value">
                <?php echo date('m.d.Y', strtotime($item->temporal_coverage_start)); ?> 
                - <?php echo date('m.d.Y', strtotime($item->temporal_coverage_end)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <div id="date-added" class="field">
        <h2>Date Added</h2>
        <div class="field-value"><?php echo date('m.d.Y', strtotime($item->added)); ?></div>
	    </div>
	    
	    <?php if ( has_collection($item) ): ?>
    	    <div id="collection" class="field">
            <h2>Collection</h2>
            <div class="field-value"><?php echo h($item->Collection->name); ?></div>
            </div>
    	<?php endif; ?>
	
	</div><!-- End Dublin Core metadata -->

	<div id="itemfiles">
		<?php echo display_files($item->Files); ?>
	</div>
	

	<?php if(count($item->Tags)): ?>
	<div class="tags">
		<h3>Tags:</h3>
		<?php foreach ($item->Tags as $tag): ?>
			<a href="<?php echo uri('items/browse/tag/'.urlencode($tag->name)); ?>" rel="tag"><?php echo h($tag->name); ?></a>
		<?php endforeach; ?>
	</div>
	<?php endif;?>
	
	<div id="citation">
    	<h2>Citation</h2>
    	<div id="citation-value"><?php echo $item->getCitation(); ?></div>
	</div>
	
	<ul class="item-pagination navigation">
	<li id="previous-item" class="previous">
		<?php echo link_to_previous_item($item,'Previous Item'); ?>
	</li>
	<li id="next-item" class="next">
		<?php echo link_to_next_item($item,'Next Item'); ?>
	</li>
	</ul>
</div><!-- end primary -->


<?php foot(); ?>