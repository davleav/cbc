<?php
/**
 * The template for displaying page sections
 *
 * @author  David Leavitt
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$classes = array('hidden' => 'hide', 'standard' => 'content-section', 'image_left' => 'content-section-em bg-left', 'image_right' => 'content-section-em bg-right', 'image_full' => 'content-section-em bg-full', 'emphesis' => 'content-section-em');

for($i=1; $i <= 5; $i++)  {
    $type = rwmb_meta( "cbc_section_{$i}_type" );
    if(!empty($type) && $type !== 'hidden') {
        $title = rwmb_meta( "cbc_section_{$i}_title" );
        $content = do_shortcode( rwmb_meta( "cbc_section_{$i}_content" ) );
        $cta_type = rwmb_meta( "cbc_section_{$i}_cta_type" );
        $cta_text = rwmb_meta( "cbc_section_{$i}_cta_text" );
        $cta_url = rwmb_meta( "cbc_section_{$i}_cta_url" );
		
		$bgs = rwmb_meta( "cbc_section_{$i}_bg", 'size=full' );
?>
        <section class="<?php echo $classes[$type]; ?> content-<?php echo $i; ?>">
            <?php
				if(!empty($bgs)) {
					echo '<div class="bg-img">';
					foreach($bgs as $bg) {
						echo '<img src="'.$bg['full_url'].'" alt="'.$title.'" />';
					}
					echo '</div>';
				}
			?>
            <div class="section-group">
            	<?php if(!empty($title)) : ?>
                <h1><?php echo $title; ?></h1>
                <hr class="seperator" />
                <?php endif; ?>
                <?php if(!empty($content)) : ?>
                <p><?php echo $content; ?></p>
                <?php endif; ?>
                <?php if($cta_type === 'standard') { ?>
                    <button class="std-button large-button-text" onclick="window.location.href='<?php echo $cta_url; ?>';"><?php echo $cta_text; ?></button>
                <?php } else if ($cta_type === 'emphesis') { ?>
                    <div class="call-to-action"><button onclick="window.location.href='<?php echo $cta_url; ?>'"><?php echo $cta_text; ?></button></div>
                <?php } ?>
            </div>
        </section>
<?php    
    }
}
?>