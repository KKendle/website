<?php

// ------------
// ADD THEME SUPPORT
// ------------
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', [
  'aside',
  'gallery',
  'link',
  'image',
  'quote',
  'status',
  'video',
  'audio',
  'chat'
]);
add_theme_support('html5');
add_theme_support('automatic-feed-links');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('custom-logo');
add_theme_support('customize-selective-refresh-widgets');
// add_theme_support('starter-content');




// ------------
// ENQUEUE CUSTOM SCRIPTS AND STYLES
// ------------
function kkendle_custom_scripts() {
  // remove old, default jquery
  wp_deregister_script('jquery');
  // add latest jquery
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', [], '3.4.1');

  // styles
  wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css', [], time());
  wp_enqueue_style('_theme-stylesheet', get_template_directory_uri() . '/dist/css/main.css', [], time());

  // scripts
	wp_enqueue_script( '_theme-script', get_template_directory_uri() . '/dist/js/main.js', ['jquery'], time());
}
add_action( 'wp_enqueue_scripts', 'kkendle_custom_scripts' );




//------------
// ADD GOOGLE FONTS
//------------
function addGoogleFonts()
{
    /**
     * source: https://csswizardry.com/2020/05/the-fastest-google-fonts/
     * 1. Preemptively warm up the fonts’ origin.
     * 2. Initiate a high-priority, asynchronous fetch for the CSS file. Works in
     *    most modern browsers.
     * 3. Initiate a low-priority, asynchronous fetch that gets applied to the page
     *    only after it’s arrived. Works in all browsers with JavaScript enabled.
     * 4. In the unlikely event that a visitor has intentionally disabled
     *    JavaScript, fall back to the original method. The good news is that,
     *    although this is a render-blocking request, it can still make use of the
     *    preconnect which makes it marginally faster than the default.
     */

    $siteURL = 'https://fonts.googleapis.com/css2?';
    $fonts = 'family=Nixie+One&family=Overpass&family=Signika';
    $fontDisplay = '&display=swap';
    $googleFontURL = $siteURL . $fonts . $fontDisplay;
    ?>

    <?php // [1] ?>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <?php // [2] ?>
    <link rel="preload" as="style" href="<?php echo $googleFontURL; ?>" />

    <?php // [3] ?>
    <link rel="stylesheet" href="<?php echo $googleFontURL; ?>" media="print" onload="this.media='all'" />

    <?php // [4] ?>
    <noscript>
        <link rel="stylesheet" href="<?php echo $googleFontURL; ?>" />
    </noscript>
    <?php
}
add_action('wp_head', 'addGoogleFonts');



//------------
// REGISTER NAVS
//------------
// This theme uses wp_nav_menu() in one location.
// comment out or remove the default registered nav.
register_nav_menus( array(
  'menu-1' => esc_html__( 'Primary', 'kkendle' ),
) );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
  'menu-2' => esc_html__( 'Secondary', 'kkendle' ),
) );



// ------------
// NAVIGATION WALKER
// ------------
// menu has to be created and added to work
class KKendle_Navigation_Walker extends Walker_Nav_Menu {

  function start_lvl(&$output, $depth = 0, $args = null) {
    $submenu = ($depth >= 0) ? 'sub-menu ' : '';
    $output .= '<ul class="dropdown-menu ' . $submenu . ' depth_' . $depth . '">';
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
    $classes[] = 'menu-item-' . $item->ID;
    if($depth && $args->walker->has_children):
      $classes[] = 'dropdown-submenu';
    endif;

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= '<li' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $attributes .= ($args->walker->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= '<span>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= ($depth >= 0 && $args->walker->has_children) ? ' </a><button class="c-button c-button__toggle c-button--noStyle" data-js="toggle" aria-expanded="false"><span class="screen-reader-text">Toggle Sub Menu</span></button>' : '</a>';
    $item_output .= '</span>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}




//------------
// SIDEBARS
//------------
function kkendle_widget_init() {
  $args = [
    'name' => esc_html__('Main Sidebar', 'kkendle'),
    'id' => 'main-sidebar',
    'description' => esc_html__('Add widgets here for main sidebar', 'kkendle'),
    'before_widget' => '<section class="c-widget widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="c-wiget__title widget-title">',
    'after_title' => '</h2>',
  ];
  register_sidebar($args);
}
add_action('widgets_init', 'kkendle_widget_init');



//------------
// READ MORE LINK
//------------
function kkendle_excerpt_more($more) {
  global $post;
  return ' [...] <div class="c-post__readMore"><a href="'. get_permalink($post->ID) . '">View full post <span class="visibility--hidden">on ' . $post->post_title . '</span></a></div>';
}
add_filter('excerpt_more', 'kkendle_excerpt_more');




//------------
// IMAGE SIZES
//------------
add_image_size( 'work', 598, 337, true );

?>
