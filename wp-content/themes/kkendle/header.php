<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kkendle
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NRCHT5Q');</script>
  <!-- End Google Tag Manager -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRCHT5Q"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kkendle' ); ?></a>

    <div id="content" class="site-content">

      <header id="masthead" class="site-header">
        <div class="l-row l-row__container">
          <div class="l-column">
            <div class="l-squish l-squeeze">
              <?php
              /**
               * SITE BRANDING
               */
              ?>
              <div class="c-siteBranding">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="c-siteBranding__title h1">
                  Kevin Kendle
                </a>
                <p class="c-siteBranding__description">
                  <?php bloginfo('description'); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </header>
