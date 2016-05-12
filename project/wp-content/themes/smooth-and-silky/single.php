<?php get_header(); ?>

<main id="content" class="cf">
  <section class="blog-posts">
    <?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>

    <article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title"><?php the_title(); ?></h2>

      <div class="entry-content cf">
        <div class="post-data">
          <span class="author">Posted by: <?php the_author(); ?></span> on 
          <span class="date"><?php the_date(); ?></span>
        </div>
        <?php
          if(is_singular()):
            if(has_post_thumbnail()){
              ?>
              <figure class="blog-featured-image">
                <?php the_post_thumbnail(); ?>
              </figure>
              <?php
            }
            the_content();
          else:
            the_excerpt();
          endif;
        ?>
      </div>

      <?php
        wp_link_pages(array(
          'before'          =>  '<div class="link-pages-pag">',
          'after'           =>  '</div>',
          'next_or_number'  =>  'next',
        ));
      ?>

      <div class="postmeta">
        <span class="categories"><?php the_category(); ?></span>
        <span class="tags"><?php the_tags(); ?></span>
        <span class="num-comments"><?php comments_number(); ?></span> 
      </div>
    </article>

    <?php endwhile; ?>

    <?php comments_template(); ?>

    <?php else: ?>
      <h2>There are no blog posts here.</h2>
    <?php endif; ?>
  </section>

  <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>