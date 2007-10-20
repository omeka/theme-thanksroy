<?php head(); ?>
<div id="primary">
<h1>Browse by Tag</h1>
<ul class="navigation" id="secondary-nav">
	<?php nav(array('Browse All' => uri('items/browse'), 'Browse by Tag' => uri('items/tags'))); ?>
</ul>

<?php tag_cloud($tags,uri('items/browse')); ?>
</div>
<?php foot(); ?>