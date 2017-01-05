<?php

// update_option('siteurl','http://www.mathevies.com/staging/');
// update_option('home','http://www.mathevies.com/staging/');
//
// update_option('siteurl','http://mathevies.dev');
// update_option('home','http://mathevies.dev');

// Yoast breadcrumbs
add_theme_support( 'yoast-seo-breadcrumbs' );

// Dequeue WPML sitepress.js
function sitepress_dequeue_script() {
   wp_dequeue_script( 'sitepress' );
   wp_deregister_script( 'sitepress' );
}
add_action( 'wp_head', 'sitepress_dequeue_script', 11 );

// Dequeue WPML language selector css
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

// Dequeue TABLEPRESS css
add_filter( 'tablepress_use_default_css', '__return_false' );


  //Wordpress reset (removes redundant scripts)
  require('functions/reset.php');

  //Enqueue scripts, styles etc.
  require('functions/enqueues.php');

  //Utilities
  require('functions/utilities.php');

  //Helper functions
  require('functions/helpers.php');

  //Project specific
  require('functions/project.php');

  //Hide user toolbar
  require('functions/remove-admin-bar.php');

  //Custom GF spinner
  require('functions/custom-form-spinner.php');

  //Move GF script to footer
  require('functions/gf-js-to-footer.php');


  //Custom Post Types
  //require('functions/custom-post-types.php');

  //Custom Taxonomies
  //require('functions/custom-taxonomies.php');
?>
