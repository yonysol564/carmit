<?php
	/* Template Name: Contact */
	get_header();
	$title = get_the_title();
	$title = explode(' ', $title);
	$form_desc = get_field('form_desc');
	$locations = get_field('contact_map');
	$map_title = get_field('map_title');
	$contact_form = get_field('contact_form');
?>

<?php

while ( have_posts() ) : the_post(); ?>
<!-- Page Content -->

        <?php get_template_part('inc/page', 'banner'); ?>

        <?php get_template_part('inc/breadcrumbs'); ?>
	<div class="wrap_page">
		<section class="about_con_sec contact_sec">	
	        <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		            	<h1>
		            		<span class="green"><?php echo $title[0]; ?></span>
		            		<span class="brown"><?php echo $title[1]; ?></span>
		            	</h1>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-6">
						<div class="con_div">
							<?php the_content(); ?>
						</div>
		            </div>
		            <div class="col-md-6">
						<div class="form_desc">
							<?php echo $form_desc; ?>
						</div>
						<div class="form_wrap">
							<?php echo do_shortcode($contact_form); ?>
						</div>
		            </div>
		        </div>
						
	        </div>
		</section>

		<section class="about_con_sec map_sec">	
	        <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		            	<h2>
							<?php echo $map_title; ?>
		            	</h2>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-12">
						<script>
							var locations = [ "<?php echo $locations['address']; ?>", <?php echo $locations['lat']; ?> , <?php echo $locations['lng']; ?> ];
						</script>
						<div class="map_div" id="contact_map">
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

