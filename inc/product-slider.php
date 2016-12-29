<?php 
    global $term;
    $products = get_field('snacks_slider', 'option'); 
    $display_snacks_slider = get_field('display_snacks_slider',$term);
?>


<?php if ($display_snacks_slider) {   
    if(display_snacks_slider()): ?>
        <section class="home_pro_slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
        				<div class="pro_slider_head">
        					<div class="h2"><?php echo get_field('snacks_slider_title', 'option'); ?></div>
        				</div>
        				<div class="wrap_home_products">
        					<?php foreach ($products as $pro) {
        						$pro_img = wp_get_attachment_url( get_post_thumbnail_id($pro->ID) );
        					?>
        						<div class="wrap_product">
        							<a href="<?php echo get_permalink($pro->ID); ?>" title="<?php echo get_the_title($pro->ID); ?>">
        								<div class="product_slide">
        									<img src="<?php echo $pro_img; ?>" alt="<?php echo get_the_title($pro->ID); ?>">
        								</div>

        								<div class="pro_label">
        									<?php echo get_the_title($pro->ID); ?>
        								</div>
        							</a>
        						</div>
        					<?php } ?>

        				</div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; 
} ?>
