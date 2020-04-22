<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="c-post__title entry-header">

    <span class="dashicons dashicons-format-<?php echo get_post_format($post->ID); ?>"></span>
    <?php the_title('<h2><a href="' . esc_url(get_the_permalink()) . '">', '</a></h2>'); ?>

    <div class="byline">
      <?php esc_html_e( 'Author:' ); ?>
      <a href="<?php echo esc_url(get_author_posts_url($post->post_author)); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
    </div>
  </header>

  <div class="c-post__content entry-content">
    <?php the_excerpt(); ?>
  </div>

</article>
