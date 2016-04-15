<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if(is_404()):
	?>
		
		<article>
			<h2>404</h2>
			<h3>The page you are looking for could not be found.</h3>
		</article>


		<?php elseif( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" 
		<?php post_class('cf clearfix'); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<?php the_post_thumbnail('thumbnail'); //don't forget to activate in functions ?>
			<div class="entry-content">
				<?php 
				//if viewing a single post or page, show full content. otherwise, show the short content (excerpt)
				if( is_singular() ){
					the_content();
				}else{
					the_excerpt();
				}
				 ?>
			</div>
			<div class="postmeta"> 
				<span class="author"> Posted by: <?php the_author(); ?></span>
				<span class="date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
				<span class="num-comments"> <?php comments_number(); ?></span>
				<span class="categories"><?php the_category(); ?></span>
				<span class="tags"><?php the_tags(); ?></span> 
			</div><!-- end postmeta -->			
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_footer(); //include footer.php ?>