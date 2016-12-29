<?php
get_header();
?>
<?php
while ( have_posts() ) : the_post(); ?>
<!-- Page Content -->

    <?php get_template_part('inc/page', 'banner'); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>
	<div class="wrap_page">

		<section class="about_con_sec product_title_sec">
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		            	<h1>
		            		<span class="green"><?php echo get_field('product_title'); ?></span>
		            	</h1>
		            	<div class="product_desc">
							<?php echo the_content(); ?>
		            	</div>
		            </div>
		        </div>
	        </div>
		</section>

		<?php $pro_slider_gallery = get_field('pro_slider_gallery'); ?>
		<?php if ($pro_slider_gallery) { ?>
			<?php get_template_part('inc/product/product', 'gallery'); ?>
		<?php } ?>

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
