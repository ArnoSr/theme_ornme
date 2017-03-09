<!-- pagination -->
<div class="pagination">
    <?php echo('<p>Page <span>'.max(1, get_query_var('paged')).'</span> sur <span>'.$wp_query->max_num_pages.'</span></p>'); ?>
	<?php html5wp_pagination(); ?>
</div>
<!-- /pagination -->
