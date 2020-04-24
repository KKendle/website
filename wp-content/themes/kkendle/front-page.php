<?php get_header('landing'); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <div class="l-row l-row__container l-flex__middle">

      <?php
      /**
       * ABOUT
       */
      ?>
      <div class="l-column l-column--1-2@handsWide-up">
        <div class="l-squish l-squeeze">
          <h2>About</h2>
          <p>I’m a front-end developer, primarily experienced with UI/UX. I’ve worked several years in the field, architected Design Systems - both in Sketch and in code, documented Use Cases for the various components, provided examples of failings related to Accessibility to (upper) management with examples of solutions, and always took the initiative to improve team efficiency and reduce tech debt wherever possible.</p>
          <p>I excel at writing semantic and accessible HTML, reusable and flexible Scss, testing and documenting accessibility concerns, and creating responsive designs that account for edge cases.</p>
          <p>Find me on <a href="https://github.com/kkendle" target="_blank" rel="noopener noreferrer nofollow">Github</a> and <a href="https://linkedin.com/in/kevinkendle" target="_blank" rel="noopener noreferrer nofollow">LinkedIn</a></p>
        </div>
      </div>

      <?php
      /**
       * HIRE ME
       */
      ?>
      <div class="l-column l-column--1-2@handsWide-up">
        <div class="l-squish l-flex l-flex__center">
          <div class="c-hire">
            <h2 class="c-hire__title">I am currently available for hire.</h2>
            <div class="c-button__container">
              <a class="c-button c-button__2" href="#contact">Hire Me</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    /**
     * SKILLS
     */
    ?>
    <div class="l-row l-row__container">
      <div class="l-column l-column--1-2@handsWide-up">
        <div class="l-squish l-squeeze">
          <h2>Skills</h2>
          <ul class="c-list c-list__columns--2">
            <li class="c-list__item">Accessibility</li>
            <li class="c-list__item">CSS</li>
            <li class="c-list__item">Git</li>
            <li class="c-list__item">Gulp</li>
            <li class="c-list__item">HTML</li>
            <li class="c-list__item">Javascript</li>
            <li class="c-list__item">PHP</li>
            <li class="c-list__item">Responsive Design</li>
            <li class="c-list__item">User Experience (UX)</li>
            <li class="c-list__item">User Interface (UI)</li>
            <li class="c-list__item">WCAG 2.1 AA</li>
            <li class="c-list__item">WordPress</li>
          <ul>
        </div>
      </div>
    </div>

    <?php
    /**
     * WORK
     */
    ?>
    <?php
    $args = [
      'post_type' => 'work',
      'posts_per_page' => -1,
    ];
    $works = new WP_Query($args);
    if($works->have_posts()): ?>
      <div class="l-row l-row__container l-squish">
        <div class="l-column">
          <div class="l-squeeze">
            <h2>Recent Work</h2>
          </div>
        </div>
        <?php while($works->have_posts()):
          $works->the_post(); ?>

          <div class="l-column l-column--1-2@handsWide-up">
            <div class="l-squeeze">

              <div class="c-work">
                <?php if(has_post_thumbnail()): ?>
                  <div class="c-work__img">
                    <img src="<?php echo get_the_post_thumbnail_url(null, 'work'); ?>" alt="" />
                  </div>
                <?php endif; ?>
                <div class="c-work__content">
                  <div class="c-work__icon">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/icons/icon-code.svg'; ?>" alt="">
                  </div>
                  <h3 class="c-work__title"><?php esc_html_e(get_the_title(), 'kkendle'); ?></h3>
                  <?php if(has_excerpt()): ?>
                    <div class="c-work__excerpt">
                      <?php echo wp_trim_words( get_the_excerpt(), 15, null ); ?>
                    </div>
                  <?php endif; ?>
                  <div class="c-button__container">
                    <a class="c-button c-button__2" href="<?php echo get_the_permalink(); ?>">Learn More</a>
                  </div>
                </div>
              </div>

            </div>
          </div>

        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>
    <?php endif; ?>
  </main>
</div>

<?php get_footer(); ?>
