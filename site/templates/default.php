<?php snippet('header') ?>

<?php snippet('article', array('article' => $page)) ?>

<section class="comments">
	<?php snippet('disqus', array('disqus_shortname' => 'thenittygritty')) ?>
</section>

<?php snippet('footer') ?>
