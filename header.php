<?php
global $woo_options, $woocommerce, $wp_versoion;

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classical Ballet Conservatory</title>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' );?>/js/fotorama/fotorama.js"></script>
    <script type="text/javascript">
        jQuery(document).ready( function() {
            jQuery('.bios-scroll-left').click( function() {
                jQuery('.bios-scroll-container').animate({scrollLeft: '-=222'}, 500);
            });
            jQuery('.bios-scroll-container').on('swiperight', function() {
                jQuery('.bios-scroll-container').animate({scrollLeft: '-=222'}, 500);
            });

            jQuery('.bios-scroll-right').click( function() {
                jQuery('.bios-scroll-container').animate({scrollLeft: '+=222'}, 500);
            });
            jQuery('.bios-scroll-container').on('swipeleft', function() {
                jQuery('.bios-scroll-container').animate({scrollLeft: '+=222'}, 500);
            });
        });
		jQuery(window).load( function() {
			jQuery('.ui-loader').hide();
			
			var largest_height = 0;
			jQuery('footer .info-sections li').each( function() {
				if(jQuery(this).height() > largest_height) {
					largest_height = jQuery(this).height();
				}
			});
			jQuery('footer .info-sections li').height( largest_height );
		});
    </script>
    <?php wp_head();?>
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' );?>/js/fotorama/fotorama.css">
   
    <?php
	/*if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$color_xlite = '#ffd5ee';
			$color_lite = '#ffbde4';
			for($i=1; $i <= 5; $i++)  {	
				$bgs = rwmb_meta( "cbc_section_{$i}_bg", 'size=full' );
				if(!empty($bgs)) {
					foreach($bgs as $bg) {
						$background_dynamic .= ".content-section-em.content-$i {\n".
							"background-image: $color_lite url('{$bg['full_url']}');\n".
							"background-image: url('{$bg['full_url']}'), -webkit-linear-gradient(90deg, $color_lite, $color_xlite, $color_lite);\n".
							"background-image: url('{$bg['full_url']}'), -o-linear-gradient(90deg, $color_lite, $color_xlite, $color_lite);\n".
							"background-image: url('{$bg['full_url']}'), -moz-linear-gradient(90deg, $color_lite, $color_xlite, $color_lite);\n".
							"background-image: url('{$bg['full_url']}'), linear-gradient(90deg, $color_lite, $color_xlite, $color_lite);\n".
						"}\n";
					}
				}
			}
			$myfile = fopen("dynamic.css", "w+") or die("Unable to open file!");
			fwrite($myfile, $background_dynamic);
			fclose($myfile);
		endwhile;
	endif;
	wp_reset_postdata();*/
	?>
    <!--<link rel="stylesheet" type="text/css" href="/dynamic.css">-->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' );?>/style.php">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' );?>/style.css">
    
	
</head>
<body>
    <section class="site">
        <header>
            <nav class="topbar">
                <span class="contact">
                    801.441.0436
                </span>
                <span class="social">
                    <strong><a href="http://www.facebook.com/utahcbc">!</a></strong>
                    <a href="http://www.twitter.com/utahcbc">"</a>
                    <strong><a href="http://www.instagram.com/utahcbc">$</a></strong>
                    <a href="<?php bloginfo('rss2_url'); ?>">&Eacute;</a>
                </span>
                <span class="member-functions">
                    <a href="/register">REGISTER</a>
                </span>
            </nav>
            <nav class="main-nav">
                <div class="main-nav-container">
                    <div class="logo">
                        <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						}
						?>
                    </div>
                    <div class="mobile-main-nav"><a href="javascript: void(0);" onclick="jQuery('.main-nav li').toggle();">&#9776;</a></div>
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                    <!--<ul>
                        <div class="mobile-main-nav"><a href="javascript: void(0);" onclick="var p = jQuery(this).parent(); jQuery('.main-nav li').toggle();">&#9776;</a></div>
                        <li><a href="#">Faculty</a></li>
                        <li><a href="#">Classes And Pricing</a></li>
                        <li><a href="#">Dress Code</a></li>
                        <li><a href="#">Birthdays!</a></li>
                        <li><a href="#">Calendar</a></li>
                        <li><a href="#">Our Phylosophy</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>-->
                    <div style="clear: both;"></div>
                </div>
            </nav>
        </header>
        
        <?php
		if ( have_posts() ) :
			$post_count = 0;
			while ( have_posts() ) : the_post();
				if($post_count === 0) {
					$slider_images = (rwmb_meta( "cbc_slider_images" )) ? rwmb_meta( "cbc_slider_images" ) : array(
						array('full_url' => bloginfo( 'template_directory' ).'/images/header_image_01.png')
					);
					$slider_captions = (rwmb_meta( "cbc_slider_captions" )) ? rwmb_meta( "cbc_slider_captions" ) : array();
					$slider_width = (rwmb_meta( "cbc_slider_width" )) ? rwmb_meta( "cbc_slider_width" ) : '1600';
					$slider_ratio = (rwmb_meta( "cbc_slider_ratio" )) ? rwmb_meta( "cbc_slider_ratio" ) : '1600/783';
					$slider_autoplay = (rwmb_meta( "cbc_slider_autoplay" )) ? rwmb_meta( "cbc_slider_autoplay" ) : 'false';
					$slider_transition = (rwmb_meta( "cbc_slider_transition" )) ? rwmb_meta( "cbc_slider_transition" ) : '2000';
				}
				$post_count++;
			endwhile;
		endif;
		wp_reset_postdata();
		
		$slider_count = 0;
		?>
        
        <div class="slider fotorama" data-width="<?php echo $slider_width; ?>" data-ratio="<?php echo $slider_ratio; ?>" data-max-width="100%" data-arrows="true" data-click="false" data-swipe="true" data-autoplay="<?php echo $slider_autoplay; ?>" data-transitionduration="<?php echo $slider_transition; ?>">
        <?php foreach( $slider_images as $slider_image ) { ?>
            <img src="<?php echo $slider_image['full_url']; ?>" data-caption="<?php echo str_replace('"', "'", $slider_captions[$slider_count]); ?>">
            <?php $slider_count++; ?>
        <?php } ?>
        </div>
