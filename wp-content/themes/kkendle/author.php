<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <div class="author-bio">
      <h1><?php echo get_the_archive_title(); ?></h1>
      <p><?php echo the_author_meta( 'description', $post->post_author ); ?></p>
    </div>

    <?php if(have_posts()): ?>
      <?php while(have_posts()):
        the_post(); ?>

        <?php get_template_part( 'template-parts/content-posts', get_post_format() ); ?>

      <?php endwhile;
      else: ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    <?php
    /**
     * PAGINATION
     */
    ?>
    <?php echo paginate_links([
      'before_page_number' => 'Page '
    ]); ?>

    <p>Template: author.php</p>
  </main>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
