<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Template
 *
 * Template Name: Good Stuff
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="cases-page gold">
	<div class="container c980">
		<div class="ethicmenu">
			<?php theme_ethic_nav(); ?>
		</div>
	</div>
			<?php
//$args = array("post_type"=>"cases", "posts_per_page"=>-1,"meta_key"=>"fav_post","meta_value"=>0);
$args = array("post_type"=>"cases", "posts_per_page"=>-1);
		$loop = new WP_Query($args);
	if($loop->have_posts()): ?>
<div class="cases-wrap">
<?php while($loop->have_posts()):  $loop->the_post();  $imgsrc=wp_get_attachment_image_src(get_post_thumbnail_id(),'full');?>
	<div class="case-wrap overlay">
		<div class="image-blk" style="background-image:url('<?php echo $imgsrc[0]; ?>')"></div>
		<div class="content-wrap">
			<div class="title"><?php echo get_the_title(); ?></div>
			<div class="description">
				<?php echo wp_trim_words(get_field('short_description'), 20, "..."); ?><br>
				<?php if(get_field('link_type')=='description'){?>
					<a class="button" href="<?php echo get_the_permalink(); ?>">View case</a>
				<?php }else{ ?>
					<a class="button" target="_blank" href="<?php echo get_field('case_document'); ?>">View case</a>
				<?php } ?>
			</div>
		</div>
	</div>
         <?php endwhile; wp_reset_postdata(); ?>    
	</div>
	<?php endif; ?>
	<div class="section">
		<div class="container">
			<?php the_content(); ?>
			<?php if(have_rows('add_case')):?>
			<div class="archives-links">
			<ul>
				<?php while(have_rows('add_case')): the_row(); ?>
					<li><a target="_blank" class="button" href="<?php echo get_sub_field('file'); ?>"><?php echo get_sub_field('year'); ?></a></li>
				<?php endwhile;  ?>
			</ul>
			</div>
			<?php endif; ?>
		</div>
		
	</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
