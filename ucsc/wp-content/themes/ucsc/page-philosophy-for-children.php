<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Template
 *
 * Template Name: Philosophy for children
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="philosophy-child-page purple">
	<div class="section paper_top">
		<div class="container link-blk-image">
			<?php the_content(); ?>
			<div class="link-images">
				<div class="text-image"><img src="<?php echo get_field('link_text_image'); ?>" alt=""></div>
				<div class="link_wrap">
					<div class="link"><a target="_blank" href="<?php echo get_field('link_1'); ?>"><img src="<?php echo get_field('link_1_image'); ?>" alt=""></a></div>
					<div class="link"><a target="_blank" href="<?php echo get_field('link_2'); ?>"><img src="<?php echo get_field('link_2_image'); ?>" alt=""></a></div>
				</div>
			</div>
		</div>		
	</div>
	<div class="looking_books">
		<?php if(have_rows('looking_for_book')):  while(have_rows('looking_for_book')): the_row();  ?>
		<div class="container">
			<?php echo get_sub_field('content'); ?>
		</div>
		<?php if(have_rows('books')): ?>
			<div class="books-wrap">
			<div class="arrow" style="background-image:url('<?php echo get_template_directory_uri()."/images/arrows.png"; ?>');"></div>
			<div class="doodles" style="background-image:url('<?php echo get_template_directory_uri()."/images/doodles.png"; ?>');"></div>
			<div class="coloring" style="background-image:url('<?php echo get_template_directory_uri()."/images/coloring.png"; ?>');"></div>
			<div class="arrow_1" style="background-image:url('<?php echo get_template_directory_uri()."/images/book_arrow_1.png"; ?>');"></div>
			<div class="arrow_2" style="background-image:url('<?php echo get_template_directory_uri()."/images/book_arrow_2.png"; ?>');"></div>
				<div class="books-blk">
					<?php  while(have_rows('books')): the_row();  ?>
						<div class="book-blk <?php echo get_sub_field('book_class'); ?>">
							<?php if(get_sub_field('link')): ?>	<a href="<?php echo get_sub_field('link'); ?>"></a><?php endif; ?>
							<div class="img-wrap">
								<img src="<?php echo get_sub_field('image'); ?>" alt="">
							</div>
							<div class="caption"><?php echo get_sub_field('caption'); ?></div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
		<a target="_blank" href="<?php echo get_sub_field('bottom_link'); ?>" class="book_bottom_link"><?php echo get_sub_field('bottom_link_text'); ?></a>
		<?php endwhile; endif; ?>
	</div>
	<div class="section paper_bottom">
		<div class="container">
			<?php echo get_field('content_below_books'); ?>
			<div class="cricle-images">
				<?php if(have_rows('circle_images_and_qoute')):  while(have_rows('circle_images_and_qoute')): the_row();  ?>
					<div class="circle-blk">
						<div class="img-blk"><img src="<?php echo get_sub_field('image'); ?>" alt=""><?php if(get_sub_field('text')){ ?><span class="ctext"><?php echo get_sub_field('text'); ?></span><?php } ?></div>
						<?php if(get_sub_field('title')){ ?><div class="c-title"><?php echo get_sub_field('title'); ?></div><?php } ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
	<?php if(have_rows('profile_info')): ?>
    <?php while(have_rows('profile_info')): the_row();
        $imgsrc=wp_get_attachment_image_src(get_sub_field('image'),'full'); ?>
            <div class="profileinfo purple-section clearfix">
                   <div class="container c979">
                       <div class="profile-main-block">
							<div class="profile-block clearfix" >
							   <?php if(get_sub_field('image')){ ?>
								<div class="profile-img"> <img src="<?php echo $imgsrc[0]; ?>" alt="book-image" /></div>
								<?php } ?> 
								<div class="profile-content">  
									<?php echo get_sub_field('content'); ?>
								</div>
						   </div>
                       </div>
                </div>
            </div>
    <?php endwhile; ?>
<?php endif; ?> 
	<?php if(have_rows('footer_block')):  while(have_rows('footer_block')): the_row();  ?>
		<div class="footer-section bimg overlay" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
				<div class="section"> 
				<div class="container large"> 
						<div class="fcontent-wrap phil-chil-foot">
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
											<?php if(get_sub_field('link')){ ?><a href="<?php echo get_sub_field('link'); ?>" class="link"></a><?php } ?>
										</li>
									<?php if($i==6){?></ul><ul><?php $i=1; } $i++; ?>
									<?php endwhile; ?>
								</ul>
							</div>
						 <?php endif; ?>
						</div>
					</div>
				</div>
		</div>
	<?php endwhile; endif; ?>
	<div class="purple-section">
			<div class="bottom-section ">
			<?php if(have_rows('bottom_blocks')):  while(have_rows('bottom_blocks')): the_row();  ?>
					<div class="btm-blk match">
						<h2><?php echo get_sub_field('title'); ?></h2>
						<div class="img-blk">
							<img src="<?php echo get_sub_field('image'); ?>" alt="">
						</div>
						<div class="blk-content">
							<?php echo get_sub_field('content'); ?>
						</div>
					</div>
		<?php endwhile; endif; ?>
			</div>
	</div>
	<div class="clearfix container large abtop">
		<a class="to_top" href="#wrapper"><img src="<?php echo get_template_directory_uri()."/images/TopButton-white.png"; ?>" alt="to_top"></a>
	</div>
	
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
