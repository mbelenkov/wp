<?php get_header(); ?>

<main id="content" class="cf">
  <section class="blog-posts">
    <a class="back-to-products" href="<?php echo get_post_type_archive_link('product'); ?>">Back to Products</a>
    <?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>

    <article id="post-<?php the_id(); ?>">
      <h2 class="entry-title"><?php the_title(); ?></h2>

      <div class="entry-content">
        <?php
          the_post_thumbnail('large');
          the_terms($post->ID, 'brand', '<h3>Brand: ', ', ', '</h3>');
          $price = get_post_meta($post->ID, 'Price', true);
          $weight = get_post_meta($post->ID, 'Weight', true);
          if($price):
        ?>
          <p class="product-price"><?php echo $price; ?></p>
        <?php
          endif;
          if($weight):
        ?>
          <p class="product-weight"><?php echo $weight; ?></p>
        <?php endif;
          if(is_singular()):
            the_content();
          else:
            the_excerpt();
          endif;
        ?>
      </div>
    </article>

    <?php endwhile; ?>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>