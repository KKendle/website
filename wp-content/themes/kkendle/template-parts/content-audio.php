<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="c-post__title entry-header">

    <span class="dashicons dashicons-format-<?php echo get_post_format($post->ID); ?>"></span>
    <?php the_title('<h1>', '</h1>'); ?>

    <p><?php esc_html_e('Enjoy this audio post', 'kkendle'); ?></p>

    <div class="byline">
      <?php esc_html_e( 'Author:' ); ?> <?php the_author(); ?>
    </div>
  </header>

  <div class="c-post__content entry-content">
    <?php the_content(); ?>
  </div>

  <?php
  /**
   * COMMENTS
   */
  ?>
  <?php if(comments_open()): ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</article>
