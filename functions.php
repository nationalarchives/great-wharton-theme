<?php
// add support for featured images

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

// removes unwanted emoji scripts and styles from header

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// fixes relative urls

function fix_internal_url($url) {
    $arrUrl = parse_url($url);

    return $arrUrl[ 'path' ];
}



?>