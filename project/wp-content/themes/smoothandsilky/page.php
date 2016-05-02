<?php get_header(); ?>

<div class="front-page-banner">
  <div class="overlay"></div>
  <?php the_post_thumbnail('full'); ?>
</div>

<main id="content" class="cf">
  <section class="blog-posts">
    <?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
    <article id="post-<?php the_id(); ?>">
      <h2 class="entry-title"> 
        <a href="<?php the_permalink(); ?>"> 
            <?php the_title(); ?>
        </a>
      </h2>

      <div class="entry-content">
        <?php
          if(is_singular()):
            the_content();
          else:
            the_excerpt();
          endif;
        ?>
      </div>
    </article>

    <?php endwhile; ?>
    <?php else: ?>
      <h2>There are no blog posts here.</h2>
    <?php endif; ?>
  </section>

  <?php get_sidebar('pages'); ?>
</main>

<?php get_footer(); ?>