<?php
	get_header();
	//$title = get_the_title();
	$main_title = get_field('main_title' ,'option');
	$top_description = get_field('top_description' ,'option');
	
	
	$cat_pro = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => false, 'parent' => 0) );
?>
    <?php get_template_part('inc/page', 'banner'); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>
	<div class="wrap_page">
		<section class="about_con_sec">	
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		            	<h1>
							<?php echo $main_title; ?>
		            	</h1>

		            	<div class="procat_desc">
							<?php echo $top_description; ?>	
		            	</div>
		            </div>
		        </div>
	        </div>
		</section>

		<section class="about_con_sec">	
	        <div class="container">
		        <div class="row">
					<?php foreach ($cat_pro as $cpro) { 
						$img = get_field('image_product_cat', $cpro);
						$link = get_term_link( $cpro, 'product_cat' );	
					?>
			            <div class="col-md-6 text-center">
							<a class="procat_link" href="<?php echo $link; ?>" title="<?php echo $cpro->name; ?>">
				            	<div class="procat_img" style="background-image: url( <?php echo $img['url']; ?> );"></div>
				            	<div class="procat_name">
									<?php echo $cpro->name; ?>	
				            	</div>
							</a>
			            </div>
					<?php } ?>
		        </div>
	        </div>
		</section>

		<section class="about_con_sec prodesc_sec">	
	        <div class="container">
		        <div class="row">
		            <div class="col-md-12">
						<?php echo get_field('products_description', 'option'); ?>
		            </div>
		        </div>
	        </div>
		</section>

		<?php get_template_part('inc/product', 'slider'); ?>
	</div>
<?php
get_sidebar();
get_footer();

