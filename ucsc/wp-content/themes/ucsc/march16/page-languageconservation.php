<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Language Conservation Template
 *
 * Template Name: Language Conservation
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 

get_template_part('banner','block') ?>
<div id="content-block" class="language-conservation-page">

	
	<div class="section">
		<div class="language-section">
			<div class="video-section container c795">
				<?php echo get_field('editor'); ?>
			</div>
			<div class="announcements-section">
				<div class="announce-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/images/announceicon.png" alt="icon"/>					
				</div>
				<div class="announce-title"><?php _e('Announcements','ucsc'); ?></div>
				<div class="announce-posts">
					<ul>
						<?php $args = array( 'post_type' => 'announcement', 'posts_per_page' => 3);
  						$loop = new WP_Query( $args );
   						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<li>
								<div class="post-date"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('n'); ?></span></div>
								<div class="post-desc"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
							</li>
						<?php endwhile; wp_reset_query(); ?>
					</ul>
				</div>	
			</div>
		</div>
		<div class="container c795">
			<?php the_content(); ?>
		</div>		
	</div>
	<?php $quoteimg = get_field('quote_banner'); 
	if($quoteimg) { ?>
		<div class="quote-banner bimg" style="background-image:url(<?php echo $quoteimg; ?>)">
			<div class="container large">
				<?php echo get_field('quote_content'); ?>
			</div>
		</div>	
		<?php if(get_field('caption')) { ?>
			<div class="container c795">
				<div class="quote-caption"><?php echo get_field('caption'); ?> </div>
			</div>
		<?php } ?>
	<?php } ?>
	<div class="pg-section">
		<div class="container c795">
			<h2><?php echo get_field('heading_text'); ?></h2>
			<div class="pg-content">
				<?php echo get_field('content_section'); ?>
				
			</div>	
			<div class="publications-section">
				<div class="heading"><?php echo get_field('publications_heading'); ?></div>
				<?php if(have_rows('publications')): ?>
					<div class="list-publications clearfix">
						<ul>
						<?php while(have_rows('publications')): the_row(); ?>
							<li class="match">
								<div class="book-image"><a target="_blank" href="<?php echo get_sub_field('link'); ?>">
									<img src="<?php echo get_sub_field('cover_image'); ?>" alt="book-cover"/>
									
								</a></div><!-- 
								--><div class="book-title"><?php echo get_sub_field('book_title'); ?></div>	
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>	
			</div>
			<div class="cd-section">
				<div class="heading"><?php echo get_field('course_description_heading'); ?></div>
				<?php if(have_rows('add_courses')): ?>	
					<div class="course-list">
						<ul>
						<?php while(have_rows('add_courses')): the_row(); ?>
							<li><a href="<?php echo get_sub_field('course_link'); ?>" target="_blank"><?php echo get_sub_field('course_title'); ?></a></li>
						<?php endwhile; ?>
						</ul>
					</div>	
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="blue-section">
		<div class="container c795">
			<h2><?php echo get_field('main_heading'); ?></h2>
			<div class="blue-content">
				<?php echo get_field('encontent_section'); ?>	
				<?php if(have_rows('trends')): ?>
					<div class="trend-list">
						<?php while(have_rows('trends')): the_row(); ?>
							<div class="trend-item">
								<div class="trend-icon">
									<img src="<?php echo get_sub_field('icon'); ?>" alt="icon"/>
								</div>
								<div class="trend-desc">
									<?php echo get_sub_field('description'); ?>	
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
		<div class="footer-section bimg overlay" style="background-image:url('<?php echo get_field('background_image'); ?>')">
				<div class="section">
					<div class="container large"> 
						<div class="fcontent-wrap">
							<h2><?php echo get_field('footer_heading'); ?></h2>
							<?php echo get_field('footer_content'); ?>
							<?php if(have_rows('list_style')): $i=1; ?>
							<div class="lists">
								<ul>
									<?php  while(have_rows('list_style')): the_row();  ?>
										<li>
											<div class="ltitle">
												<?php the_sub_field('list_title'); ?>
											</div>
										</li>
									<?php if($i==7){?></ul><ul><?php $i=1; } $i++; ?>
									<?php endwhile; ?>
								</ul>
							</div>
						 <?php endif; ?>
						</div>
						<a class="to_top" href="#wrapper"><img src="<?php echo get_template_directory_uri().'/images/Top Button-dark.png'; ?>" alt="to_top"></a>
					</div>
				</div>
		</div>
	
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
