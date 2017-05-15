<?php
/**
 * The template for displaying single post
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
    $content = get_the_content();
    $cta_type = (rwmb_meta( "cbc_section_main_cta_type" )) ? rwmb_meta( "cbc_section_main_cta_type" ) : 'standard';
    $cta_text = (rwmb_meta( "cbc_section_main_cta_text" )) ? rwmb_meta( "cbc_section_main_cta_text" ) : 'Read More';
    $cta_url = (rwmb_meta( "cbc_section_main_cta_url" )) ? rwmb_meta( "cbc_section_main_cta_url" ) : esc_url( get_permalink() );
?>
    <section class="<?php echo $classes[$type]; ?> content-main">
        <div class="section-group">
            <h1><?php echo $title; ?>
            
            </h1>
            <?php if( get_the_date() ) : ?>
            <span class="post_info date">
				<?php _e('Added:', 'cbc' ); ?>
                <a href="<?php echo esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ); ?>">
                  <?php echo get_the_date(); ?>
                </a>
            </span>
            <?php endif; ?>
            <span class="post_info author">
				<?php _e('Author:', 'quick-sales' ); ?>
            	<a class="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html( the_author_meta( 'display_name' ) ); ?></a>
            </span>
            <hr class="seperator" />
            
            <?php if( has_post_thumbnail() ) : ?>

              <div id="post_thumb">
        
                <?php the_post_thumbnail( 'large' ); ?>
        
              </div>
              
              <hr class="seperator" />
        
            <?php endif; ?>
            
            <p><?php echo $content; ?></p>
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
        </div>
    </section>
<?php    
 }
?>