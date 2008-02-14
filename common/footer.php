<div id="footer">
	<p>Powered by <a href="http://omeka.org">Omeka</a>.</p>
	<ul class="navigation">
	<?php
		echo nav(array('Home' => uri(''), 'About' => uri('about'), 'Browse Contributions' => uri('items/browse')));
	?>
	</ul>

</div><!--end wrap-->
</body>
</html>