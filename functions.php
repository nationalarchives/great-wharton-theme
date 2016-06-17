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

// Theme URL rewrites
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

// Notification banner
// When enabled, via dashboard banner settings page, displays a notification banner at the top of the page
// Utilising WP Settings API (https://codex.wordpress.org/Settings_API)
if ( ! function_exists( 'notification_banner' ) ) :
    function banner_styles() {
        $enable = get_option('enable_banner');
        if ( $enable ) {
            wp_register_style( 'banner-styles', get_template_directory_uri() . '/css/banner.css', array(), '0.1',
                'all' );
            wp_enqueue_style( 'banner-styles' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'banner_styles' );
    function notification_banner() {
        $enable = get_option('enable_banner');
        if ( $enable ) {
            $notice_title = get_option('banner_title');
            $notice_text = get_option('banner_text');
            ?>
            <div class="notification-banner">
                <div class="notice">
                    <strong class="title"><?php echo $notice_title; ?></strong>
                    <?php echo $notice_text; ?>
                </div>
            </div>
            <?php
        }
        else {
            // do nothing
        }
    }
endif;
// Banner settings page
function banner_settings_page() {
    ?>
    <div class="wrap">
        <h1>Notification banner</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('section');
            do_settings_sections('banner-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
function add_banner_menu_item() {
    add_options_page('Notification banner settings', 'Notification banner', 'manage_options', 'my-setting-admin', 'banner_settings_page', null, 99);
}
add_action('admin_menu', 'add_banner_menu_item');
function enable_banner_element() {
    ?>
    <input type="checkbox" name="enable_banner" value="1" <?php checked(1, get_option('enable_banner'), true); ?> />
    <?php
}
function banner_title_element() {
    ?>
    <input type="text" name="banner_title" id="banner_title" value="<?php echo get_option('banner_title'); ?>" />
    <?php
}
function banner_text_element() {
    wp_editor( get_option('banner_text'), 'banner_text',
        array(
            'media_buttons' => false,
            'textarea_rows' => 4,
            'tinymce' => array( 'toolbar1'=> 'bold,link,unlink' ),
            'quicktags' => false,
            'wpautop' => false
        )
    );
}
// Adds section, fields and settings to settings page in Dashboard > Settings > Notification banner
function display_banner_panel_fields() {
    add_settings_section('section', 'Banner settings', null, 'banner-settings');
    add_settings_field('enable_banner', 'Enable banner site wide', 'enable_banner_element', 'banner-settings', 'section');
    add_settings_field('banner_title', 'Banner title', 'banner_title_element', 'banner-settings', 'section');
    add_settings_field('banner_text', 'Banner text', 'banner_text_element', 'banner-settings', 'section');
    register_setting('section', 'enable_banner');
    register_setting('section', 'banner_title');
    register_setting('section', 'banner_text');
}
add_action('admin_init', 'display_banner_panel_fields');

function add_image_responsive_class($content) {

    global $post;

    $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";

    $replacement = '<img$1class="$2 img-responsive"$3>';

    $content = preg_replace($pattern, $replacement, $content);

    return $content;

}

add_filter('the_content', 'add_image_responsive_class');


function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)=("|\')\d*(|px)("|\')\s/', "", $html );
    return $html;
}
add_filter( 'the_content', 'remove_width_attribute', 10 );