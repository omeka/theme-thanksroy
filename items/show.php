<?php head(array('title' => h($item->title))); ?>


<?php
if (function_exists('COinS')):
    COinS($item);
endif;
?>

<div id="primary" class="show">

    <?php $titles = item('Title'); 
        $firstTitle = array_shift($titles); ?>
	<h2 class="item-title"><?php echo $firstTitle; ?></h2>
	<ul>
        <?php foreach ($titles as $title): ?>
           <li class="item-title">
           <?php echo $title; ?>
           </li>
        <?php endforeach ?>
	</ul>
	
	<?php echo show_item_metadata(); ?>
	
	

	<div id="itemfiles">
		<?php echo display_files_for_item(); ?>
	</div>
	

	<?php if(count($item->Tags)): ?>
	<div class="tags">
		<h3>Tags:</h3>
	   <?php echo tag_string($item->Tags, uri('items/browse/tag/'), "\n"); ?>	
	</div>
	<?php endif;?>
	
	<div id="citation" class="field">
    	<h2>Citation</h2>
    	<div id="citation-value" class="field-value"><?php echo item_citation(); ?></div>
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
