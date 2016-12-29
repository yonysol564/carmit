<?php $posts_to_show = get_field('posts_to_show');
foreach ($posts_to_show as $post) {
?>
	<div class="large-4 column cat_col">
	<a href="<?php echo get_permalink($post->ID); ?>"" title="<?php echo get_the_title($post->ID); ?>">
		<div class="service_box">
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<div class="service_img" style="background-image: url( <?php echo $url; ?>);">

				<div class="abs_title">

					<div class="inner_title">	
						<?php echo get_the_title($post->ID); ?>
					</div>
					<div class="inner_description">
						<?php dynamic_excerpt(70); ?>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>
<?php
}
?>