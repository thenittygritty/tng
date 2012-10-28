<article class="article">
	<header class="article-header">
		<h1>
			<a href="<?php echo $article->url(); ?>">
				<?php echo html($article->title()) ?>
			</a>
		</h1>

		<time datetime="<?php echo $article->date('c') ?>" class="article-header-date">
			<?php echo html($article->date('d.m.Y')); ?>
		</time>

		<div class="article-header-author">
			<img src="http://www.gravatar.com/avatar/<?php echo md5($article->authormail()); ?>">

			<a href="<?php echo html($article->authorurl()); ?>" rel="autor">
				<?php echo html($article->author()); ?>
			</a>

			<a href="http://twitter.com/<?php echo html($article->authortwitter()); ?>">
				@<?php echo html($article->authortwitter()); ?>
			</a>
		</div>

		<div class="article-header-categories">
			<?php $categories = explode(',', $article->categories()); ?>
			<?php foreach ($categories as $category): ?>
				<a href="#"><?php echo html(trim($category)); ?></a>
			<?php endforeach; ?>
		</div>
	</header>

	<?php echo markdown($article->text()); ?>
</article>
