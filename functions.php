<?php 

function IGTfiles() {
 	/*# this is css */
 	wp_enqueue_script('main-IGT-java', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
 	wp_enqueue_style('font-google', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
 	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
 	wp_enqueue_style('IGT_main_styles', get_stylesheet_uri()) ;
 	/*!java would be wp_enqueue_script >*/
}

add_action('wp_enqueue_scripts', 'IGTfiles' );

function IGT_features() { 
  add_theme_support('title-tag'); 

}

add_action('after_setup_theme', 'IGT_features');