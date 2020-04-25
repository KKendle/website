    </div> <?php // end #content ?>
  </div> <?php // end #page ?>

  <footer id="colophon" class="site-footer">
    <div id="contact" class="l-row l-row__container">
      <div class="l-column">
        <div class="l-squish--xl l-squeeze c-form c-form__footer">
          <div class="l-squish l-squeeze c-form__content">
            <h2>Get in touch</h2>
            <p>Like to work with me? Fill out the form.</p>
          </div>
          <div class="l-squish l-squeeze c-form__form">
            <?php echo do_shortcode('[wpforms id="42" title="false" description="false"]'); ?>
          </div>
        </div>
      </div>
    </div>

    <?php /* icon attribution */ ?>
    <div class="visibility--hidden">
      <div>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
    </div>

    <?php wp_footer(); ?>
  </footer>
</body>
</html>
