<?php
// Get author
$author = $pages->find('authors/' . (string) $article->author());
?>

<article class="article">
	<header class="article-header">
		<h1>
			<a href="<?php echo $article->url(); ?>">
				<?php echo html($article->title()) ?>
			</a>
		</h1>

		<div>
			by <a href="#author"><?php echo html($author->name()); ?></a>
		</div>

		<p class="article-header-date">
			<time datetime="<?php echo $article->date('c') ?>">
				<?php echo html($article->date('\t\h\e jS \o\f F Y')); ?>
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

	<footer class="article-footer">
		<div class="article-footer-author" id="author">
			<img src="http://www.gravatar.com/avatar/<?php echo md5($author->email()); ?>?s=192">

			by
			<a href="<?php echo html($author->link()); ?>" rel="autor">
				<?php echo html($author->name()); ?>
			</a>
			&ndash;
			<a href="http://twitter.com/<?php echo html($author->twitter()); ?>">
				@<?php echo html($author->twitter()); ?>
			</a>

			<?php echo kirbytext($author->info()); ?>
		</div>
	</footer>
</article>
