<?php snippet('header') ?>

<?php
	$search = new search(array(
		'searchfield' => 'search'
	));

	$results = $search->results();
?>

<?php if ($results) { ?>
	<ul>
		<?php foreach($results as $result): ?>
			<li><a href="<?php echo $result->url() ?>"><?php echo $result->title() ?></a></li>
		<?php endforeach ?>
	</ul>
<?php } else { ?>
	<article class="article">
		<p>Sorry, we couldn't find anything for your search.</p>
	</article>
<?php } ?>

<?php snippet('footer') ?>
