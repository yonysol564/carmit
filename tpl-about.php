<?php
/* Template Name: About */
get_header();
$title = get_the_title();
$title = explode(' ', $title);
?>

<?php

while ( have_posts() ) : the_post(); ?>
<!-- Page Content -->

    <?php get_template_part('inc/page', 'banner'); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>
	<div class="wrap_page">

		<section class="about_con_sec">
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		            	<h1>
		            		<span class="green"><?php echo $title[0]; ?></span>
		            		<span class="brown"><?php echo $title[1]; ?></span>
		            	</h1>
						<?php the_content(); ?>
		            </div>
		        </div>
	        </div>
		</section>

		<?php get_template_part('inc/product', 'slider'); ?>
		<?php $recent_posts = get_field("recent_articles",$post->ID); ?>
		<?php if ($recent_posts): ?>
			<section class="about_con_sec last_articles_sec">
		        <div class="container">
			        <div class="row">
			            <div class="col-lg-12 wrap_article_title">
			            	<span class="h2">
			            		<span class="green">Last</span>
			            		<span class="brown">Articles</span>
			            	</span>
			            </div>
			        </div>
			        <div class="row">

						<?php get_template_part("inc/recent-articles"); ?>

			        </div>
		        </div>
			</section>
		<?php endif ?>

	</div>
<?php
endwhile;
get_sidebar();
get_footer();
