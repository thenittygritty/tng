<article class="article">
	<header class="article-header">
		<h1>
			<a href="<?php if (isLink($article)) { echo $article->linkurl(); } else { echo $article->url(); } ?>">
				<?php echo html($article->title()) ?>
				<?php if (isLink($article)) { ?>
					&#8674;
				<?php } ?>
			</a>
		</h1>

		<?php if (!isLink($article)) { ?>
			<div>
				by <a href="#author"><?php echo html($article->author()); ?></a>
			</div>
		<?php } ?>

		<p class="article-header-date">
			<time datetime="<?php echo $article->date('c') ?>">
				<?php echo html($article->date('d.m.Y')); ?>
			</time>
		</p>

		<div class="article-header-categories">
			<?php $categories = explode(',', $article->categories()); ?>
			<?php foreach ($categories as $category): ?>
				<a href="<?php echo url('category:' . trim($category)); ?>"><?php echo html(trim($category)); ?></a>
			<?php endforeach; ?>
		</div>
	</header>

	<?php echo kirbytext($article->text()); ?>

	<?php if (isLink($article)) { ?>
		<p><a href="<?php echo $article->linkurl(); ?>">Read more in the original article &#8674;</a></p>
	<?php } ?>

	<?php if (!isLink($article)) { ?>
		<footer class="article-footer">
			<div class="article-footer-author" id="author">
				<img src="http://www.gravatar.com/avatar/<?php echo md5($article->authormail()); ?>.jpg?s=192">

				by
				<a href="<?php echo html($article->authorurl()); ?>" rel="autor">
					<?php echo html($article->author()); ?>
				</a>
				&ndash;
				<a href="http://twitter.com/<?php echo html($article->authortwitter()); ?>">
					@<?php echo html($article->authortwitter()); ?>
				</a>

				<?php echo markdown($article->authorinfo()); ?>
			</div>
		</footer>
	<?php } ?>
</article>
