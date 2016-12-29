<?php global $pro_slider_gallery; ?>
<section class="product_gallery_sec">
  <div class="container">
        <div class="row">
            <div class="col-lg-12">
				<div class="product_gallery">		
		   			<?php foreach ($pro_slider_gallery as $image) { ?>
					    <div class="product_gallery_inner">
					    	<div class="img_wrap">
					    		<img src="<?php echo $image['pro_slider_img']['url']; ?>" alt="<?php echo $image['pro_slider_title']; ?>">
					    	</div>
					    	<div class="product_gallery_title">					
					       		<?php echo $image['pro_slider_title']; ?>
					    	</div>
					    </div>          
		   			<?php } ?>    
				</div>
            </div>
        </div>
    </div>
</section>