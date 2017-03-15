<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Santacruz Template
 *
Template Name:  Santacruz
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="santacruz-page gold">
	<div class="container c980">
		<div class="ethicmenu">
			<?php theme_ethic_nav(); ?>
		</div>
	</div>
	<div class="general-page santacruz-content">
            <div class="container">
			    <?php the_content(); ?>
				<div class="absolute-content">
					<?php if(get_field('simage')) { ?><img src="<?php echo get_field('simage'); ?>" alt="Award"/><?php } ?>
					<div class="post-title">
						<?php echo get_field('con_edtior'); ?>
						
					</div>
					<?php if(get_field('read_more_link')) { ?><a href="<?php echo get_field('read_more_link'); ?>" class="read-more">READ MORE</a> <?php } ?>
				</div>		
		    </div>
			
	</div>

<div class="tabs-section">
	<?php $i=0; if(have_rows('member_type')): ?>
	<ul class="tabs">
		<?php while(have_rows('member_type')): the_row(); $i++; ?>
		<li><a href="#tab<?php echo $i; ?>"><?php echo get_sub_field('title'); ?></a></li>

		<?php endwhile; ?>
	</ul>
	<?php endif; ?>
	<?php $j=0; if(have_rows('member_type')): ?>
	<?php while(have_rows('member_type')): the_row(); $j++; ?>
	<div class="tab-bg" id="tab<?php echo $j; ?>">
		<div class="tab-container container c979">
			<div class="tab-left">
				<div class="sub-title"><?php echo get_sub_field('sub_title'); ?></div>
				<div class="show-slider<?php echo $j; ?>">
				 	<?php while(have_rows('images')): the_row(); $tbg = get_sub_field('image'); $bgurl = wp_get_attachment_image_src($tbg,'full'); ?>
						<div class="slide-image <?php echo $j; ?>">
							<img src="<?php echo $bgurl[0]; ?>" alt="team"/>
							<div class="description-text">
								<?php echo get_sub_field('description_text'); ?>
							</div>	
						</div>
						
					<?php endwhile; ?>		
				</div>
				
				<div class="thumbs-slider<?php echo $j; ?>">
					<?php while(have_rows('images')): the_row(); $tbg = get_sub_field('image'); $bgurl = wp_get_attachment_image_src($tbg,'full'); ?>
					<div class="thumb-image"><img src="<?php echo $bgurl[0]; ?>" alt="team"/></div>	
					<?php endwhile; ?>
				</div>
			</div>
			<div class="tab-right">
				<?php echo get_sub_field('content'); ?>
			</div>
		</div>
		<?php if(have_rows('mayor_proclamation')): ?>
			<div class="mayor_proclamation">
			<?php while(have_rows('mayor_proclamation')): the_row(); $tbimg = get_sub_field('image'); $tbimgurl = wp_get_attachment_image_src($tbimg,'full');
				$tbg = get_sub_field('bg_image'); $bgurl = wp_get_attachment_image_src($tbg,'full'); ?>
				<?php if(get_sub_field('image')){?>
					<div class="proc-img">
						<img src="<?php echo $tbimgurl[0]; ?>" alt="Proclmation-img" />
					</div>
				<?php }?>
				<?php if(get_sub_field('title')){ ?>
					<div class="proc-content bimg" style="background-image:url('<?php echo $bgurl[0]; ?>');">
						<div class="proc-title"><?php echo get_sub_field('title'); ?><a href="<?php echo get_sub_field('link'); ?>" class="fancybox"> View</a></div>
					</div>
				<?php }?>
			<?php endwhile; ?>
			</div>
		 <?php endif; ?>   
	</div>
	<?php endwhile; endif; ?>

</div>
<!-- -->
<?php if(have_rows('block_with_bg_image')): while(have_rows('block_with_bg_image')): the_row(); ?>
		<div class="footer-section ucsc-bg-block bimg" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
				<div class="section">
					<div class="container large relative-pos"> 
						<div class="fcontent-wrap ucsc-bg-inner">
							<?php if(get_sub_field('title')){?><h2><?php echo get_sub_field('title'); ?></h2><?php } ?>
                               <?php if(get_sub_field('content')){?>
                                    <div class="norcalregional-footer-content">
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                <?php } ?>
                                <?php if(have_rows('list')): $i=1;$j=1; ?>
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
                                                <?php if(get_sub_field('link')){?>
                                                <a href="<?php the_sub_field('link'); ?>" class="link" target="_blank"></a>
                                                <?php } ?>
                                            </li>
                                        
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                             <?php endif; ?>
                            
						</div>
						<?php if(have_rows('major_events')): while(have_rows('major_events')): the_row(); ?>
							<div class="fcontent-wrap-bottom">	
								<h2><?php echo get_sub_field('major_heading'); ?></h2>
								<div class="leftsection">
									<?php echo get_sub_field('left_block'); ?>	
								</div>
								<div class="rightsection">
									<?php echo get_sub_field('right_block'); ?>
								</div>
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
				
		</div>
<?php endwhile; endif; ?>
<!--profile-->  
<?php if(have_rows('profile_info')): ?>
   <div class="profileinfo bg-gold gold-section">
       <div class="container c980">
			<div class="profile-main-block">
				<?php while(have_rows('profile_info')): the_row();
					$imgsrc=wp_get_attachment_image_src(get_sub_field('image'),'full'); ?>
				   <div class="profile-block clearfix" >
				       <?php if(get_sub_field('image')){ ?>
				        <div class="profile-img"> <img src="<?php echo $imgsrc[0]; ?>" alt="book-image" /></div>
				        <?php } ?> 
				        <div class="profile-content">  
				            <?php echo get_sub_field('content'); ?>
				        </div>
				   </div>
				<?php endwhile; ?>
			</div>
        </div>
   </div>
<?php endif; ?>        
<!--end profile-->   
<?php if(have_rows('ethics_bowl_team')): ?>
  	<div class="ethics-bowlsection">
		<div class="container c795">
			<?php while(have_rows('ethics_bowl_team')): the_row(); ?>
				<?php echo get_sub_field('first_block'); ?>
				
				<?php if(have_rows('team')): ?>										
				
					<div class="team-slider">
					 	<?php while(have_rows('team')): the_row(); $teambg = get_sub_field('team_member'); $teambgurl = wp_get_attachment_image_src($teambg,'full'); ?>
							<div class="team-image">
								<img src="<?php echo $teambgurl[0]; ?>" alt="team"/>
								<div class="caption"><?php echo get_sub_field('caption'); ?></div>	
							</div>
							
						<?php endwhile; ?>		
					</div>
				
				<?php endif; ?>				
				
				<?php echo get_sub_field('second_block'); ?>
			
				<?php while(have_rows('volunteer')): the_row(); ?>
				<?php $volbg = get_sub_field('bg_image'); ?>
				<div class="volunteer-section" style="background-image:url(<?php echo $volbg; ?>)">
					<?php if(get_sub_field('image')) { ?><div class="volunteer-img">
						<img src="<?php echo get_sub_field('image'); ?>" alt="volunteer"/>
					</div> <?php } ?>
					<div class="volunteer-content">
						<?php echo get_sub_field('content'); ?>
					</div>
				</div>
				<?php endwhile; ?>
			<?php endwhile; ?>	
		</div>
	</div>
<?php endif; ?>
	<?php if(have_rows('footer_block')):  while(have_rows('footer_block')): the_row();  ?>
		<div class="footer-section contemplative-footer bimg overlay" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
				<div class="section">
					<div class="container large relative-pos"> 
						<div class="fcontent-wrap santacruz-inner">
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
                                                <?php if(get_sub_field('link')){?>
                                                <a href="<?php the_sub_field('link'); ?>" class="link" target="_blank"></a>
                                                <?php } ?>
                                            </li>
                                        <?php if($i==6){?></ul><ul><?php $i=1; } $i++; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                             <?php endif; ?>
                            
						</div>
						<a class="to_top-scroll" href="#wrapper"><img src="<?php echo get_template_directory_uri().'/images/Top Button-dark.png'; ?>" alt="to_top"></a>
					</div>
				</div>
				
		</div>
	<?php endwhile; endif; ?>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
