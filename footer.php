	<?php
		$footer_title_1 	= get_field('footer_title_1', 'option');
		$footer_title_2 	= get_field('footer_title_2', 'option');
		$footer_title_3 	= get_field('footer_title_3', 'option');
		$footer_title_4 	= get_field('footer_title_4', 'option');

		$created_by 	= get_field('created_by', 'option');
		$footer_copy 	= get_field('footer_copy', 'option');
		$footer_address	= get_field('footer_address', 'option');
	?>
	<footer>
		<div class="footer_menu_sec">
			<div class="container">
				<div class="row">
					<div class="col-md-3 footer_col">
						<div class="footer_title">
							<?php echo $footer_title_4; ?>
						</div>
						<div class="footer_address">
							<?php echo $footer_address; ?>
						</div>
					</div>
					<div class="col-md-3 footer_col">
						<div class="footer_title">
							<?php echo $footer_title_1; ?>
						</div>
						<div class="wrap_footer_menu">
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu_one', 'menu_class' => 'footer_menu_one' ) ); ?>
						</div>
					</div>
					<div class="col-md-3 footer_col">
						<div class="footer_title">
							<?php echo $footer_title_2; ?>
						</div>
						<div class="wrap_footer_menu">
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu_tow', 'menu_class' => 'footer_menu_tow' ) ); ?>
						</div>
					</div>
					<div class="col-md-3 footer_col">
						<div class="footer_title">
							<?php echo $footer_title_3; ?>
						</div>
						<div class="wrap_footer_menu">
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu_three', 'menu_class' => 'footer_menu_three' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_copy_sec">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="footer_copy">
							<?php echo $footer_copy; ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="created_by">
							<?php echo $created_by; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
    </div>
</div>

<?php wp_footer(); ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->

</div><!-- end Wraper  -->

</body>
</html>
