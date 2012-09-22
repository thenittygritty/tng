<nav id="navigation" class="navigation" role="navigation">
	<h3 class="visuallyhidden">Navigation</h3>
	<a href="#content" class="visuallyhidden">Skip Navigation</a>

	<ul>
		<?php foreach ($pages->visible() AS $p) : ?>
			<li>
				<a<?php echo ($p->isOpen()) ? ' class="active"' : '' ?>
						href="<?php echo $p->url(); ?>">
					<?php echo html($p->title()); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

	<a class="navigation-toggle navigation-toggle-show show-mobile" href="#navigation">&#x2630;</a>
	<a class="navigation-toggle navigation-toggle-hide show-mobile" href="#">&#x2630;</a>
</nav>
