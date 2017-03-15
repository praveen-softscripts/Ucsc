<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Template
 *
 * Template Name: Ethic About
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="about-ethic-page gold">
	<div class="container c980">
		<div class="ethicmenu">
			<?php theme_ethic_nav(); ?>
		</div>
	</div>
	<div class="general-page">
		<div class="container c800">
			<div class="about-news-wrap">
				<?php $i=1; if(have_rows('about_news')):  while(have_rows('about_news')): the_row();  ?>
					<div class="anews-blk">
						<div class="timage"><img src="<?php echo get_sub_field('title_image'); ?>" alt=""></div>
						<div class="about-content <?php if($i ==1) { echo " active"; }?>">
							<div class="trim-content"><?php echo wp_trim_words(get_sub_field('content'), 10,"..."); ?><span href="#" class="see_more">See more</span></div>
							<div class="full-content"><?php echo get_sub_field('content'); ?></div>
						</div>
					</div>
				<?php $i++; endwhile; endif;?>
			</div>	
			<div class="qunie-wrap">
				<?php if(have_rows('qunie_block')):  while(have_rows('qunie_block')): the_row();  ?>
					<div class="qunie-blk">
						<div class="qimage"><img src="<?php echo get_sub_field('image'); ?>" alt=""></div>
						<div class="qunie-content">
							<?php echo get_sub_field('content'); ?>
							<?php if(get_sub_field('note')){?>
							<div class="qnote"><?php echo get_sub_field('note'); ?></div>
							<?php }?>
						</div>
					</div>
				<?php endwhile; endif;?>
			</div>
		</div>		
	</div>
	<div class="bg-gold section about-ethic-gcontent">
		<div class="container">
			<?php echo get_field('yellow_section'); ?>
		</div>
	</div>
	<div class="section">
		<div class="container c782">
			<?php echo get_field('content'); ?>
		</div>
	</div>
	
	<?php 
		$args = array("post_type"=>"cases", "posts_per_page"=>-3,"meta_key"=>"fav_post","meta_value"=>1);
		$loop = new WP_Query($args);
	if($loop->have_posts()):
	?>
	<div class="case-sutdies container c782">
	<h2><?php echo get_field('cases_heading');?></h2>
	<?php while($loop->have_posts()):  $loop->the_post();
//		$imgID = get_post_thumbnail_id();
//		$imagesrc = wp_get_attachment_image_src($imgID);
//		$image_alt = get_post_meta( $imgID, '_wp_attachment_image_alt', true);
		?>
		<div class="case-blk">
			<div class="img-blk"><?php the_post_thumbnail('img248x218'); ?></div>
			<div class="case-title"><?php the_title(); ?></div>
			<div class="content">
				<?php echo get_field('short_description') ?>
			</div>
			<a href="<?php echo get_the_permalink(); ?>" class="button">View case</a>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>	
	</div>
	<div class="all-cases">
		<div class="container c782">
			<a href="<?php echo bloginfo('url').'/the-good-stuff/'; ?>" class="button">view all cases</a>
		</div>
	</div>
	<?php endif;?>
	
</div>
<?php if(have_rows('footer_block')):  while(have_rows('footer_block')): the_row();  ?>
	<div class="footer-section bimg overlay" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
			<div class="section">
				<div class="container c980 fcontent-wrap about-ethic"> 
					<h2><?php echo get_sub_field('heading'); ?></h2>
					<div class="about-ethic-wrap">
						<div class="cleft"><?php echo get_sub_field('content_left'); ?></div>
						<div class="cright"><?php echo get_sub_field('content_right'); ?></div>
					</div>
				</div>
			</div>
	</div>
<?php endwhile; endif; ?>
<div class="section gold resource_content">
	<div class="container">
		<?php echo get_field('resources'); ?>
	</div>
</div>
<div class="clearfix container large abtop">
	<a class="to_top" href="#wrapper"><img src="<?php echo get_template_directory_uri()."/images/TopButton-white.png"; ?>" alt="to_top"></a>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
