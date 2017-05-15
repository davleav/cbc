<?php
/**
 * The template for displaying page
 *
 * @author  David Leavitt
 * @version 1.0
 */

/*if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}*/
$classes = array('hidden' => 'hide', 'standard' => 'content-section', 'image_left' => 'content-section-em bg-left', 'image_right' => 'content-section-em bg-right', 'image_full' => 'content-section-em bg-full', 'emphesis' => 'content-section-em');

$type = (rwmb_meta( "cbc_section_main_type" )) ? rwmb_meta( "cbc_section_main_type" ) : 'standard';

if(!empty($type) && $type !== 'hidden') {
    $title = get_the_title();
    $content = do_shortcode( get_the_content() );
    $cta_type = rwmb_meta( "cbc_section_main_cta_type" );
    $cta_text = rwmb_meta( "cbc_section_main_cta_text" );
    $cta_url = rwmb_meta( "cbc_section_main_cta_url" );
?>
    <section class="<?php echo $classes[$type]; ?> content-main">
        <div class="section-group">
            <h1><?php echo $title; ?></h1>
            <hr class="seperator" />
            <?php if( has_post_thumbnail() ) : ?>

              <div id="post_thumb">
        
                <?php the_post_thumbnail( 'large' ); ?>
        
              </div>
              
              <hr class="seperator" />
        
            <?php endif; ?>
            <p><?php echo $content; ?></p>
            <?php if($cta_type === 'standard') { ?>
                <button class="std-button large-button-text" onclick="window.location.href='<?php echo $cta_url; ?>';"><?php echo $cta_text; ?></button>
            <?php } else if ($cta_type === 'emphesis') { ?>
                <div class="call-to-action"><button onclick="window.location.href='<?php echo $cta_url; ?>'"><?php echo $cta_text; ?></button></div>
            <?php } ?>
        </div>
    </section>

    <?php get_template_part( 'templates/content', 'sections' ); ?>
<?php    
 }
?>