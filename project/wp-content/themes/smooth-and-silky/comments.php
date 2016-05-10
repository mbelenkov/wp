<?php
if(post_password_required()):
	echo 'Enter the password to see the comments.';
	return;
endif;

$comment_type = separate_comments($comments);
$comment_count = count($comment_type['comment']);
$ping_count = count($comment_type['pings']);
?>
<section class="comments">
	<h5 class="comments-title">
		<?php echo $comment_count ?> Comments | 
		<a href="#respond">Leave a Comment</a>
	</h5>

	<ul class="comment-list">
		<?php
			wp_list_comments(array(
				'type'			=>	'comment',
				'avatar_size'	=>	75,
			));
		?>
	</ul>

	<div class="comment-pagination">
		<?php
			previous_comments_link();
			next_comments_link();
		?>
	</div>
</section>

<?php 
	comment_form();
	if($ping_count >= 1):
?>
<section>
	<h5 class="trackback-title">Mentioned by <?php echo $ping_count; ?> sites.</h5>
	<ul>
		<?php
			wp_list_comments(array(
				'type'			=>	'pings',
			));
		?>
	</ul>
</section>
<?php endif; ?>