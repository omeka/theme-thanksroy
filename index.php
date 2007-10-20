<?php head(); ?>	

	<div id="primary">
		<p><em>Thanks,Roy</em> is a place for all of those who he touched to leave recollections and images.</p>
		<p>Roy Rosenzweig was the Mark and Barbara Fried Chair and founding director of the <a href="http://chnm.gmu.edu">Center for History and New Media</a> at George Mason University in Fairfax, Virginia. He used those positions, and his enthusiasm for new media innovation, to build an inclusive and democratic understanding of the past that blurred the line between popular and academic history. <a href="<?php echo uri('about'); ?>">More....</a></p>
		

		<div id="featured">

		<?php $randomitem = random_featured_item();  ?>
<h2>Featured Item</h2>
		<h3><a href="<?php echo uri('items/show/'.$randomitem->id); ?>"><?php echo $randomitem->title; ?></a></h3>
		<a class="image" href="<?php echo uri('items/show/'.$randomitem->id); ?>"><?php square_thumbnail($randomitem); ?></a>
		<p class="desc"><?php echo ($randomitem->description); ?></p>

							
	</div><!--end featured-item-->	
		<p><a href="<?php echo uri('items/browse'); ?>">View All Items</a></p>
	</div>
	
<?php foot(); ?>