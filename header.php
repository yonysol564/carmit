<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php the_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
	$banner_autoplay = get_field('banner_autoplay');
?>
<?php wp_head(); ?>

<body <?php body_class(); ?>>
	<?php $icons_rep	= get_field('icons_rep','option'); ?>

	<a href="#menu-toggle" class="btn btn-default menu_btn" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <div class="abs_from">
		<a class="close_search" href="#" title="close search">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
		<div class="header_form">
			<form role="search" method="get" action="<?php echo home_url(); ?>" >
			    <div class="input_div">
			      <input class="form-control input_search" type="search" name="s" id="search" placeholder="<?php _e('Search','carmit'); ?>">
			      <button class="search-submit" type="submit" role="button">
			      		<i class="fa fa-search" aria-hidden="true"></i>
			      </button>
			    </div>
			</form>
		</div>
    </div>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
			<div class="inner_sidebar">

				<?php get_template_part("inc/header/top_bar"); ?>
	        	<div class="bottom_div">

		        	<div class="menu_wrap">
		            	<?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'menu_class' => 'sidebar-nav' ) ); ?>
		        	</div>

		        	<div class="products_div">
						<?php wp_nav_menu( array( 'theme_location' => 'products_menu', 'menu_class' => 'products_menu' ) ); ?>
		        	</div>

		        	<div class="icons_div">
		        		<?php if( have_rows('icons_rep','option') ): ?>
		        		    <?php while ( have_rows('icons_rep','option') ) : the_row();
		        		        $icon_img = get_sub_field('icon_img');
		        		        $icon_link = get_sub_field('icon_link');
		        		    ?>
							    <?php if($icon_link):?>
			        				<a href="<?php echo $icon_link; ?>" title="" target="_blank">
								<?php endif;?>

			        				<img src="<?php echo $icon_img['url']; ?>" alt="logo_icon">
								<?php if($icon_link):?>
			        				</a>
								<?php endif;?>
		        		    <?php endwhile; ?>
		        		<?php endif;?>
		        	</div>
	        	</div>
			</div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper" class="page_wraper">
			<div class="mobile_header">
				<?php get_template_part("inc/header/top_bar"); ?>
			</div>
    		<div class="container-fluid">
