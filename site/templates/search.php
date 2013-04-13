<?php snippet('header') ?>

<?php
	$search = new search(array(
		'searchfield' => 'search'
	));

	$results = $search->results();
?>

<?php if ($results) { ?>
	<div class="search-results">
		<?php foreach($results as $result): ?>
			<article>
				<h3><a href="<?php echo $result->url() ?>"><?php echo $result->title() ?></a></h3>
				<?php echo excerpt($result->text(), 300); ?>
			</article>
		<?php endforeach ?>
	</div>
<?php } else { ?>
	<article class="article">
		<p>Sorry, we couldn't find anything for your search.</p>
	</article>
<?php } ?>

<?php snippet('footer') ?>
