<?php
/**
 * Header Template
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

?>
	<!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<link href="https://fonts.googleapis.com/css?family=Loved+by+the+King" rel="stylesheet"> 
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?> >
<div class="mobile-nav">
		<div class="mob_logo">	
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/logo3.png"></a>
		</div>		
		<?php theme_responsive_nav(); ?>
</div>
<div class="wrapper" id="wrapper">
<header>
            <div class="logo">
                <a href="<?php echo bloginfo('url'); ?>"><?php the_logo(); ?></a>
            </div>
            <div class="header-block clearfix">
                   <div class="header-nav desktop-only"><?php theme_main_nav(); ?></div>
                   <div class="header-nav mobile-only">
                    <div class="mobicon">
                        <span class="lines" id="line1"></span>
                        <span class="lines" id="line2"></span>
                        <span class="lines" id="line3"></span>
				    </div>
                   </div>
            </div>
</header>