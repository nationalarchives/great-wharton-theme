<?php


get_header(); ?>
<div class="page-branding">
	<div class="container">
		<div class="row">
			<div class="col-xs-6 tna-brand-page">
				<a href="http://nationalarchives.gov.uk" title="Visit The National Archives website"><img
						src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-logo-white.png"
						alt="The National Archives logo"></a>
			</div>
			<div class="col-xs-6 about-page">
				<a href="<?php echo make_path_relative( esc_url( home_url( '/', 'http' ) ) );
				// use category slug for hashtag
				$category = get_the_category();
				echo "#" . $category[0]->slug; ?>" title="Back to Great Wharton">
					<img src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/images/tna-wharton-title-colour.png"
					     alt=" Great Wharton title" title="Back to Great Wharton">
				</a>
			</div>
		</div>
	</div>
</div>
<main role="main">
	<?php if ( have_posts() ): while ( have_posts() ) : the_post();
		$current_page = get_the_ID();
		?>
		<!-- main loop goes here -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="info">
						<div class="inner">

                            <noscript>
                            <style>
                            .info-toolbar-right{
                                display: none;
                            }

                            </style>
                                </noscript>
							<a href="<?php echo make_path_relative( esc_url( home_url( '/', 'http' ) ) );
							// use category slug for hashtag
							$category = get_the_category();
							echo "#" . $category[0]->slug; ?>" title="Back to Great Wharton"
							   role="button" class="button">&middot; Back to Great Wharton &middot;</a>
							<?php
							// show dropdown only if the page has a category i.e. story content
							if ( has_category() ) { ?>
								<div class="info-toolbar-right">
									<div class="info_select">
										<select onchange="if (this.value) window.location.href=this.value">
											<option value="">Select a story</option>
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
														<option
															value="<?php echo make_path_relative( get_permalink() ); ?>"><?php the_title(); ?></option>
														<?php
													}
												}
											}
											wp_reset_postdata();
											?>
										</select>
									</div>
								</div>
								<hr>
							<?php } ?>
							<h1><?php the_title(); ?></h1>
							<!-- featured image -->
							<?php if ( has_post_thumbnail() ) {
								$image_id      = get_post_thumbnail_id( $page->ID );
								$image_src     = wp_get_attachment_image_src( $image_id, 'full', false );
								$image_src     = fix_internal_url( $image_src[0] );
								$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
								?>
								<div class="feature-image">
									<img src="<?php echo make_path_relative( $image_src ); ?>" width="100%"
									     alt="Image of <?php echo( $image_caption ); ?>"
									     title="<?php echo( $image_caption ); ?>">
									<p class="caption text-right"><?php echo( $image_caption ); ?></p>
								</div>
								<?php
							}
							?>
							<!-- featured image -->

							<div class="content-columns clearfix">
                                <?php edit_post_link('EDIT', '<p>', '</p>'); ?>
								<?php the_content(); ?>
								<hr>
							</div>

							<a href="<?php echo make_path_relative( esc_url( home_url( '/', 'http' ) ) );
							// use category slug for hashtag
							$category = get_the_category();
							echo "#" . $category[0]->slug; ?>" title="Back to Great Wharton"
							   role="button" class="button">&middot; Back to Great Wharton &middot;</a>

							<span class='st_sharethis_large'>Share this</span>

						</div>
					</div>

					<!-- school -->
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<?php else:
		// do nothing ?>
	<?php endif; ?>
</main>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>

<script type="text/javascript">var switchTo5x = true;</script>
<script type="text/javascript" src="http://ws.sharethis.com/button/buttons.js"></script>
<script src="<?php echo make_path_relative( get_template_directory_uri() ); ?>/js/scripts.js"></script>
<script type="text/javascript">
	stLight.options({
		publisher: "e1514b1f-8114-4751-a7dc-7af051944bf6",
		doNotHash: false,
		doNotCopy: false,
		hashAddressBar: false,
		onhover: false
	});

</script>
<script>
	$(".st_sharethis_large").show("slow");
</script>

<?php get_footer(); ?>
