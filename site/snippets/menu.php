<nav class="navigation" role="navigation">
	<h3 class="visually-hidden">Navigation</h3>
	<a href="#content" class="visually-hidden">Skip Navigation</a>

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
</nav>
