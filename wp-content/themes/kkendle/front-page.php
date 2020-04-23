<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <div class="l-row l-row__container">
      <div class="l-column">
        <div class="l-squish l-squeeze">
          <h2>About</h2>
          <p>I’m a front-end developer, primarily experienced with UI/UX. I’ve worked several years in the field, architected Design Systems - both in Sketch and in code, documented Use Cases for the various components, provided examples of failings related to Accessibility to (upper) management with examples of solutions, and always took the initiative to improve team efficiency and reduce tech debt wherever possible.</p>
          <p>I excel at writing semantic and accessible HTML, reusable and flexible Scss, testing and documenting accessibility concerns, and creating responsive designs that account for edge cases.</p>
          <p>Find me on <a href="https://github.com/kkendle" target="_blank" rel="noopener noreferrer nofollow">Github</a> and <a href="https://linkedin.com/in/kevinkendle" target="_blank" rel="noopener noreferrer nofollow">LinkedIn</a></p>
        </div>
      </div>

      <div class="l-column">
        <h2>Skills</h2>
        <ul>
          <li>Accessibility</li>
          <li>CSS</li>
          <li>Git</li>
          <li>Gulp</li>
          <li>HTML</li>
          <li>Javascript</li>
          <li>PHP</li>
          <li>Responsive Design</li>
          <li>User Experience (UX)</li>
          <li>User Interface (UI)</li>
          <li>WCAG 2.1 AA</li>
          <li>WordPress</li>
        <ul>
      </div>
    </div>

    <div class="l-row l-row__container">
      <div class="l-column">
        <div class="l-squeeze l-squish">
          <h2>Recent Work</h2>

          <?php
          $args = [
            'post_type' => 'work',
            'posts_per_page' => -1,
          ];
          $works = new WP_Query($args);
          if($works->have_posts()):
            while($works->have_posts()):
              $works->the_post(); ?>
              <h3><?php esc_html_e(get_the_title(), 'kkendle'); ?></h3>
              <div>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
              </div>
              <div>
                <?php the_content(); ?>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          endif; ?>
  </main>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
