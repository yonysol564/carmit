<?php
    $logo_img  			= get_field('logo_img','option');
    $linkdin_url 		= get_field('linkdin_url','option');
    $linkdin_image 		= get_field('linkdin_image','option');
    $youtube_url 		= get_field('youtube_url','option');
    $youtube_image 		= get_field('youtube_image','option');
    $googleplus_url 	= get_field('googleplus_url','option');
    $googleplus_image 	= get_field('googleplus_image','option');
    $logo_label			= get_field('logo_label','option');

?>
<div class="top_div">
    <div class="wrap_search_socials">
        <div class="socials">
            <a href="<?php echo $googleplus_url; ?>" title="" target="_blank">
                <img src="<?php echo $googleplus_image['url']; ?>" alt="">
            </a>
            <a href="<?php echo $linkdin_url; ?>" title="" target="_blank">
                <img src="<?php echo $linkdin_image['url']; ?>" alt="">
            </a>
            <a href="<?php echo $youtube_url; ?>" title="" target="_blank">
                <img src="<?php echo $youtube_image['url']; ?>" alt="">
            </a>
        </div>

        <div class="search_div">
            <a class="toggle_search" href="#" title="">
                <img src="<?php echo THEME_DIR; ?>/images/search2.jpg" title="" alt="">
            </a>
        </div>

        <div class="clear-fix"></div>
    </div>

    <div class="logo_div">
        <a href="<?php echo home_url(); ?>" title="">
            <img src="<?php echo $logo_img['url']; ?>"  alt="logo">
        </a>
    </div>

    <div class="main_label">
        <?php echo $logo_label; ?>
    </div>
</div>
