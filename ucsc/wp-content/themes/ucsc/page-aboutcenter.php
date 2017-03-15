<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Template
 *
 * Template Name:  About Center
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="about-center-page">
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
	<?php if(get_field('fullwidth_image')):?>
	<div class="banner-image overlay">
		<?php 
			$imgID = get_field('fullwidth_image');
			$imagesrc = wp_get_attachment_image_src($imgID, 'full');
			$image_alt = get_post_meta( $imgID, '_wp_attachment_image_alt', true);
		?>
		<img src="<?php echo $imagesrc[0];  ?>" alt="<?php echo $image_alt; ?>">
	</div>
	<?php endif; ?>
	<div class="section">
		<div class="container c795 h2black">
			<?php echo get_field('content_under_image'); ?>
		</div>		
		<?php if(have_rows('circles_with_content')): $c=1; ?>
		<div class="container c795">
			<div class="circles-blk-wrap">
				<?php while(have_rows('circles_with_content')): the_row(); ?>
					<div class="circle_fullwrap">
						<div class="circles-blk match">
							<div class="circles-blk-image bimg" style="background-image:url('<?php echo get_sub_field('image'); ?>');">
								<div class="content-blk <?php if($c>1){ ?>colorwhite<?php } $c++; ?>">
									<?php echo get_sub_field('content'); ?>
								</div>
							</div>
						</div>
						<div class="circle_description match">
							<?php echo get_sub_field('description'); ?>
						</div>
					</div>		
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="container c795 h2black">
			<?php echo get_field('content_between_circles'); ?>
		</div>
			<?php if(have_rows('circles_with_content_2')): ?>
		<div class="container c795">
			<div class="circles-blk-wrap">
				<?php while(have_rows('circles_with_content_2')): the_row(); ?>
					<div class="circle_fullwrap">
						<div class="circles-blk match">
							<div class="circles-blk-image bimg" style="background-image:url('<?php echo get_sub_field('image'); ?>');">
								<div class="content-blk">
									<?php echo get_sub_field('content'); ?>
								</div>
							</div>
						</div>
						<div class="circle_description match">
							<?php echo get_sub_field('description'); ?>
						</div>
					</div>		
				<?php endwhile; ?>
			</div>
		</div>
	</div>

	<?php endif; ?>
	
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
										</li>
									<?php if($i==7){?></ul><ul><?php $i=1; } $i++; ?>
									<?php endwhile; ?>
								</ul>
							</div>
						 <?php endif; ?>
						</div>
						<a class="to_top" href="#wrapper"><img src="<?php echo get_template_directory_uri()."/images/Top Button-dark.png"; ?>" alt="to_top"></a>
					</div>
				</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
