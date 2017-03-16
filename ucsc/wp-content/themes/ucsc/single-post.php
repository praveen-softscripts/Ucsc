<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Index Template
 *
 *
 * @file           single-cases.php
 */

get_header(); ?>

<div class="general-page single-postspage business-page clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <div class="container clearfix">
       <div class="page-blocks clearfix">
           <?php echo breadcrumb($post->ID); ?>
            <div class="page-content general-content-block">  
               <div class="author-desc">
                   <div class="post-meta-values clearfix">
                    <div class="post-category post-date"> <?php echo get_the_category_list(',','',''); ?></div>
                    <div class="post-date"> <?php echo get_the_date('F j, Y', '', ''); ?></div>
                   </div>
                    <h2><?php the_title(); ?></h2>
                    <div class="author-name">Posted By  <?php echo get_the_author(); ?></div>
				</div>	 
                <div class="about-author clearfix">
				    <div class="single_wrap_content">
				        <div class="content"><?php the_content(); ?></div> 
                       <?php $terms = get_the_terms( $post->ID, 'category' ); 
                            ?>
                        <a href="<?php echo get_category_link( $terms[0] ); ?>" class="download-link"><?php _e('Back','ucsc'); ?></a>
                    </div>
				</div>
                
           </div>
           
           <?php endwhile; ?>
           
        </div>
        <?php  endif; ?>
        </div>
	
</div>
<?php get_footer(); ?>
