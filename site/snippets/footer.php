
		</div>

		<footer class="footer">
			<div class="footer-note"><?php echo markdown($site->footernote()); ?></div>
			<div class="footer-copyright"><?php echo markdown($site->copyright()); ?></div>
			<a href="#" class="footer-scrolltop">Go back up</a>
		</footer>

		<?php echo js('assets/js/vendor/zepto.min.js'); ?>
		<?php echo js('assets/js/vendor/prism.js'); ?>
		<?php echo js('assets/js/main.js'); ?>
	</body>
</html>
