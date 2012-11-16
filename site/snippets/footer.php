
		</div>

		<footer class="footer">
			<div class="footer-note"><?php echo markdown($site->footernote()); ?></div>
			<div class="footer-copyright"><?php echo markdown($site->copyright()); ?></div>
			<a href="#" class="footer-scrolltop">Go back up</a>
		</footer>

		<?php echo js('assets/js/vendor/zepto.min.js'); ?>
		<?php echo js('assets/js/vendor/prism.js'); ?>
		<?php echo js('assets/js/main.js'); ?>

		<script>
			var _gaq=[['_setAccount','UA-36398660-1'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
