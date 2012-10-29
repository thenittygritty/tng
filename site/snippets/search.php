<form method="get" action="<?php echo url('search') ?>" class="search">
	<label for="search" class="visuallyhidden">Search for</label>
	<input type="search" name="search" placeholder="Search" id="search"
			value="<?php echo $site->uri->query('search'); ?>" class="search-field">
	<input type="submit" class="search-submit">
</form>
