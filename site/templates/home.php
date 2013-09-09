<?php snippet('header');

// Show blog posts in decending order
$articles = $page->children()->visible()->flip();

function get_latest_articles($articles) {
	$index = 0;
	$last_three_articles = array();
	foreach ($articles as $article) {
		if($article->template() == 'article' && $index < 3) {
			$last_three_articles[] = $article;
			$index++;
		}
	}
	return $last_three_articles;
}

$last_three_articles = get_latest_articles($articles);

// Show posts of categories if requested
if (param('category')):
	$articles = $articles->filterBy('categories', urldecode(param('category')), ',')->paginate(5); ?>
	<h1>Category: <?php echo urldecode(param('category')); ?></h1>
<?php else:
	// Show all articles
	$articles = $articles->paginate(15);
endif;
?>

<article class="article-featured">
	<header class="article-header">
		<h1>
			<a href="<?php echo $last_three_articles[0]->url(); ?>">
				<?php echo html($last_three_articles[0]->title()) ?>
			</a>
		</h1>
	</header>
	<strong><?php echo kirbytext($last_three_articles[0]->excerptintro()); ?></strong>
	<?php echo kirbytext($last_three_articles[0]->thumbnail()); ?>
	<?php echo kirbytext($last_three_articles[0]->excerpt()); ?>
	<p><a href="<?php echo $last_three_articles[0]->url() ?>">Read more…</a></p>
</article>

<div class="article-teasers">
	<article class="article-featured">
		<header class="article-header">
			<h1>
				<a href="<?php echo $last_three_articles[1]->url(); ?>">
					<?php echo html($last_three_articles[1]->title()) ?>
				</a>
			</h1>
		</header>
		<?php echo kirbytext($last_three_articles[1]->thumbnail()); ?>
		<?php echo kirbytext($last_three_articles[1]->excerptintro()); ?>
		<p><a href="<?php echo $last_three_articles[1]->url() ?>">Read more…</a></p>
	</article>

	<article class="article-featured">
		<header class="article-header">
			<h1>
				<a href="<?php echo $last_three_articles[2]->url(); ?>">
					<?php echo html($last_three_articles[2]->title()) ?>
				</a>
			</h1>
		</header>
		<?php echo kirbytext($last_three_articles[2]->thumbnail()); ?>
		<?php echo kirbytext($last_three_articles[2]->excerptintro()); ?>
		<p><a href="<?php echo $last_three_articles[2]->url() ?>">Read more…</a></p>
	</article>
</div>

<h2 class="heading-other">More Articles &amp; Links</h2>

<?php
if ($articles && $articles->count()):
	foreach ($articles as $article):
		// Check if it is a link post
		if($article->template() == 'article'):
			snippet('article', array('article' => $article));
		elseif($article->template() == 'article.link'):
			snippet('article.link', array('article' => $article));
		endif;
	endforeach;

	snippet('paginate', array('articles' => $articles));
else: ?>
	<article class="article">
		<p>Wooops. We couldn't find any articles. *sadpanda*</h1>
	</article>
<?php endif ?>

<?php snippet('footer') ?>
