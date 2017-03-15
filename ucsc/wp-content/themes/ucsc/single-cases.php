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

<div class="general-page business-page clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <div class="container clearfix">
       <div class="page-blocks clearfix">
            <div class="page-content general-content-block left">  
               <div class="author-desc">
                    <div class="post-date"> <?php echo get_the_date('F j, Y', '', ''); ?></div>
                    <h2><?php the_title(); ?></h2>
                    <div class="author-name">Posted By  <?php echo get_the_author(); ?></div>
				</div>	 
                <div class="about-author clearfix">
                    <?php if(has_post_thumbnail()){ ?>
						<div class="single_image_wrap">
								<?php the_post_thumbnail('img279x279'); ?>
				        </div>
				    <?php }?>  
				    <div class="single_wrap_content">
				        <div class="content"><?php the_content(); ?></div> 
                       <?php if(get_field('download_file')){ ?> 
                        <a href="<?php echo get_field('download_file'); ?>" class="download-link" target="_blank"><?php _e('Download PDF','ucsc'); ?></a>
                       <?php } ?>
                    </div>
				</div>
                
           </div>
           
           <?php endwhile; ?>
           
        </div>
        <?php  endif; ?>
        </div>
	
    </div>
<?php get_footer(); ?>
