<?php snippet('header');

// Show blog posts in decending order
$articles = $page->children()->visible()->flip();

function get_latest_article($articles) {
	foreach ($articles as $article) {
		if($article->template() == 'article') {
			$latest_article = $article;
			return $latest_article;
		}
	}
}

$latest_article = get_latest_article($articles);

// Show posts of categories if requested
if (param('category')):
	$articles = $articles->filterBy('categories', urldecode(param('category')), ',')->paginate(5); ?>
	<h1>Category: <?php echo urldecode(param('category')); ?></h1>
<?php else:
	// Show all articles
	$articles = $articles->paginate(15);
endif;
?>

<h1><?php echo html($latest_article->title()) ?></h1>
<p><?php echo excerpt($latest_article->text(), 300) ?></p>
<a href="<?php echo $latest_article->url() ?>">Read more…</a>

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
