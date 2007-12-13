<?php head(array('title' => 'Item'))?>

<div id="primary" class="show">

	<h2><?php if($item->title) echo $item->title; else echo 'Untitled'; ?></h2>
	<ul id="item-metadata">
	<?php if($item->creator): ?>
	<li>Creator: <?php echo $item->creator; ?></li>
	<?php endif; ?>
	<li>Item Type: <?php echo $item->Type->name; ?></li>
	<li>Date Added: <?php echo date('m.d.Y', strtotime($item->added)); ?></li>
	<?php if ( has_collection($item) ): ?>
	<li><?php echo h($item->Collection->name); ?></li>

	<?php endif; ?>
	</ul>
	<?php if($item->description): ?>
	<div id="item-description">
		<?php echo nls2p($item->description); ?>
	</div>
	<?php endif; ?>

	<div id="itemfiles">
		<?php //if(fullsize($item)) echo fullsize($item); ?>
		<?php echo display_files($item->Files); ?>
		
	</div>
	

	<?php if(count($item->Tags)): ?>
	<div class="tags">
		<h3>Tags:</h3>
		<?php foreach ($item->Tags as $tag): ?>
			<a href="<?php echo uri('items/browse/tag/'.$tag->name); ?>" rel="tag"><?php echo h($tag->name); ?></a>
		<?php endforeach; ?>
	</div>
	<?php endif;?>
	
	<ul class="item-pagination navigation">
	<li id="previous-item" class="previous">
		<?php link_to_previous_item($item,'Previous Item'); ?>
	</li>
	<li id="next-item" class="next">
		<?php link_to_next_item($item,'Next Item'); ?>
	</li>
	</ul>
</div><!-- end primary -->


<?php foot(); ?>