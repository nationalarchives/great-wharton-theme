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

// adds categories to pages

function add_taxonomies_to_pages() {
    register_taxonomy_for_object_type( 'post_tag', 'page' );
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_taxonomies_to_pages' );


// function to build marker links

function get_top_category_post($cat, $id, $tab){

    $catname = $cat;
    $divid = $id;
    $tabindex = $tab;

    $args = array(
        'category_name' => $catname,
        'post_type' => 'page',
        'posts_per_page' => 1,
        'order' => 'ASC',
        'orderby' => 'menu_order',

    );

    $cat_query = new WP_Query($args);

    if ($cat_query->have_posts()) {

        while ($cat_query->have_posts()) {
            $cat_query->the_post();



            echo('<a href="' . make_path_relative( get_the_permalink() ) . '" title="' . get_the_title() . '"  class="marker" id="' . $divid . '" tabindex="' . $tabindex . '" >'. get_the_title() .'</a>');


        }

    }

    wp_reset_postdata();



}



// remove wordpress toolbar

show_admin_bar(false);

// Edit as required
function tnatheme_globals() {
    global $pre_path;
    global $pre_crumbs;
    if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
        $pre_path = '';
        $pre_crumbs = array(
            'Home front stories' => '/'
        );
    } else {
        $pre_crumbs = array(
            'First World War' => '/first-world-war/',
            'Home front stories' => '/home-front-stories/',
        );
        $pre_path = '/first-world-war/home-front-stories';
    }
}
if ( $_SERVER['SERVER_ADDR'] !== $_SERVER['REMOTE_ADDR'] ) {
    tnatheme_globals(); } else {
    $pre_path = '';
    $pre_crumbs = array(
        'Home front stories' => '/'
    );
}

// Make styles and scripts paths relative
add_filter( 'script_loader_src', 'tna_styles_scripts_relative' );
add_filter( 'style_loader_src', 'tna_styles_scripts_relative' );
function tna_styles_scripts_relative( $url ) {
    return str_replace( site_url(), '', $url );
}
// Make template URLs relative
function make_path_relative( $url ) {
    global $pre_path;
    return str_replace( site_url(), $pre_path, $url );
}
// Fix URLs in wp_head
function tna_wp_head() {
    ob_start();
    wp_head();
    $wp_head = ob_get_contents();
    ob_end_clean();
    global $pre_path;
    $wp_head = str_replace( site_url(), 'http://www.nationalarchives.gov.uk' . $pre_path, $wp_head );
    echo $wp_head;
}

