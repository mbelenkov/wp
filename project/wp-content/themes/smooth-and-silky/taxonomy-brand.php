<?php get_header(); ?>

<main id="content" class="cf">
  <section class="blog-posts">
    <?php if(have_posts()): ?>
    <h2 class="page-title"><?php single_term_title(); ?> Products</h2>
    <?php while(have_posts()): the_post(); ?>

    <article id="post-<?php the_id(); ?>">
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
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

          $price = get_post_meta($post->ID, 'Price', true);
          $weight = get_post_meta($post->ID, 'Weight', true);
          if($price):
        ?>
          <span class="product-price"><?php echo $price; ?></span>
        <?php
          endif;
          if($weight):
        ?>
          <span class="product-weight"><?php echo $weight; ?></span>
        <?php endif; ?>
      </div>
    </article>

    <?php endwhile; ?>
    <?php else: ?>
      <h2>There are no brands here.</h2>
    <?php endif; ?>
  </section>

  <?php get_sidebar('shop'); ?>
</main>

<?php get_footer(); ?>