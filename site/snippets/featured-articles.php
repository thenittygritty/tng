<?php
$index = 0;
foreach ($articles as $article):

	// Get author
	$author = $pages->find('authors/' . (string) $article->author()); ?>

	<?php 
	# Open the teaser wrapper
	if ($index == 1): ?>
	<div class="article-teasers">
	<?php endif ?>
		<article class="article-featured">
			<header class="article-header">
				<h1>
					<a href="<?php echo $article->url(); ?>">
						<?php echo html($article->title()) ?>
					</a>
				</h1>

				<?php if ($index != 0): ?>
				<div class="authordate">
				<?php endif ?>
					<div>
						by <a href="#author"><?php echo html($author->name()); ?></a>
					</div>

					<p class="article-header-date">
						<time datetime="<?php echo $article->date('c') ?>">
							<?php echo html($article->date('\t\h\e jS \o\f F Y')); ?>
						</time>
					</p>
				<?php if ($index != 0): ?>
				</div>
				<?php endif ?>
				
				
				<?php if ($index == 0): ?>
				<div class="article-header-categories">
					<?php $categories = explode(',', $article->categories()); ?>
					<?php foreach ($categories as $category): ?>
						<a href="<?php echo url('category:' . trim($category)); ?>"><?php echo html(trim($category)); ?></a>
					<?php endforeach; ?>
				</div>
				<?php endif ?>
			</header>
			<?php if ($index == 0): ?>
			<strong><?php echo kirbytext($article->excerptintro()); ?></strong>
			<?php endif;
			echo kirbytext($article->thumbnail()); 

			if ($index != 0): 
				echo kirbytext($article->excerptintro()); 
			endif;

			if ($index == 0) {
				echo kirbytext($article->excerpt());
			}
			?>
			<p><a href="<?php echo $article->url() ?>">Read more…</a></p>
		</article>
	<?php 
	# Close the teaser wrapper.
	if ($index == 2): ?>
	</div>
	<?php 
	endif;
	$index++; 
endforeach; ?>

<h3 class="heading-other">More Articles &amp; Links</h3>
