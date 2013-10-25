
		</div>

		<footer class="footer">

			<div class="footer-follow">
				<a href="https://twitter.com/tngritty" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @tngritty</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<div class="footer-note"><?php echo markdown($site->footernote()); ?></div>
			<div class="footer-copyright"><?php echo markdown($site->copyright()); ?></div>

			<a href="#" class="footer-scrolltop">Go back up</a>
		</footer>

		<?php
			if (c::get('debug')) {
				echo js('assets/js/vendor/prism.js');
				echo js('assets/js/main.js');
			} else {
				echo js('assets/dist/main-' . c::get('package')->version . '.min.js');
			}
		?>

		<script>
			var _gaq=[['_setAccount','UA-36398660-1'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
