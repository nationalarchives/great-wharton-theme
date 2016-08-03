<?php
/*
 Template Name: Home
 */
get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post();?>
    <div class="overlay">
        <div class="intro">
            <div class="next-box" tabindex="2">
                <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-wharton-title.png" alt="Great Wharton title" title="Welcome to Great Wharton" tabindex="1">
                <div class="clear-both"></div>
                <div><?php the_content();?></div>
                <script>
                    document.write("<p><a href='#' role='button' class='button' id='next-click' tabindex='3'>&middot; Next &middot;</a>");
                </script>
                <!-- When there is no js -->
                <noscript>
                    <style>
                        .overlay{
                            overflow: scroll;
                        }
                        .enter-box{
                            display: none;
                        }
                        @media (min-width: 767px) {
                            .intro{
                                margin-top:120px;
                            }
                        }
                    </style>
                    <?php
                    $pageargs   = array(
                        'post_type'    => 'page',
                        'order'        => 'ASC',
                        'orderby'      => 'menu_order',
                        'posts_per_page' => -1,
                        'post__not_in' => array( get_option( 'page_on_front' ) ),
                    );
                    $page_query = new WP_Query( $pageargs );
                    if ( $page_query->have_posts() ) {
                        while ( $page_query->have_posts() ) {
                            $page_query->the_post();
                            $page_id = $page_query->post->ID;
                            //show only pages with category i.e. hide all non-story content
                            if ( has_category() ) {
                                ?>
                                <a href="<?php echo make_path_relative( get_permalink() ); ?>"><?php the_title(); ?></a><br>
                            <?php
                            }
                        }
                    }
                    wp_reset_postdata();
                    ?>
                    <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> To experience this website at its best please enable JavaScript in your browser.</p>
                </noscript>
                <div class="clear-space"></div>
                    <span>
                        <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-logo.png" alt="The  National Archives logo" title="The National Archives">
                    </span>
                <div class="clear-space"></div>
                <p class="small">We use cookies to improve services and ensure they work for you. Read our <a href="http://www.nationalarchives.gov.uk/legal/cookies.htm">cookie policy</a>.</p>
            </div>
            <!-- Instructions -->
            <div class="enter-box" tabindex="4">
                <?php
                // Fetch page meta values
                $intImgUrl1 = get_post_meta( $post->ID, 'instructions_img_url_1', true );
                $intImgTitle1 = get_post_meta( $post->ID, 'instructions_img_title_1', true );
                $intText1 = get_post_meta( $post->ID, 'instructions_text_1', true );
                $intImgUrl2 = get_post_meta( $post->ID, 'instructions_img_url_2', true );
                $intImgTitle2 = get_post_meta( $post->ID, 'instructions_img_title_2', true );
                $intText2 = get_post_meta( $post->ID, 'instructions_text_2', true );
                $intImgUrl3 = get_post_meta( $post->ID, 'instructions_img_url_3', true );
                $intImgTitle3 = get_post_meta( $post->ID, 'instructions_img_title_3', true );
                $intText3 = get_post_meta( $post->ID, 'instructions_text_3', true );
                ?>
                <h2>How to find your way around Great Wharton</h2>
                <div class="col">
                      <div class="icon">
                          <img src="<?php echo $intImgUrl1; ?>" title="<?php echo $intImgTitle1; ?>">
                      </div>
                    <p><?php echo $intText1; ?></p>
                </div>
                <div class="col">
                    <div class="icon">
                        <img src="<?php echo $intImgUrl2; ?>" title="<?php echo $intImgTitle2; ?>">
                    </div>
                    <p><?php echo $intText2; ?></p>
                </div>
                <div class="col">
                    <div class="icon">
                        <img src="<?php echo $intImgUrl3; ?>" title="<?php echo $intImgTitle3; ?>">
                    </div>
                    <p><?php echo $intText3; ?></p>
                </div>
                <div class="clear-both"></div>
                <script>
                    document.write("<p><a href='#' role='button' class='button' id='enter-click' tabindex='5'>&middot; Enter &middot;</a></p>");
                    document.write("<p><a href='#' id='return-click' tabindex='5'>Back to introduction</a></p><p></p>");
                </script>
            </div>
            <!-- Instructions end -->
        </div>
    </div>
	
    <main role="main">
    <!-- Main wrapper start here -->
	    <h1 class="sr-only"><?php the_title();?></h1>

        <!-- Canvas viewer start here-->
        <div class="canvas-viewer" id="wrapper">
            <!--
            Pass Category, CSS ID and Tab
            CSS ID must NOT be same as hashtag, otherwise it will interfere with the repositioning.
            -->
            <?php get_top_category_post('postman', 'houses', '6');?>
            <?php get_top_category_post('schools', 'children', '7');?>
            <?php get_top_category_post('police-station', 'police', '8');?>
            <?php get_top_category_post('train', 'eggtrain', '9');?>
            <?php get_top_category_post('railway-gates', 'scouts', '10');?>
            <?php get_top_category_post('grocery-shop', 'shop', '11');?>
            <?php get_top_category_post('strike', 'industrial-action', '12');?>
            <?php get_top_category_post('women-drinking', 'munitions-workers', '13');?>
            <?php get_top_category_post('factory', 'munitions-factory', '14');?>
            <?php get_top_category_post('bomb-crater', 'enemy-action', '15');?>
            <?php get_top_category_post('field', 'child-labour', '16');?>
            <?php get_top_category_post('hunt', 'forest', '17');?>

            <div class="main_background"></div>
        </div>
        <!-- Canvas viewer end here -->

    <!-- Main wrapper end here -->
    </main>

	<!-- Learn more here -->
    <?php $key="more_url";
    if (get_post_meta($post->ID, $key, true)) { ?>
        <div class="learn_more_wrap">
            <div class="learn_more">
                <?php echo get_post_meta($post->ID, "more_text", true);?>
                <a href="<?php   echo get_post_meta($post->ID, $key, true);?>" role="button" class="button" tabindex="18">&middot; <?php echo get_post_meta($post->ID, "more_button", true);?> &middot;</a>
            </div>
            <div class="learn_more_close">
                <i class="fa fa-times fa-2x"></i>
            </div>
        </div>
    <?php }?>
	<!-- Learn more end here -->

	<div class="map-zoom">Zoom <i id="zoom_plus" class="fa fa-plus" aria-hidden="true" title="Zoom in"></i> <i id="zoom_minus" class="fa fa-minus" aria-hidden="true" title="Zoom out"></i></div>

	<!-- Branding here -->
    <div class="about">
        <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-wharton-title-colour.png" alt=" Great Wharton title" title="View the introduction to Great Wharton" tabindex="5">
    </div>
    <div class="tna_brand">
        <a href="http://nationalarchives.gov.uk" title="Visit The National Archives website" tabindex="4">
            <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-logo-white.png" alt="The National Archives logo">
        </a>
    </div>
	<!-- Branding end here -->

<?php endwhile; ?>

<?php endif; ?>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/utils/Draggable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/tpp.min.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/tiles.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/scripts.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/great-wharton.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/js-cookie.js"></script>

<?php get_footer(); ?>

