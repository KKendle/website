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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
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
                <div class="c-button__container">
                  <a class="c-button c-button__1" href="#contact">Hire Me</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
