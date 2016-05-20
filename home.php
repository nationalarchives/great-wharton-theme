

<?php

/*
 Template Name: Home
 */

get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post();?>
    <div class="overlay">
        <div class="intro">
            <img src="<?php bloginfo("stylesheet_directory");?>/images/tna-wharton-title.png" alt="Great Wharton title" title="Welcome to Great Wharton" tabindex="1">
            <div tabindex="2"><?php the_content();?></div>

            <p><a href="wharton-sub.htm" role="button" class="button" id="enter-click" tabindex="3">&middot; Enter &middot;</a>
            </p>
            <div class="clear-space"></div>
                        <span>
                            <img src="<?php bloginfo("stylesheet_directory");?>/images/tna-logo.png" alt="The  National Archives logo" title="The National Archives">
                        </span>
        </div>
    </div>
    <main role="main">
        <div class="about">
            <img src="<?php bloginfo("stylesheet_directory");?>/images/tna-wharton-title-colour.png" alt=" Great Wharton title" title="Great Wharton" tabindex="5">
        </div>

        <div class="tna_brand">
            <a href="http://nationalarchives.gov.uk" title="Visit The National Archives webiste" tabindex="4">
                <img src="<?php bloginfo("stylesheet_directory");?>/images/tna-logo-white.png" alt="The National Archives logo">
            </a>
        </div>
        <!-- Main wrapper start here -->
        <section class="wrapper">
            <h1 class="sr-only"><?php the_title();?></h1>

            <!-- Canvas viewer start here-->
            <div class="canvas-viewer" id="wrapper">


                <?php get_top_category_post('schools', 'children', '6');?>
                <?php get_top_category_post('food-shortages', 'eggtrain', '7');?>
                <?php get_top_category_post('zeppellin-raids', 'enemy-action', '8');?>

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
                <img src="<?php bloginfo("stylesheet_directory");?>/images/tna-wharton-background-v3.jpg" alt="Map of Great Wharton">
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
<script src="<?php bloginfo("stylesheet_directory");?>/js/tpp.min.js"></script>
<script src="<?php bloginfo("stylesheet_directory");?>/js/scripts.js"></script>




<?php get_footer(); ?>

