<?php

function is_index_page()
{
  if (get_the_ID() == 1) {
    return true;
  } else {
    return false;
  }
}

function get_logo_uri()
{
  echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]);
}

function has_the_wifi()
{
  $has_wifi = get_field('has_wifi', get_the_ID());

  if ($has_wifi) {
    return true;
  } else {
    return false;
  }
}

function wifi_image($has)
{
  if ($has) {
    return 'wifi.png';
  } else {
    return 'no-wifi.png';
  }
}

function enqueue_styles()
{
  wp_enqueue_style(
    'main-styles',
    get_template_directory_uri() . '/style.css',
    array(),
    wp_get_theme()->get('Version'),
    'all'
  );

  wp_enqueue_style(
    'slick',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
    array(),
    '1.8.1',
    'all'
  );

  wp_enqueue_style(
    'slick-theme',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
    array(),
    '1.8.1',
    'all'
  );
}

function enqueue_scripts()
{
  wp_enqueue_script(
    'slider',
    get_template_directory_uri() . '/assets/js/slider.js',
    array(),
    wp_get_theme()->get('Version'),
    true
  );

  wp_enqueue_script(
    'reservation-form',
    get_template_directory_uri() . '/assets/js/reservation-form.js',
    array(),
    wp_get_theme()->get('Version'),
    true
  );

  wp_deregister_script('jquery-core');
  wp_register_script('jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
  wp_enqueue_script('jquery-core');

  wp_enqueue_script(
    'slick',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
    array('jquery-core'),
    '1.8.1'
  );

  wp_enqueue_script(
    'slick-invoke',
    get_template_directory_uri() . '/assets/js/slick.js',
    array('jquery-core', 'slick'),
    wp_get_theme()->get('Version'),
    true
  );

  wp_enqueue_script(
    'reservation-form',
    get_template_directory_uri() . '/assets/js/slick.js',
    array('jquery'),
    wp_get_theme()->get('Version')
  );
}

add_action('wp_enqueue_scripts', 'enqueue_styles');
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function create_custom_post_types()
{
  register_post_type('slider',
    array(
      'labels' => array(
        'name' => __('Slider', 'textdomain'),
        'singular_name' => __('Slide', 'textdomain'),
      ),
      'public' => true,
    )
  );

  register_post_type('house',
    array(
      'labels' => array(
        'name' => __('Houses', 'textdomain'),
        'singular_name' => __('House', 'textdomain'),
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  register_post_type('reviews',
    array(
      'labels' => array(
        'name' => __('Reviews', 'textdomain'),
        'singular_name' => __('Review', 'textdomain'),
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

add_action('init', 'create_custom_post_types');

function register_theme_supports()
{
  add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'register_theme_supports');

function register_menus()
{
  register_nav_menus(
    array(
      'header' => 'Header menu',
      'footer' => 'Footer menu',
    )
  );
}

add_action('init', 'register_menus');
?>