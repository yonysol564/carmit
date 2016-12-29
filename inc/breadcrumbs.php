<?php
	$selector = "";
	if(is_singular()){
		$selector = $post->ID;
	}elseif(is_tax()){
		$termObject = get_queried_object();
		$selector = "{$termObject->taxonomy}_{$termObject->term_id}";
	}

?>
<div class="breadcrumbs_div">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				<p id="breadcrumbs">
					<?php if(have_rows("breadcrumbs",$selector)):?>
						<p id="breadcrumbs">
							<?php while(have_rows("breadcrumbs",$selector)): the_row(); ?>
								<?php ob_start(); ?>
									<span property="itemListElement" typeof="ListItem">
										<?php if($link = get_sub_field("link")):?>
											<a property="item" typeof="WebPage" href="<?php echo get_sub_field("link") ?>" class="post post-product-archive">
										<?php endif;?>

											<span property="name"><?php echo get_sub_field("title") ?></span>

										<?php if($link):?>
											</a>
										<?php endif;?>
									</span>
								<?php $crumbs[] = ob_get_clean();?>
							<?php endwhile;?>

							<?php echo implode("&gt;",$crumbs); ?>
						</p>
					<?php
	                    elseif( is_singular('product') ):
	                        $term_param = isset($_GET['term']) ? sanitize_text_field($_GET['term']): '';
	                        $the_terms  = get_the_terms($post->ID,'product_cat');
	                        $the_term   = reset($the_terms);
	                        $term_name  = $the_term->name;
	                        if($term_param){
	                            $term_param_object = get_term_by("id",$term_param,"product_cat");
	                            $term_name = $term_param_object->name;
	                        }
	                ?>
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="<?php echo home_url(); ?>">
                            <span property="name"><?php echo get_field('home_label', 'option'); ?></span>
                        </a>
                    </span> &gt;
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="<?php echo get_post_type_archive_link('product'); ?>" class="post post-product-archive">
                            <span property="name"><?php echo get_field('Products_label', 'option'); ?></span>
                        </a>
                    </span> &gt;
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="<?php echo get_term_link($the_term); ?>" class="post post-product-archive">
                            <span property="name"><?php echo $term_name; ?></span>
                        </a>
                    </span> &gt;
                    <span property="itemListElement" typeof="ListItem" class="last_child_bread">
                        <span property="name"><?php echo get_the_title(); ?></span>
                    </span>
				</p>
                <?php else: ?>
                    <?php
						if ( function_exists('yoast_breadcrumb') ) {
						     yoast_breadcrumb('<p id="breadcrumbs">','</p>');
						}
                    ?>
                <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
