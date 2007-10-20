<?php head(array('title' => 'Item'))?>

<div id="primary" class="show">

	<h2><?php if($item->title) echo $item->title; else echo 'Untitled'; ?></h2>
	<?php if($item->creator): ?>
		<h3><?php if(item_metadata($item, 'Posting Consent') == 'Anonymously') echo 'Anonymous'; else echo $item->contributor; ?></h3>
	<?php endif; ?>
<?php if(has_thumbnail($item)): ?>
	<div id="fullsizeimg">
		<?php echo fullsize($item); ?>
	</div>
<?php endif; ?>
<?php $file = $item->Files[0]; ?>

<?php if($item->Type->name == 'Sound'):?>
	<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" width="326" height="16">
		<param name="src" value="/archive/files/<?php echo $file->archive_filename; ?>">
		<param name="controller" value="true">
		<param name="autoplay" value="false">
		<param name="loop" value="false">

		<embed src="/archive/files/<?php echo $file->archive_filename; ?>" scale="tofit" width="326" height="16" controller="true" autoplay="false" pluginspage="http://www.apple.com/quicktime/download/" type="video/quicktime"></embed>
		</object>
		<br />
<?php endif; ?>
	<?php if($item->description): ?>
	<div id="item-description">
		<?php if($item->description): echo nls2p($item->description); else: ?>
		<span>none available</span>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if($text = item_metadata($item,'Text')	): ?>
		<div class="desc">
		<?php echo nls2p(item_metadata($item,'Text')); ?>
		</div>
	<?php endif; ?>
	<?php /*foreach($item->Metatext as $key => $metatext): ?>
	<dt><?php echo $metatext->Metafield->name; ?></dt>
	<dd><?php if($metatext->text): echo $metatext->text; else: ?>
			<span>none available</span>
			<?php endif; ?></dd>
	<?php endforeach; */?>
	<?php if(count($item->Tags)): ?>
	<div class="tags"><p><strong>Tags:</strong> 
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