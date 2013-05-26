<?php snippet('header') ?>

<?php snippet('article', array('article' => $page)) ?>

<?php if ($page->comments() == 'on'): ?>
<section class="comments">
	<?php snippet('disqus', array('disqus_shortname' => 'thenittygritty')) ?>
</section>
<?php endif ?>

<?php snippet('footer') ?>
