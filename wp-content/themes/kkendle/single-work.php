<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <div class="l-row l-row__container">

      <div class="l-column l-column--1-2@handsWide-up l-flex__order--2@handsWide-up">
        <div class="l-squeeze l-squish">
          <?php if(has_post_thumbnail()): ?>
            <div class="c-work__img">
              <img src="<?php echo get_the_post_thumbnail_url(null, 'work'); ?>" alt="" />
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="l-column l-column--1-2@handsWide-up">
        <div class="l-squeeze l-squish">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

  </main>
</div>


<?php get_footer(); ?>
