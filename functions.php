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



            echo('<a href="' .get_the_permalink(). '" tabindex="' .$tabindex. '" title="' .get_the_title(). '"><div class="marker" id="' .$divid. '"></div></a>');


        }

    }

    wp_reset_postdata();



}

// remove wordpress toolbar

show_admin_bar(false);

?>