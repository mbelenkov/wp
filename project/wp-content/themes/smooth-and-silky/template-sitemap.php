<?php
  /*
  Template Name: Sitemap

  This template will generate a complete sitemap of all your posts, pages, categories.
  */
  get_header();
?>

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
        <?php the_content(); ?>
        <section>
          <h3>Pages:</h3>
          <ul>
            <?php
              wp_list_pages(array(
                'title_li'      =>  '',
                'sort_column'   =>  'post_title',
              ));
            ?>
          </ul>
        </section>
        <section>
          <h3>Categories:</h3>
          <ul>
            <?php
              wp_list_categories(array(
                'title_li'      =>  '',
                'show_count'    =>  true,
                'feed'          =>  'rss',
              ));
            ?>
          </ul>
        </section>
        <section>
          <h3>Posts:</h3>
          <ul>
            <?php
              wp_get_archives(array(
                'type'      =>  'alpha',
              ));
            ?>
          </ul>
        </section>
      </div>
    </article>

    <?php endwhile; ?>
    <?php else: ?>
      <h2>There is no sitemap here.</h2>
    <?php endif; ?>
  </section>

  <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>