<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Index Template
 */

get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div id="content" class="general-page general-page-section clearfix" role="main">
    <div class="page-main-block clearfix">
            <div class="container">
                <h2><?php the_title(); ?></h2>
                <div class="main-content">
                    <?php the_content(); ?>
                </div>
             </div>
    </div> 
</div><!-- end of #content -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
