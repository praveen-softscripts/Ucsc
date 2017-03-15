<?php
/**
 * @package WordPress
 * @subpackage naam
 * blog page
 */
get_header();?>

	<section class="general-page business-page general-page-section">
        <div class="container">
          <div class="blog-page clearfix">
              <h2><?php _e( 'Search Results for:', 'ucsc' ); ?><span class="search-term"> <?php echo esc_attr(get_search_query()); ?></span></h2>
        <div class=" blog-content-block">      
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="blog-content-inner-block clearfix">
               
                <div class="content clearfix">
                   <?php if(has_post_thumbnail()){
                        $imgsrc= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail'); ?>
                    <div class="news-thumbnail">
                       <a href="<?php echo get_permalink(); ?>">
                            <img src="<?php echo $imgsrc[0]; ?>" alt="News-img"/>
                        </a>
                    </div>
                   <?php } ?>
                   <div class="post-content  <?php if(!has_post_thumbnail()){ echo "full-content-block"; }?>">
                        <span class="post__label caps">
                            <?php echo get_the_category_list(',','',''); ?>
                        </span>
                       <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post__meta clearfix"> <?php echo get_avatar( get_the_author_meta( 'ID' ), 24 ); ?>             
                           <?php the_author(); ?> <span class="post__entry-date"><?php echo get_the_date('F j, Y', '', ''); ?></span>
                        </div>
                        <?php echo improved_trim_excerpt(); ?>
                        
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <nav class="woocommerce-pagination">
                <div class="pagination-block">
                        <div class="pagi-navi">
                           <?php wp_pagenavi(); ?>
                        </div>
                </div>
            </nav>
           <?php endif; ?>
        </div>    
            <div class="blog-sidebar"><?php dynamic_sidebar('blog_sidebar'); ?></div>
        </div>
        </div>
    </section>			
<?php get_footer(); ?>