<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Philosophy Template
 *
Template Name:  Philosophy In Jail
 */

get_header(); 
 if ( have_posts() ) : while( have_posts() ) : the_post(); 
?>
<?php get_template_part('banner','block') ?>
<div id="content-block" class="philosophy-in-jail-page pink-coloured">
	<div class="general-page philcon-injail-content">
	    <div class="large container jail-top-container">
           <?php if(get_field('book') || get_field('book_info')){
                $imgsrc= wp_get_attachment_image_src(get_field('book'),'full'); 
                ?>   
                <div class="book-block">
                    <?php if(get_field('book')){ ?>
                        <img src="<?php echo $imgsrc[0]; ?>" alt="book-image" />
                    <?php } ?>
                    <?php if(get_field('book_info')){ ?>
                        <div class="book-content"><?php echo get_field('book_info'); ?></div>
                     <?php } ?>
                </div>
            <?php } ?>
            <div class="container">
			    <?php the_content(); ?>
		    </div>
           <?php if(get_field('content_image') || get_field('content_image_link')){
                $imgsrcs= wp_get_attachment_image_src(get_field('content_image'),'full'); ?>   
                <div class="content-block">
                    <?php if(get_field('content_image')){ ?>
                        <img src="<?php echo $imgsrcs[0]; ?>" alt="book-image" />
                    <?php } ?>
                    <?php if(get_field('content_image_link')){ ?>
                        <a href="<?php echo get_field('content_image_link'); ?>" target="_blank"></a>
                     <?php } ?>
                </div>
            <?php } ?>	
        </div>
			
	</div>
    
<?php if(have_rows('block_with_bg_color')): ?>
    <?php while(have_rows('block_with_bg_color')): the_row(); ?>
            <div class="block-with-bg section clearfix" style="background-color:<?php echo get_sub_field('bg_color'); ?>;">
                   <div class="container">
                            <div class="bg-content-blk">
                                <?php echo get_sub_field('content'); ?>
                            </div>
                </div>
            </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php if(have_rows('profile_info')): ?>
    <?php while(have_rows('profile_info')): the_row();
        $imgsrc=wp_get_attachment_image_src(get_sub_field('image'),'full'); ?>
            <div class="profileinfo pink clearfix">
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
		<div class="footer-section p-in-jail-footer bimg overlay" style="background-image:url('<?php echo get_sub_field('image'); ?>')">
				<div class="section">
					<div class="container large relative-pos"> 
						<div class="fcontent-wrap in-jail-inner-footer">
							<h2><?php echo get_sub_field('title'); ?></h2>
							<?php the_sub_field('content'); ?>
							 <div class="p-in-jail-footer-inner clearfix">
                                <?php if(have_rows('prision_debate')): while(have_rows('prision_debate')): the_row(); ?>
                                <?php if(get_sub_field('image') || get_sub_field('content')){
                                    $imgsrc=$imgsrc=wp_get_attachment_image_src(get_sub_field('image'),'full'); ?>   
                                    <div class="prision-debate">
                                        <?php if(get_sub_field('image')){ ?>
                                            <img src="<?php echo $imgsrc[0]; ?>" alt="prison-image" />
                                        <?php } ?>
                                        <?php if(get_sub_field('content')){ ?>
                                            <div class="prision-debate-content"><?php echo get_sub_field('content'); ?></div>
                                        <?php } ?>
                                        <?php if(get_sub_field('link')){ ?>
                                            <a class="content_image_link" href="<?php echo get_sub_field('link')?>" target="_blank">Read more</a>
                                         <?php } ?>
                                    </div>
                                <?php } ?>	
                                <?php endwhile; endif; ?>
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
                                        <?php if($i==7){?></ul><ul><?php $i=1; } $i++; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                             <?php endif; ?>
                            </div>
						</div>
						<a class="to_top-scroll" href="#wrapper"><img src="<?php echo get_template_directory_uri()."/images/Top Button-dark.png"; ?>" alt="to_top"></a>
					</div>
				</div>
				
		</div>
	<?php endwhile; endif; ?>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
