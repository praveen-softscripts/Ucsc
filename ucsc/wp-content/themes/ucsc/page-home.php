<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Home Template
 *
Template Name:  Home Page
 */

get_header(); 

 if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
<div class="home-page clearfix">
    <div class="homeslider" id="banner-slider">
                   <?php $args= array('post_type' => 'slider',
                                        'posts_per_page' => -1);
                        $loop =  new WP_Query($args);
                    if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();
                        $imgsrc= wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                   ?>
        <div class="slides"><a href="<?php echo get_field('link')?>"><img src="<?php echo $imgsrc[0]; ?>" /></a></div>
                    <?php endwhile; endif; wp_reset_query(); ?>
    </div> 
    <div class="general-page home-content-block">
        <div class="container">
            <div class="home-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
