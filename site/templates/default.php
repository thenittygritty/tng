<?php snippet('header') ?>

<?php snippet('article', array('article' => $page)) ?>

<?php if (!isLink($page)) { ?>
	<section class="comments">
		<?php snippet('disqus', array('disqus_shortname' => 'thenittygritty')) ?>
	</section>
<?php } ?>

<?php snippet('footer') ?>
