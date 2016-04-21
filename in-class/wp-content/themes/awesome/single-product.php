<?php get_header(); //include header.php ?>

<main id="content">
	<a href="<?php echo get_post_type_archive_link('product'); ?>" class="button">&larr; Back to Shop</a>
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" 
		<?php post_class('cf clearfix'); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<?php the_post_thumbnail('large', array('class' => 'product-image')); //don't forget to activate in functions ?>
			<div class="entry-content">
				<?php the_meta(); // list of all custom fields(price & size) ?>
				<?php the_content(); ?>
			</div>

			<?php
				// if the post has <!--nextpage->> breaks
				wp_link_pages(array(
					'before'			=>	'<div class="pagination">Continue reading this post: ',
					'after'				=>	'</div>',
					'next_or_number'	=>	'next'
				));
			?>

		

		<?php endwhile; ?>

		<?php awesome_pagination(); ?>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>