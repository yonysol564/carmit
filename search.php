<?php get_header(); ?>
<?php
	$page_banner = get_field('page_banner');
?>
<div class="bg_page" style="background-image: url( <?php echo THEME_DIR . '/images/searchbg.jpg'; ?>);">
</div>

 <?php get_template_part('inc/breadcrumbs'); ?>
<div class="wrap_page">

	<section class="search_sec about_con_sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="to_div">
						<h1><?php _e('<span class="green">Search</span> <span class="brown">Results</span>'); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="search_results">
		<div class="container">
			<div role="main" class="row">
				<div class="col-md-12 col_head">
					<?php
						echo sprintf( __( '%s Results For ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>
				</div>
				<div class="col-md-12 border_row">
					<div class="border_con">

					</div>
				</div>
				<div class="col-md-12 results_div">
				  <ul>
					<?php while(have_posts()): the_post(); ?>
						    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				  </ul>
				</div>
				<?php get_template_part('pagination'); ?>

				<div class="col-md-12 pagination_col">
					<div class="pagination_div">
						<?php
						if ($wp_query->found_posts <= 10)
						{
						?>
							<div class="pagination">
						     	<span class="current">1</span>
						    </div>
						<?php
						}else{
							my_pagination();
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
