<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template Name: Blog
 */
get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div id="content" class="general-page general-page-section clearfix" role="main">
    <div class="page-main-block clearfix">
           <div class="blog-sidebar">
               <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
            <div class="container">
                <h2><?php _e('All Posts','ucsc'); ?></h2> 
                <div class="main-content clearfix">
                   <?php $args= array('post_type' => 'post', 'posts_per_page' => 12);
                        $loop= new WP_Query($args); 
                    if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();  ?>
                       <div class="post-block clearfix">
                          <div class="post-content">
                           <div class="cat-lists">
                               <?php echo get_the_category_list(',','',''); ?>
                           </div>
                           <h6><?php the_title(); ?></h6>
                           <div class="post-excerpt"><?php $content= get_the_content(); echo wp_trim_words(  $content, 22, ' ' ); ?></div>
                           </div>
                           <div class="post-read-more">
                               <a href="<?php the_permalink(); ?>" class="btn read-more-btn" ><?php _e('readmore','ucsc'); ?></a>
                           </div>
                       </div>   
                    <?php endwhile; wp_reset_query(); endif; ?>
                    <div class="more-posts"></div>
                    <div class="load-more">Load More</div>
                    <div class=""><?php $max = $wp_query->max_num_pages;
                                        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; 
//                                        echo $paged;
//                                        echo $max;
                                    ?>
                    </div>
                </div>
             </div>
    </div> 
</div><!-- end of #content -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>