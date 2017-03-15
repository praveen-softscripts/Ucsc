<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Index Template
 *
 *
 * @file           index.php
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

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div id="content" class="general-page general-page-section clearfix" role="main">
    <div class="page-main-block clearfix">
            <div class="container">
                <div class="main-content">
                    <?php the_content(); ?>
                </div>
             </div>
    </div> 
</div><!-- end of #content -->
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
