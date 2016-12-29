<?php
get_header();
?>
<?php
while ( have_posts() ) : the_post(); ?>
<!-- Page Content -->

    <?php get_template_part('inc/page', 'banner'); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>
	<div class="wrap_page">
		<section class="about_con_sec single_sec">
	        <div class="container">
	        	<div class="row">
		            <div class="col-lg-12">
		            	<h1>
		            		<span class="green"><?php article_title(); ?></span>
		            	</h1>
		            </div>
	        	</div>
		        <div class="row">
		            <div class="col-md-12">
		            	<div class="product_desc">
							<?php the_content(); ?>
		            	</div>
		            </div>
		            <?php /*
			            <div class="col-md-3">
			            	<div class="single_thumb">
			            		<?php  // the_post_thumbnail("post_thumb"); ?>
			            	</div>
			            </div> 
		            */ ?>
		        </div>
	        </div>
		</section>

		<section class="product_desc_sec">
		  	<div class="container">
		        <div class="row">
		            <div class="col-lg-12">
						<div class="wrap_desc">
							<?php echo get_field('product_content'); ?>
						</div>
		            </div>
		        </div>
	        </div>
		</section>


		<?php get_template_part('inc/product', 'slider'); ?>
	</div>

<?php
endwhile;
get_sidebar();
get_footer();
