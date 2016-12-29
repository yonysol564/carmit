<?php
/* Template Name: Homepage */
get_header();
?>

<?php

while ( have_posts() ) : the_post(); ?>
<!-- Page Content -->
    <div class="main_slider_wrap">
		<div class="bg_home_wrap">
			<?php if( have_rows('main_slider') ): ?>
			    <?php while ( have_rows('main_slider') ) : the_row();
			        $slider_image = get_sub_field('slider_image');
			    ?>
					<div class="bg_home" style="background-image: url(<?php echo $slider_image['url']; ?>);">

					</div>
			    <?php endwhile; ?>
			<?php endif;?>
		</div>
		<div class="arr_scroll">
			<a class="scroll_arr" href="#" title="">
				<img src="<?php echo THEME_DIR; ?>/images/arr_down.png" alt="scrol down">
			</a>
		</div>
    </div>

    <div class="wrap_page">

		<section class="home_con_sec">
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
						<div class="home_content">
							<?php the_content(); ?>
						</div>
		            </div>
		        </div>
	        </div>
		</section>

		<?php get_template_part('inc/product', 'slider'); ?>

		<section class="full_proccess_sec">
	        <div class="container">


	        	<?php
                $cnt = 2;
                while (have_rows("blocks")): the_row();
		        	$article_title   = get_sub_field('title', $post->ID);
		        	$article_content = get_sub_field('content', $post->ID);
		        	$article_img 	 = get_sub_field('image', $post->ID);
		        	$article_link	 = get_sub_field('block_link', $post->ID);
				?>

		        	<div class="row row_<?php echo $cnt;?>">

                        <?php if ($cnt % 2 != 0) : ?>
                        	<a href="<?php echo $article_link; ?>" title="">
	    			           	<div class="col-md-6 img_div img_div1 desktop_image">
                                    <img src="<?php echo $article_img['url']; ?>" alt="<?php echo $article_img['alt']; ?>" />
	    			            </div>
                        	</a>
                        <?php endif;?>

			            <div class="col-md-6">

							<a href="<?php echo $article_link; ?>" title="">
								<div class="h2">
									<?php echo $article_title; ?>
								</div>
							</a>
							<a href="<?php echo $article_link; ?>" title="">
								<div class="con_proccess">
									<?php echo $article_content; ?>
								</div>
							</a>
			            </div>
                        <?php if ($cnt%2 == 0) : ?>
                        	<a href="<?php echo $article_link; ?>" title="">
	    			           	<div class="col-md-6 img_div img_div2 desktop_image">
                                    <img src="<?php echo $article_img['url']; ?>" alt="<?php echo $article_img['alt']; ?>" />
	    			            </div>
    			            </a>
                        <?php endif;?>
						<a href="<?php echo $article_link; ?>" title="">
	                        <div class="col-md-6 img_div img_div1 mobile_image">
                                <img src="<?php echo $article_img['url']; ?>" alt="<?php echo $article_img['alt']; ?>" />
	                        </div>
	                    </a>
			        </div>


				<?php
                    $cnt = $cnt == 1 ? 2 : 1;
                endwhile; ?>

	        </div>
		</section>
	</div>
<?php
endwhile;
get_sidebar();
get_footer();
