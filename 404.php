<?php
get_header();
?>

   	<div class="bg_page" style="background-image: url(<?php echo THEME_DIR. '/images/searchbg.jpg'; ?>);">
	</div>

    <?php get_template_part('inc/breadcrumbs'); ?>
	<div class="wrap_page">

		<section class="about_con_sec sec_404">	
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		            	<h1>
		            		Page Not Found
		            	</h1>
						<div class="back_404">
							<a href="<?php echo home_url(); ?>">Back To Homepage</a>
						</div>
		            </div>
		        </div>
	        </div>
		</section>

	</div>	

<?php
get_sidebar();
get_footer();

