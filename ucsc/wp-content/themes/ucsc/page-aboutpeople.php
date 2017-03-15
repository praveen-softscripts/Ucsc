<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Template
 *
 * Template Name:  About People
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="philosophy-page">
	<div class="container c795">
		<div class="aboutmenu">
			<?php theme_about_nav(); ?>
		</div>
	</div>
	<div class="section">
		<div class="container c795">
			<?php the_content(); ?>
		</div>		
	</div>
	<?php if(have_rows('top_level_mangement')): ?>
		<div class="top-level-people">
			<div class="container c795">
			<?php 
				while(have_rows('top_level_mangement')): the_row();
				$imgID = get_sub_field('image');
				$imagesrc = wp_get_attachment_image_src($imgID, 'img180x180');
				$image_alt = get_post_meta( $imgID, '_wp_attachment_image_alt', true);?>
				<div class="member">
					<div class="m-img<?php if($imagesrc=="") { ?> noimage<?php } ?>">
						<?php if($imagesrc) { ?><img src="<?php echo $imagesrc[0]; ?>" alt="<?php echo $image_alt; ?>"><?php } ?>
					</div>
					<div class="m-desc"><?php echo get_sub_field('description'); ?></div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	<div class="hr container c795"></div>	
	<?php endif; ?>
	<?php if(have_rows('students')): ?>
		<div class="m-students">
			<div class="container c795">
			<?php 
				while(have_rows('students')): the_row();
				$imgID = get_sub_field('image');
				$imagesrc = wp_get_attachment_image_src($imgID, 'img160x160');
				$image_alt = get_post_meta( $imgID, '_wp_attachment_image_alt', true);?>
				<div class="member">
					<div class="m-img<?php if($imagesrc=="") { ?> noimage<?php } ?>"><img src="<?php echo $imagesrc[0]; ?>" alt="<?php echo $image_alt; ?>"></div>
					<div class="m-desc"><?php echo get_sub_field('description'); ?></div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<div class="to-top-section">
	<div class="container large">
		<a class="to_top" href="#wrapper"><img src="<?php echo get_template_directory_uri()."/images/TopButton-white.png"; ?>" alt="to_top"></a>
	</div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
