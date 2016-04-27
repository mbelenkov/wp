<?php get_header(); ?>

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
      </div>

      <div class="postmeta">
        <span class="author">Posted by: <?php the_author(); ?></span>
        <span class="date"><?php the_date(); ?></span>
        <span class="num-comments"><?php comments_number(); ?></span>
        <span class="categories"><?php the_category(); ?></span>
        <span class="tags"><?php the_tags(); ?></span>
      </div>
    </article>

    <?php endwhile; ?>
    <?php else: ?>
      <h2>There are no blog posts here.</h2>
    <?php endif; ?>
  </section>

  <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>