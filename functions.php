<?php
	define("THEME_DIR",get_template_directory_uri());
	//define("LANG", ICL_LANGUAGE_CODE);
	define("CURRENT_YEAR",date('Y'));
	$lang = TEMPLATEPATH . '/lang';
	load_theme_textdomain('title', $lang);
	require(dirname(__FILE__) . '/admin/types.php');


	// Add body classes
	if ( ! function_exists( 'add_body_class' ) ){
	    function add_body_class( $classes ) {
	        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	        if( $is_lynx ) $classes[] = 'lynx';
	        elseif( $is_gecko ) $classes[] = 'gecko';
	        elseif( $is_opera ) $classes[] = 'opera';
	        elseif( $is_NS4 ) $classes[] = 'ns4';
	        elseif( $is_safari ) $classes[] = 'safari';
	        elseif( $is_chrome ) $classes[] = 'chrome';
	        elseif( $is_IE ) {
	            $classes[] = 'ie';
	            if( preg_match( '/MSIE ( [0-11]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
	            $classes[] = 'ie' . $browser_version[1];
	        } else $classes[] = 'unknown';
	        if( $is_iphone ) $classes[] = 'iphone';

	        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
	                 $classes[] = 'osx';
	        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
	                 $classes[] = 'linux';
	        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
	                 $classes[] = 'windows';
	        }

	        return $classes;
	    }
	    add_filter( 'body_class','add_body_class' );
	}

	// function lang_class($output) {
	//     return $output . ' class="no-js '.LANG.'"';
	// }
	// add_filter('language_attributes', 'lang_class');

	remove_action('wp_head', 'wp_generator');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-thumbnails' );

/******************************************************************************************
							A D D    I M A G E    S I Z E S
******************************************************************************************/

add_image_size( 'project_image', 465, 360, false );
add_image_size( 'post_thumb', 230, 170, false );
add_image_size( 'gallery_small_cube', 115, 80, false );



/******************************************************************************************
							S T Y L E S    R E G I S T E R
******************************************************************************************/

	function enqueue_my_styles() {
		$normalize 			= THEME_DIR . '/css/normalize.css';
	    $font_awesome       = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css';
	    $bootstrap			= THEME_DIR . '/css/bootstrap.min.css';
	    $bootstrap_sidebar	= THEME_DIR . '/css/simple-sidebar.css';
	    $slick				= THEME_DIR . '/css/slick.css';
	    $slickTheme			= THEME_DIR . '/css/slick-theme.css';
	    $magnific           = THEME_DIR . '/css/magnific-popup.css';
	    $animate           	= THEME_DIR . '/css/animate.css';
	    $mainStyle          = THEME_DIR . '/css/style.css';
	    $queryStyle         = THEME_DIR . '/css/media-quires.css';
	    $fonts 				= THEME_DIR . '/fonts/stylesheet.css';

	    wp_enqueue_style( 'bootstarp', $bootstrap, array(), 'v1', 'all' );
	    wp_enqueue_style( 'bootstrap_sidebar', $bootstrap_sidebar, array(), 'v1', 'all' );
	    wp_enqueue_style('normalize', $normalize, array(), NULL, 'all' );
	    //wp_enqueue_style( 'foundation', $foundation, array(), NULL, 'all' );
	    wp_enqueue_style( 'font_awesome', $font_awesome, array(), 'v1', 'all' );
	    wp_enqueue_style( 'slick', $slick, array(), 'v1', 'all' );
	    // wp_enqueue_style( 'slickTheme', $slickTheme, array(), 'v1', 'all' );
	    wp_enqueue_style( 'magnific', $magnific, array(), 'v1', 'all' );
	    wp_enqueue_style( 'animate', $animate, array(), 'v1', 'all' );
	    wp_enqueue_style( 'fonts', $fonts, array(), NULL, 'all' );
	    wp_enqueue_style( 'mainStyle', $mainStyle, array(), 'v1', 'all' );
	    wp_enqueue_style( 'queryStyle', $queryStyle, array(), 'v1', 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );



/******************************************************************************************
						S C R I P T S 	 R E G I S T E R
******************************************************************************************/

	function register_my_jscripts() {

	   wp_register_script( 'modernizr', THEME_DIR .'/js/modernizr.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'modernizr' );
	   wp_register_script( 'slick', THEME_DIR .'/js/slick.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'slick' );
	   wp_register_script( 'magnific', THEME_DIR .'/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'magnific' );
	   wp_register_script( 'matchHeight', THEME_DIR .'/js/jquery.matchHeight-min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'matchHeight' );
	   wp_register_script( 'bootstrap', THEME_DIR .'/js/bootstrap.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'bootstrap' );
	   wp_register_script( 'notify', THEME_DIR .'/js/notify.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'notify' );
	   wp_register_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBvjATrM_WJp049M9Hg-NUiiiyOik3_sJU', array( 'jquery' ), '1', false );wp_enqueue_script( 'googleapi' );
	   wp_register_script( 'scrollSpeed', THEME_DIR .'/js/jQuery.scrollSpeed.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'scrollSpeed' );

	   wp_register_script( 'scripts', THEME_DIR .'/js/scripts.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'scripts' );
	}
	add_action('wp_enqueue_scripts', 'register_my_jscripts');


/******************************************************************************************
						N A V I G A T I O N S  -  M E N U
******************************************************************************************/

// Menu
function register_my_menu() {
    register_nav_menus(array(
    	'top_menu' 	  		=>  'Top Menu',
    	'products_menu' 	=>  'Products Menu',
    	'about_menu' 	  	=>  'About Menu',
    	'top_menu_mobile'   =>  'Top Menu Mobile',
    	'footer_menu_one'   =>  'Footer Menu 1',
		'footer_menu_tow'   =>  'Footer Menu 2',
		'footer_menu_three' =>  'Footer Menu 3',
		'footer_menu_four'  =>  'Footer Menu 4'
    ));
}
add_action( 'init', 'register_my_menu' );

/******************************************************************************************
								S  I  D  E  B  A  R  S
******************************************************************************************/


	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

	}

	function my_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyBvjATrM_WJp049M9Hg-NUiiiyOik3_sJU');
	}
	add_action('acf/init', 'my_acf_init');


/******************************************************************************************
								F 	 U 	 N 	C   T 	I 	O 	N 	S
******************************************************************************************/



	// Toutube
	function getYoutubeThumbUrl($id , $size="0") {
	    $data = "http://img.youtube.com/vi/".$id."/".$size.".jpg";
	    return $data;
	}

	// Background color
	function hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if(empty($color))
	          return $default;

		//Sanitize $color if "#" is provided
	        if ($color[0] == '#' ) {
	        	$color = substr( $color, 1 );
	        }

	        //Check if color has 6 or 3 characters and get values
	        if (strlen($color) == 6) {
	                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	        } elseif ( strlen( $color ) == 3 ) {
	                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	        } else {
	                return $default;
	        }

	        //Convert hexadec to rgb
	        $rgb =  array_map('hexdec', $hex);

	        //Check if opacity is set(rgba or rgb)
	        if($opacity){
	        	if(abs($opacity) > 1)
	        		$opacity = 1.0;
	        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	        } else {
	        	$output = 'rgb('.implode(",",$rgb).')';
	        }

	        //Return rgb(a) color string
	        return $output;
	}

	//D Y N A M I C    E X C E R P T
	function dynamic_excerpt($length) { // Variable excerpt length. Length is set in characters
	    global $post;
	    $text = $post->post_excerpt;
	    if ( '' == $text ) {
	    $text = get_the_content('');
	    $text = apply_filters('the_content', $text);
	    $text = str_replace(']]>', ']]>', $text);
	    }
	    $text = strip_shortcodes($text); // optional, recommended
	    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
	    $text = mb_substr($text,0,$length).'';
	    echo $text;
	}

	// Pagination
	function my_pagination(){
	    global $wp_query;
	    $big = 999999999;
	    echo paginate_links(array(
	        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
	        'format' => '?paged=%#%',
	        'prev_text'          => __('«'),
			'next_text'          => __('»'),
	        'current' => max(1, get_query_var('paged')),
	        'total' => $wp_query->max_num_pages
	    ));
	}
	add_action('init', 'my_pagination'); // Add our Pagination


	function custom_excerpt_length( $length ) {
	return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more( $more ) {
			return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');



	// change breadcrumb navxt homepage name to page name
	add_filter('bcn_breadcrumb_title', function($title, $type, $id) {
	    if ($type[0] === 'home') {
	        $title = get_the_title(get_option('page_on_front'));
	    }
	    return $title;
	},  42, 3);

function article_title($post_id = ""){
	if(!$post_id){
		global $post;
		$post_id = $post->ID;
	}
	echo get_field("article_title",$post_id) ?  get_field("article_title",$post_id) : get_designed_title($post_id);
}
function get_designed_title($post_id){
	$title = get_the_title($post_id);

	$title_fregs = explode(" ",$title);
	$title_fregs[0] = "<span>{$title_fregs[0]}</span>";

	return implode(" ",$title_fregs);
}
function display_snacks_slider(){
	if((is_front_page() || is_home()) && get_field("display_snacks_on_homepage","option")){
		return true;
	}elseif(is_post_type_archive("product") && get_field("display_on_products_post_type","option")){
		return true;
	}elseif(is_tax("product_cat") && get_field("display_on_product_category_pages","option")){
		return true;
	}elseif(is_singular() && get_field("display_snacks_slider")){
		return true;
	}

	return false;
}

add_shortcode("product_table","insert_product_table");

function insert_product_table(){
	ob_start();

	get_template_part('inc/product/product', 'table');

	return ob_get_clean();
}

