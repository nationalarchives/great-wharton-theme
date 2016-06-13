

<?php

/*
 Template Name: Home
 */

get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post();?>
    <div class="overlay">
        <div class="intro">
            <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-wharton-title.png" alt="Great Wharton title" title="Welcome to Great Wharton" tabindex="1">
            <div tabindex="2"><?php the_content();?></div>
<script>
            document.write("<p><a href='#' role='button' class='button' id='enter-click' tabindex='3'>&middot; Enter &middot;</a>");
</script>

                <noscript>
                    <style>
                        .overlay{
                           overflow: scroll;
                        }

                    </style>


                <?php
                $pageargs   = array(
                    'post_type'    => 'page',
                    'order'        => 'ASC',
                    'orderby'      => 'menu_order',
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


            </noscript>


            </p>

            <p>To experience this website at its best please enable JavaScript in your browser.</p>

            <div class="clear-space"></div>
                        <span>
                            <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-logo.png" alt="The  National Archives logo" title="The National Archives">
                        </span>
            <div class="clear-space"></div>

            <p class="small">We use cookies to improve services and ensure they work for you. Read our <a href="http://www.nationalarchives.gov.uk/legal/cookies.htm">cookie policy</a>. </p>
        </div>
    </div>
    <main role="main">
        <div class="about">
            <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-wharton-title-colour.png" alt=" Great Wharton title" title="View the introduction to Great Wharton" tabindex="5">
        </div>

        <div class="tna_brand">
            <a href="http://nationalarchives.gov.uk" title="Visit The National Archives website" tabindex="4">
                <img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-logo-white.png" alt="The National Archives logo">
            </a>
        </div>
        <div class="map-zoom">Zoom <i class="fa fa-plus" aria-hidden="true" title="Zoom in"></i> <i class="fa fa-minus" aria-hidden="true" title="Zoom out"></i></div>
        <!-- Main wrapper start here -->
        <section class="wrapper">
            <h1 class="sr-only"><?php the_title();?></h1>

            <!-- Canvas viewer start here-->
            <div class="canvas-viewer" id="wrapper">
<!--
Pass Category, CSS ID and Tab

CSS ID must NOT be same as hashtag, otherwise it will interfere with the repositioning.

-->
                <?php get_top_category_post('rationing', 'houses', '6');?>
                <?php get_top_category_post('schools', 'children', '7');?>
                <?php get_top_category_post('food-shortages', 'eggtrain', '8');?>
                <?php get_top_category_post('railway-gates', 'scouts', '9');?>
                <?php get_top_category_post('grocery-shop', 'shop', '10');?>
                <?php get_top_category_post('strike', 'industrial-action', '11');?>
                <?php get_top_category_post('women-drinking', 'munitions-workers', '12');?>
                <?php get_top_category_post('factory', 'munitions-factory', '13');?>
                <?php get_top_category_post('zeppelin-raids', 'enemy-action', '14');?>
                <?php get_top_category_post('field', 'child-labour', '15');?>
                <?php get_top_category_post('hunt', 'forest', '16');?>


                <!--                <a href="wharton-sub.htm" tabindex="1">-->
                <!--                    <div class="marker" id="children"></div>-->
                <!--                </a>-->
                <!--                <a href="wharton-sub.htm" tabindex="2">-->
                <!--                    <div class="marker" id="industry"></div>-->
                <!--                </a>-->
                <!--                <a href="wharton-sub.htm" tabindex="3">-->
                <!--                    <div class="marker" id="strike"></div>-->
                <!--                </a>-->
                <!--                <a href="wharton-sub.htm" tabindex="4">-->
                <!--                    <div class="marker" id="enemy-action"></div>-->
                <!--                </a>-->
                <!--                <a href="wharton-sub.htm" tabindex="5">-->
                <!--                    <div class="marker" id="land"></div>-->
                <!--                </a>-->
                <!--                <a href="wharton-sub.htm" tabindex="6">-->
                <!--                    <div class="marker" id="food"></div>-->
                <!--                </a>-->
                <!--                <a href="wharton-sub.htm" tabindex="7">-->
                <!--                    <div class="marker" id="eggtrain"></div>-->
                <!--                </a>-->
                <!--                <a href="wharton-sub.htm" tabindex="8">-->
                <!--                    <div class="marker marker-secret" id="propaganda"></div>-->
                <!--                </a>-->
                <div class="main_background"></div>
            </div>
            <!-- Canvas viewer end here -->

            <!-- Learn more start here -->


            <?php $key="more_url";

            if (get_post_meta($post->ID, $key, true)) {

                ?>
                <div class="learn_more_wrap">
                    <div class="learn_more">
                        <?php echo get_post_meta($post->ID, "more_text", true);?>
                        <a href="<?php   echo get_post_meta($post->ID, $key, true);?>" role="button" class="button" tabindex="20">&middot; <?php echo get_post_meta($post->ID, "more_button", true);?> &middot;</a>
                    </div>
                    <div class="learn_more_close">
                        <i class="fa fa-times fa-2x"></i>
                    </div>
                </div>

<?php
            }?>



            <!-- Learn more end here-->
        </section>
        <!-- Main wrapper end here -->
    </main>

<?php endwhile; ?>

<?php endif; ?>



<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/utils/Draggable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/tpp.min.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/tiles.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/scripts.js"></script>







<?php get_footer(); ?>

