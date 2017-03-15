<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Santacruz Template
 *
Template Name:  Invitational
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="invitational-page gold">
	<div class="container c980">
		<div class="ethicmenu">
			<?php theme_ethic_nav(); ?>
		</div>
	</div>
	<div class="general-page santacruz-content">
            <div class="container">
			    <?php the_content(); ?>
		    </div>
			
    </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
