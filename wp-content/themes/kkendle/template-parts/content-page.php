<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="c-post__title entry-header">
    <?php the_title('<h1>', '</h1>'); ?>
  </header>

  <div class="c-post__content entry-content">
    <?php the_content(); ?>
  </div>
</article>
