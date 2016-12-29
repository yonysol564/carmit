<?php
	get_header();
	$term = get_queried_object();
	$page_banner = get_field('page_banner',$term);
	$term_name = get_field('pro_cat_name',$term);
	$cat_pro_show = get_field('cat_pro_show',$term);
	$desc = term_description( $term, $taxonomy );

	if($term->parent){
		// i am child
		$parent = get_term_by('id',$term->parent,'product_cat');
		$terms_args = array('hide_empty'=>true,'child_of'=>$parent->term_id);
	}else{
		// i am parent
		$parent = $term;
		$terms_args = array('hide_empty'=>true,'child_of'=>$term->term_id);
	}

	$terms = get_terms('product_cat', $terms_args);
?>

<!-- Page Content -->

	<div class="bg_page" style="background-image: url( <?php echo $page_banner['url']; ?>);">
	</div>

  <?php get_template_part('inc/breadcrumbs'); ?>

	<div class="wrap_page">

		<section class="about_con_sec procat_sec">	
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		            	<h1>
		            		<?php echo $term_name; ?>
		            	</h1>
		            	<div class="procat_desc">
							<?php echo $desc; ?>	
		            	</div>
		            </div>
		        </div>
	        </div>
		</section>

		<?php if ($term->parent) { ?>

			<section class="about_con_sec childs_cat_sec">	
		        <div class="container">
			        <div class="row row-centered"> 
		    			<?php
				            $args = array(
				                'post_type' => 'product',
				                'tax_query' => array(
				                    array(
				                        'taxonomy' => 'product_cat',
				                        'field'    => 'term_id',
				                        'terms'    => $term->term_id,
				                    ),
				                ),
				            );

				            $products = new WP_Query( $args ); 		     
				            $count_founded = $products->found_posts;
				            $center_col = '';
				            $text_center = 'text_center';
				            if ($count_founded < 3) {
				            	$center_col = 'col-centered';
				            }
				            ?>
			                <?php while ($products->have_posts()) : $products->the_post(); 
			                    $post_excerpt = $post->post_excerpt; 
			                    $product_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			                    $product_link = get_permalink();
					            if( isset($term) && !empty($term->term_id) ){
					                $product_link = add_query_arg('term',$term->term_id, $product_link);
					            }
			                ?>
							<div class="col-md-4 text-center col_pro_child <?php echo $center_col; ?>">
								<a class="child_cat_link" href="<?php echo $product_link; ?>" title="<?php echo get_the_title($post->ID); ?>">
					            	<div class="child_cat_img">
					            		<img src="<?php echo $product_img; ?>" alt="<?php echo get_the_title($post->ID); ?>">
					            	</div>
					            	<div class="child_cat_name">
										<?php echo get_the_title($post->ID); ?>
					            	</div>
					            	<div class="child_cat_desc">
										<?php 
											if($post_excerpt){ 
												echo $post_excerpt;
											}
										?>
					            	</div>
								</a>
				            </div>
		                <?php endwhile; ?>
			        </div>
		        </div>
			</section>

		<?php } else { ?>
		<?php if ($cat_pro_show): $counted = count($cat_pro_show); ?>
			<section class="about_con_sec childs_cat_sec">	
		    	<div class="container">
			        <div class="row row-centered">
						<?php foreach ($cat_pro_show as $item) { 
							$center_col = '';
				            if ($counted < 3) {
				            	$center_col = 'col-centered';
				            }
				        ?>	
							<?php if($item['choose_product']) { 
								$item_id = $item['choose_product'];
								$product_img = wp_get_attachment_url( get_post_thumbnail_id($item_id) );
							?>
								<div class="col-md-4 text-center col_pro_child <?php echo $center_col; ?>">
									<a class="child_cat_link" href="<?php echo get_permalink($item_id); ?>" title="<?php echo get_the_title($item_id); ?>">
						            	<div class="child_cat_img">
						            		<img src="<?php echo $product_img; ?>" alt="<?php echo get_the_title($item_id); ?>">
						            	</div>
						            	<div class="child_cat_name">
											<?php echo get_the_title($item_id);  ?>
						            	</div>
						            	<div class="child_cat_desc">
											<?php echo get_the_excerpt(); ?>		
						            	</div>
									</a>
					            </div>
							<?php } elseif($item['choose_category']){ 
								$cat_id = $item['choose_category'];
								$product_img = get_field('image_product_cat', 'product_cat_'.$cat_id);
								$category_excerpt = get_field('cat_short_excerpt', 'product_cat_'.$cat_id);
								$link = get_term_link( $cat_id, 'product_cat' );
								$term = get_term( $cat_id, 'product_cat' );
							?>
								<div class="col-md-4 text-center col_pro_child <?php echo $center_col; ?>">
									<a class="child_cat_link" href="<?php echo $link; ?>" title="<?php echo $term->name; ?>">
						            	<div class="child_cat_img">
						            		<img src="<?php echo $product_img['url']; ?>" alt="<?php echo $term->name; ?>">
						            	</div>
						            	<div class="child_cat_name">
											<?php echo $term->name; ?>
						            	</div>
						            	<div class="child_cat_desc">
											<?php echo $category_excerpt; ?>		
						            	</div>
									</a>
					            </div>
							<?php } ?>
						<?php } ?>
			        </div>
		      </div>
			</section>
		<?php endif ?>
		<?php } ?>

		<section class="about_con_sec prodesc_sec">	
	        <div class="container">
		        <div class="row">
		            <div class="col-md-12">
						<?php echo get_field('product_category_desc' , $term); ?>
		            </div>
		        </div>
	        </div>
		</section>

		<?php get_template_part('inc/product', 'slider'); ?>
	</div>


<?php
get_sidebar();
get_footer();

