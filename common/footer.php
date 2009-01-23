<div id="footer">
	<p>Powered by <a href="http://omeka.org">Omeka</a>.</p>
	<ul class="navigation">
	<?php
		echo nav(array('Home' => uri(''), 'About' => uri('about'), 'Browse Contributions' => uri('items/browse')));
	?>
	</ul>
</div><!-- end footer -->
</div><!-- end content -->
</div><!--end wrap-->
<!-- Plugin Stuff (Footer) -->
<?php plugin_footer(); ?>
</body>
</html>