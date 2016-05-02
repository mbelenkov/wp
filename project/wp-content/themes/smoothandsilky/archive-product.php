<?php get_header(); ?>

<main id="content" class="cf">
  <section class="blog-posts">
    <?php if(have_posts()): ?>
    <h2>Products</h2>
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

    <?php smoothandsilky_pagination(); ?>

    <?php else: ?>
      <h2>There are no products here.</h2>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>