<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
/*
 * Globalize Theme options
 */ ?>
<footer>
     <div class="container large">
                <?php if(themeOptions('footer_logo')){ ?>
                    <div class="footer-logo">
                       <a href="<?php echo bloginfo('url'); ?>">
                            <img src="<?php echo themeOptions('footer_logo'); ?>" alt="footer-logo" />
                        </a>
                    </div>
                <?php } ?>
                <?php if(themeOptions('copy_info')){ ?>
                    <div class="copyright">
                      <?php echo themeOptions('copy_info'); ?>
                       <br> &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('description');  ?>
                    </div>    
                <?php } ?>
                 
		</div> 
</footer>
<?php wp_footer(); ?>
</body>
</html>
