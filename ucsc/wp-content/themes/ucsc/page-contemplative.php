<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Contemplative Template
 *
Template Name:  Contemplative
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="contemplative-pedagogy green">
	<div class="general-page contemplative-content">
            <div class="container">
			    <?php the_content(); ?>
		    </div>
			
	</div>
   <?php if(have_rows('quote_block')):  while(have_rows('quote_block')): the_row();  ?>
        <?php if(get_field('content_block_2')){ ?>
         <div class="bimg overlay" style="background-image:url('<?php echo get_sub_field('bg_image'); ?>');">
            <div class="quote-block">
                    <div class="container c1016">
                        <?php if(get_sub_field('quote')){ ?>
                            <div class="quote-content"><?php echo get_sub_field('quote'); ?></div>
                        <?php } ?>
                        <?php if(get_sub_field('author')){ ?>
                            <div class="quote-author"><?php echo get_sub_field('author'); ?></div>
                        <?php } ?>
                        <?php if(get_sub_field('caption')){ ?>
                            <div class="quote-captions"><?php echo get_sub_field('caption'); ?></div>
                        <?php } ?>
                    </div>
             </div>    
        </div>
        <?php } ?>
    <?php endwhile; endif; ?>
    <?php if(get_field('content_block_1')){ ?>
     <div class="section contemplative-content-block1">
        <div class="container">
         <?php echo get_field('content_block_1'); ?>
        </div> 
     </div>
    <?php } ?>
    
    <?php if(get_field('content_block_2')){ ?>
     <div class="section contemplative-content-block2">
        <div class="container">
         <?php echo get_field('content_block_2'); ?>
         </div>
     </div>
    <?php } ?>
    
	<?php if(have_rows('footer_block')):  while(have_rows('footer_block')): the_row();  ?>
		<div class="footer-section contemplative-footer bimg overlay" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
				<div class="section">
					<div class="container large relative-pos"> 
						<div class="fcontent-wrap contemplative-footer-inner">
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
                                        <?php if($i==3){?></ul><ul><?php $i=1; } $i++; ?>
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
