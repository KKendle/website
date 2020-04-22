<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>

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

    <p>Template: home.php</p>
  </main>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
