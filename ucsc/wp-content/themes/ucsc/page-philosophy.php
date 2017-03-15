<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Philosophy Template
 *
Template Name:  Philosophy
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="philosophy-page">
	<div class="general-page philcontent">
		<div class="container">
			<?php the_content(); ?>
		</div>		
	</div>
	<div class="full-video">
	<?php if(have_rows('video_block')): while(have_rows('video_block')): the_row(); ?>
			<video class="bg_item video" name="media" autoplay="" -webkit-playsinline="" playsinline="" muted="" loop="" poster="<?php echo get_field('video_default_image'); ?>"><source src="<?php echo get_sub_field('mp4'); ?>" type="video/mp4"><source src="<?php echo get_sub_field('ogg'); ?>" type="video/ogg"></video>
	<?php endwhile; endif; ?>
	</div>
	<div class="section">
		<div class="container md-container">
			<?php echo get_field('content_above_cricles'); ?>
		</div>
			
		<div class="container md-container">
			<?php if(have_rows('circles_with_content')): ?>
			<div class="circles-blk-wrap">
				<?php while(have_rows('circles_with_content')): the_row(); ?>
					<div class="circles-blk bimg" style="background-image:url('<?php echo get_sub_field('image'); ?>');">
						<div class="content-blk">
							<?php echo get_sub_field('content'); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
		
		<div class="container md-container cbelow-circles">
			<?php echo get_field('content_below_cricles'); ?>
		</div>
	</div>
	<?php if(have_rows('footer_block')):  while(have_rows('footer_block')): the_row();  ?>
		<div class="footer-section bimg overlay" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
				<div class="section">
					<div class="container large"> 
						<div class="fcontent-wrap">
							<h2><?php echo get_sub_field('title'); ?></h2>
							<?php the_sub_field('content'); ?>
							<?php if(have_rows('list')): $i=1; ?>
							<div class="lists">
								<ul>
									<?php  while(have_rows('list')): the_row();  ?>
										<li>
											<div class="ltitle">
												<?php the_sub_field('heading'); ?>
											</div>
											<div class="caption">
												<?php the_sub_field('caption'); ?>
											</div>
											<?php if(get_sub_field('link')){ ?><a target="_blank" href="<?php echo get_sub_field('link'); ?>" class="link"></a><?php } ?>
										</li>
									<?php if($i==5){?></ul><ul><?php $i=1; } $i++; ?>
									<?php endwhile; ?>
								</ul>
							</div>
						 <?php endif; ?>
						</div>
					</div>
				</div>
		</div>
	<?php endwhile; endif; ?>
	<div class="clearfix container large abtop">
		<a class="to_top" href="#wrapper"><img src="<?php echo get_template_directory_uri()."/images/TopButton-white.png"; ?>" alt="to_top"></a>
	</div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
