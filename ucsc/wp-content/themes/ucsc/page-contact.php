<?php
/**
 * Template Name: Contact
 */
get_header();?>
<?php if (have_posts()) : while (have_posts()) : the_post();
       ?>
        <section class="general-page contact-page bimg overlay" style="background-image:url('<?php echo get_field('page_banner'); ?>');">
            <div class="container large">
                <div class="contact clearfix">
				<div class="title"><h2><?php the_title(); ?></h2></div>
				        <div class="contact-content">
							<?php the_content(); ?>
						</div>
						<?php if(get_field('donate_link')){?>
                            <a href="<?php echo get_field('donate_link'); ?>" class="button" target="_blank"><?php _e('Donate','ucsc'); ?></a>
						<?php } ?>
				</div>
            </div>	
        </section>				
<?php endwhile;  endif; ?>		
<?php get_footer(); ?>
