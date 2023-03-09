<ol class="comment-list">
	<?php
	wp_list_comments( array(
		'style'       => 'ol',
		'short_ping'  => true,
		'avatar_size' => 50,
	) );
	?>
</ol>
<?php comment_form(); ?>
<?php paginate_comments_links(); ?>