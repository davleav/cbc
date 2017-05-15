<?php
/**
 * The template for displaying page
 *
 * @author  David Leavitt
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$classes = array('hidden' => 'hide', 'standard' => 'content-section', 'image_left' => 'content-section-em bg-left', 'imae_right' => 'content-section-em bg-right', 'image_full' => 'content-section-em bg-full', 'emphesis' => 'content-section-em');

$type = (rwmb_meta( "cbc_section_main_type" )) ? rwmb_meta( "cbc_section_main_type" ) : 'standard';
if(!empty($type) && $type !== 'hidden') {
    $title = get_the_title();
    $content = get_the_excerpt();
    $cta_type = (rwmb_meta( "cbc_section_main_cta_type" ) && rwmb_meta( "cbc_section_main_cta_type" ) != 'none') ? rwmb_meta( "cbc_section_main_cta_type" ) : 'standard';
    $cta_text = (rwmb_meta( "cbc_section_main_cta_text" )) ? rwmb_meta( "cbc_section_main_cta_text" ) : 'Read More';
    $cta_url = (rwmb_meta( "cbc_section_main_cta_url" )) ? rwmb_meta( "cbc_section_main_cta_url" ) : esc_url( get_permalink() );
?>
    <section class="<?php echo $classes[$type]; ?> content-main">
        <div class="section-group">
            <h1><a href="<?php echo $cta_url; ?>"><?php echo $title; ?></a></h1>
            <hr class="seperator" />
            <?php if( get_the_date() ) : ?>
            <span class="post_info date">
				<?php _e('Added:', 'cbc' ); ?>
                <a href="<?php echo esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ); ?>">
                  <?php echo get_the_date(); ?>
                </a>
            </span>
            <?php endif; ?>
            <span class="post_info author">
				<?php _e('Author:', 'cbc' ); ?>
            	<a class="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html( the_author_meta( 'display_name' ) ); ?></a>
            </span>
            
            
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
<?php    
 }
?>