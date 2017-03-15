<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Norcal regional Page
 *
Template Name:  Norcal Regional
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="norcalregional gold">
	<div class="container c980">
		<div class="ethicmenu">
			<?php theme_ethic_nav(); ?>
		</div>
	</div>
    <div class="events-block section">
        <div class="container c665">
        <div class="events-head clearfix">
             <?php if(get_field('main_featured_image')){
                $imgsrc= wp_get_attachment_image_src(get_field('main_featured_image'),'img178x112'); ?>
              <div class="events-heading-left">
                  <img src="<?php echo $imgsrc[0]; ?>" alt="event-featured-img" />
              </div>
              <?php }?>
               <?php if(get_field('main_title') || get_field('main_date')){?>
                   <div class="events-headings-right">
                    <?php if(get_field('main_title')){?>
                    <div class="event-title"><?php echo get_field('main_title'); ?></div>
                    <?php }?>
                    <?php if(get_field('main_date')){
                       $timestamp= strtotime(get_field('main_date')); ?>
                    <div class="event-date"><?php echo date('F d, Y'); ?></div>
                    <?php }?>
                    </div>
                <?php }?>
            </div>
            <?php if(get_field('main_content')){?>
            <div class="event-content"><?php echo get_field('main_content'); ?></div>
            <?php }?>
            
        </div>
        <div class="events-posts">
            <div class="events-section">
                   <div class="posts-events-sidebar-head">
                    <div class="events-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/calendar.png" alt="icon"/>					
                    </div>
                    <div class="events-posts-title"><?php _e('schedule of events','ucsc'); ?></div>
                    </div>
                    <div class="event-posts">
                        <ul>
                            <?php $args = array( 'post_type' => 'events', 'posts_per_page' => 5);
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
    </div>    

		<div class="footer-section ucsc-bg-block bimg" style="background-image:url('<?php echo get_field('image'); ?>')">
				<div class="section">
					<div class="container large relative-pos"> 
						<div class="fcontent-wrap ucsc-bg-inner">
							<?php if(get_field('title')){?><h2><?php echo get_field('title'); ?></h2><?php } ?>
                               <?php if(get_field('content')){?>
                                    <div class="norcalregional-footer-content">
                                        <?php the_field('content'); ?>
                                    </div>
                                <?php } ?>
                                <?php if(have_rows('lists')): $i=1;$j=1; ?>
                                <div class="lists">
                                    <ul>
                                        <?php  while(have_rows('lists')): the_row();  ?>
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
					</div>
				</div>
				
		</div>	
<div class="upcoming-bowl section">
  
   <div class="container c813">
       <?php if(get_field('upcoming_bowl')){?>
        <?php echo get_field('upcoming_bowl');?>
        <?php }?>
        <?php while(have_rows('appriciation_block')): the_row(); ?>
            <?php $volbg = get_sub_field('bg_image'); ?>
            <div class="appriciation-section bimg" style="background-image:url(<?php echo $volbg; ?>)">
                <?php if(get_sub_field('image')) { ?>
                    <div class="appriciation-img">
                        <img src="<?php echo get_sub_field('image'); ?>" alt="volunteer"/>
                    </div>
                 <?php } ?>
                <div class="appriciation-content">
                    <?php echo get_sub_field('content'); ?>
                </div>
            </div>
        <?php endwhile; ?>
     </div>
</div>  
<div class="norcal-volunteers section">
    <div class="container c813">
        <?php if(get_field('volunteer_title')){?>
            <h2><?php echo get_field('volunteer_title');?></h2>
        <?php }?>
        <?php if(get_field('volunteer_content')){?>
            <div class="volunteer-content"><?php echo get_field('volunteer_content');?></div>
        <?php }?>
        <?php if(have_rows('volunteers')):  while(have_rows('volunteers')): the_row();  ?>
           <div class="volunteer-block">
            <?php if(get_sub_field('title')){?>
                <div class="volunteer-title"><?php echo get_sub_field('title');?></div>
            <?php }?>
                <ul class="volunteer-inner-block clearfix">
                <?php if(have_rows('members')):  while(have_rows('members')): the_row();  ?>
                    <li>
                       <?php if(get_sub_field('member')){
                        $imgsrc= wp_get_attachment_image_src(get_sub_field('member'),'full'); ?>
                            <img src="<?php echo $imgsrc[0]; ?>" class="volunteer-img" alt="volunteer-img" />
                        <?php }?>
                        <div class="member-meta"> 
                            <?php if(get_sub_field('name')){?>
                                <div class="volunteer-name"><?php echo get_sub_field('name');?></div>
                            <?php }?>
                            <?php if(get_sub_field('designation')){?>
                                <div class="volunteer-designation"><?php echo get_sub_field('designation');?></div>
                            <?php }?>
                        </div>
                    </li>       
                <?php endwhile; endif; ?>
                </ul>
           </div>
        <?php endwhile; endif; ?>
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
    </div>
</div>      

	<?php if(have_rows('footer_block')):  while(have_rows('footer_block')): the_row();  ?>
		<div class="footer-section norcalregional-footer bimg overlay" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
				<div class="section">
					<div class="container large relative-pos"> 
						<div class="fcontent-wrap norcalregional-footer-inner">
							<h2><?php echo get_sub_field('title'); ?></h2>
                                <div class="norcalregional-footer-content">
                                    <?php the_sub_field('content'); ?>
                                </div>
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
						<a class="to_top-scroll" href="#wrapper"><img src="<?php echo get_template_directory_uri()."/images/Top Button-dark.png"; ?>" alt="to_top"></a>
					</div>
				</div>
				
		</div>
	<?php endwhile; endif; ?>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
