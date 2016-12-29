<?php
    wp_reset_query();

    $recent_posts = get_field("recent_articles",$post->ID);
        // $args = array(
            //     //'numberposts' => 3,
            //     'category' => 0,
            //     'orderby' => 'post_date',
            //     'order' => 'DESC',
            //    // 'post_type' => 'post',
            //     'post_status' => 'publish'
            // );

            // $recent_posts = wp_get_recent_posts($args,OBJECT);
    

    if ($recent_posts) {
        foreach( $recent_posts as $recent ){ //print_r($recent);
            $post_img = wp_get_attachment_url( get_post_thumbnail_id($recent->ID) );?>
                <div class="col-lg-4 col-md-6 recent_col">
                    <a href="<?php echo get_permalink($recent->ID); ?>" title="<?php echo $recent->post_title; ?>">
                        <div class="recent_img">
                            <img src="<?php echo $post_img;; ?>" alt="<?php echo $recent->post_title; ?>">
                        </div>
                        <div class="recent_title">
                            <h4>
                                <?php article_title($recent->ID); ?>
                            </h4>
                        </div>
                        <div class="recent_con">
                            <?php echo dynamic_excerpt(200); //$recent["post_excerpt"];  ?>
                        </div>
                    </a>
                </div>
        <?php }
    }




?>
