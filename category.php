<?php
	get_header();
	$object = get_queried_object();
	$category_title = get_cat_name( $object->term_id );
	$category_desc = category_description( $object->term_id  );

	$title = explode(' ', $category_title);

	$page_banner = get_field('page_banner', $object );
?>
<!-- Page Content -->

    <div class="bg_page" style="background-image: url( <?php echo $page_banner['url']; ?> );">
	</div>

    <?php get_template_part('inc/breadcrumbs'); ?>
    <div class="wrap_page">
		<section class="cat_con_sec">
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		            	<h1>
		            		<span class="green"><?php echo $title[0] . ' ' . $title[1]; ?></span>
		            		<span class="brown"><?php echo $title[2]; ?></span>
		            	</h1>
		            	<div class="cat_desc">
							<?php echo $category_desc; ?>
		            	</div>
		            </div>
		        </div>
	        </div>
		</section>

		<section class="cat_con_sec">
	        <div class="container">
		        <div class="row">
					<?php
						$args = array( 'posts_per_page' => -1, 'category' => $object->term_id  );
						$myposts = get_posts( $args );
					?>

					<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<div class="col-md-6 article_col" data-mh="image">
							<a href="<?php the_permalink(); ?>">
								<div class="title_div">
									<span class="category_item_title">
										<?php article_title(); ?>
									</span>
								</div>
								<div class="excerpt_div">
									<?php echo dynamic_excerpt(200); ?>...
								</div>
							</a>
						</div>

					<?php endforeach;  wp_reset_postdata(); ?>
		        </div>
	        </div>
		</section>

		<?php get_template_part('inc/product', 'slider'); ?>
	</div>
<?php
get_sidebar();
get_footer();
