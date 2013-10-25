<?php snippet('header') ?>

<?php snippet('article', array('article' => $page)) ?>


<?php if ($page->embedtweet()): ?>

<section class="embedtweet" id="embedtweet">
	<h3 class="heading-other">Did you like this article? Let us know on Twitter!</h3>
	<?php echo $page->embedtweet() ?>
</section>
<?php endif; ?>

<?php if ($page->comments() == 'on'): ?>
<section class="comments">
	<?php snippet('disqus', array('disqus_shortname' => 'thenittygritty')) ?>
</section>
<?php endif ?>

<?php snippet('footer') ?>
