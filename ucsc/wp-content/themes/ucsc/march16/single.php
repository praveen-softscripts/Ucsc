<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Index Template
 *
 *
 * @file           single.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/index.php
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div class="general-page business-page clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <div class="container clearfix">
       <div class="page-blocks clearfix">
            <div class="page-content general-content-block left">   
                <h1><?php the_title(); ?></h1>
                <div class="about-author">
                    <?php if(has_post_thumbnail()){ ?>
						<div class="single_image_wrap">
										<?php the_post_thumbnail('img600x999999'); ?>
				        </div>
				    <?php }?>    
						<div class="author-desc">
							<span class="author-name">By <?php echo get_the_author(); ?></span>
							<span class="post-date">Posted on <?php echo get_the_date('F j, Y', '', ''); ?> in <?php echo get_the_category_list(',','',''); ?></span>
						</div>	
				</div>
                <div class="content"><?php the_content(); ?></div>
           </div>
           
           <?php endwhile; ?>
           
        </div>
        <?php  endif; ?>
        </div>
	
    </div>
<?php get_footer(); ?>
