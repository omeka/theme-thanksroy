</div><!-- end content -->

<div id="footer">
	
	<p>Proudly powered by <a href="http://omeka.org">Omeka</a>.</p>
	
	<ul class="navigation">	
    	<?php echo public_nav_main(array('Home' => uri(''), 'Browse Items' => uri('items'), 'Browse Collections'=>uri('collections')));
    	?>
	</ul>
    
    <?php echo plugin_footer(); ?>
    
</div><!-- end footer -->

</div><!--end wrap-->

</body>

</html>