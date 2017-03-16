<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 
 */
get_header(); 
$obj = get_queried_object();
global $wp_query;
$post_type_object = get_post_type_object( $wp_query->query_vars['post_type'] );
print_r($post_type_object);
?>
<div id="content" class="general-page general-page-section clearfix" role="main">
    <div class="page-main-block clearfix">
           <div class="blog-sidebar">
               <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
            <div class="container">
               <?php if($obj){?>
                <h2><?php echo $obj->cat_name; ?></h2> 
                <?php } else{ ?>
                    <h2><?php _e('Archive','ucsc'); ?></h2> 
                <?php }?>
                <div class="main-content clearfix">
                   <?php if(have_posts()): while(have_posts()): the_post(); ?>
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
                     <?php $count_posts = wp_count_posts( 'post' )->publish;
                    
                    if( $obj->count >= 12 ){?>
                        <div class="more-posts"></div>
                        <div class="posts-page-count hidden" count-val="1"></div>
                        <div class="load-more" id="load-more-cats"><span>Load More</span></div>
                        <div class="loading load-more" id="loading"><span>Loading...</span></div>
                        <div class="no-more-posts load-more" id="no-more"><span>No More Posts</span></div>
                    <?php }
                    if(  $obj->count == "" ){
                    if(  $count_posts >= 12){?>
                        <div class="more-posts"></div>
                        <div class="posts-page-count hidden" count-val="1"></div>
                        <div class="load-more" id="load-more-cats"><span>Load More</span></div>
                        <div class="loading load-more" id="loading"><span>Loading...</span></div>
                        <div class="no-more-posts load-more" id="no-more"><span>No More Posts</span></div>
                    <?php } }?>
                </div>
            </div>
    </div> 
</div><!-- end of #content -->
<script>
    //ajax category blog posts load
    jQuery('#load-more-cats').click(function(){
        jQuery("#load-more-cats").fadeOut();
        jQuery("#loading").fadeIn();
        var page = jQuery(".posts-page-count").attr('count-val'); // What page we are on.
        var ppp = 11; // Posts per page
        var catval= '<?php echo $obj->cat_ID; ?>';
        var data = {
            offset: (page * ppp) + 1,
            ppp: ppp,
            cat: catval,
            action:"more_cat_post_ajax",
        }
        console.log("data"+JSON.stringify(data));
        jQuery.ajax({
            type: 'POST',
            url: Theme.ajax_url,
            dataType: 'json',
            data:data,
            success:function(posts){
                if(posts.status == 'true'){
                    page++;
                    jQuery(".posts-page-count").attr('count-val',page++);
                    jQuery(".more-posts").append(posts.html); // CHANGE THIS!
                    jQuery("#loading").fadeOut();
                    jQuery("#load-more-cats").fadeIn();
                }
                else{
                   jQuery("#load-more-cats").hide();
                    jQuery("#loading").hide();
                    jQuery("#no-more").fadeIn();
                }
            }    
        });
    });
</script>
<?php get_footer(); ?>