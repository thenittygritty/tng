<!-- Pagination -->
<?php if ($articles->pagination()->hasPages()): ?>

<nav class="paginate">
	<ul>
		<?php // Previous page ?>
		<?php if (!$articles->pagination()->isFirstPage()) { ?>
			<li class="paginate-previous">
				<a href="<?php echo $articles->pagination()->prevPageURL(); ?>" title="Go to previous page">&lsaquo;</a>
			</li>
		<?php } ?>

		<?php // Render all page ?>
		<?php
			for ($i = 1, $length = $articles->pagination()->countPages(); $i <= $length; $i++) {
		?>
			<li><a href="<?php echo $articles->pagination()->pageURL($i); ?>" title="Go to page <?php echo $i ?>"><?php echo $i; ?></a></li>
		<?php
			}
		?>

		<?php // Next page ?>
		<?php if (!$articles->pagination()->isLastPage()) { ?>
			<li class="paginate-next">
				<a href="<?php echo $articles->pagination()->nextPageURL(); ?>" title="Go to next page">&rsaquo;</a>
			</li>
		<?php } ?>
	</ul>
</nav>

<?php endif ?>
