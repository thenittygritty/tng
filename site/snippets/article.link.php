<article class="article link">
	<header class="article-header">
		<h1>
			<a href="<?php echo $article->link(); ?>">
				<?php echo html($article->title()) ?> &#8674;
			</a>
		</h1>
	</header>

	<?php echo kirbytext($article->text()); ?>

	<footer class="article-footer">
		<div class="article-footer-author" id="author">

			Posted by
			<a href="<?php echo html($article->authorurl()); ?>">
				<?php echo html($article->author()); ?>
			</a>
			on the
			<a href="<?php echo $article->url(); ?>">
				<time datetime="<?php echo $article->date('c') ?>">
					<?php echo html($article->date('jS \o\f F Y')); ?>
				</time>
			</a>

			<?php echo markdown($article->authorinfo()); ?>
		</div>
	</footer>
</article>
