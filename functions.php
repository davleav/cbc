<?php
/**
 * Classical Ballet Conservatory functions and definitions
 *
 * @package WordPress
 * @subpackage cbc
 * @since 1.0
 *
**/

/* fix for if Meta Box plugin is deactivated so the site won't break' */
if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}

// Meta Box Additions
include 'cbc_meta_boxes.php';

include 'cbc_color_scheme.php';


function cbc_setup() {
    /* Make the theme available for translation */
    load_theme_textdomain( 'cbc' );

    /* Let wordpress manage the site title */
    add_theme_support( 'title-tag' );
	
	/* Enable support for Post Thumbnails on posts and pages */
	add_theme_support( 'post-thumbnails' );
	
	/* Enable support for custom logo */
	$defaults = array(
        'height'      => 108,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $defaults );

}
add_action( 'after_setup_theme', 'cbc_setup' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function cbc_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer bar 1',
		'id'            => 'footer_bar_1',
		'before_widget' => '<li>',
		'after_widget'  => '</li>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'cbc_widgets_init' );

/**
 * Register our menu areas.
 *
 */
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
	  'topbar-menu' => __( 'Topbar Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

/**
 * Register new shortcode for staff.
 *
 */ 
function staff_scroller($atts) {
	extract( shortcode_atts( array(
		'images' => 'images',
		'names' => 'names',
		'position' => 'position',
		'links' => 'links'
	), $atts ) );
	
	$image_urls = explode(',', $images);
	$staff_names = explode(',', $names);
	$staff_positions = explode(',', $positions);
	$staff_links = explode(',', $links);
	
	if(!empty($staff_names)) {
		$content = <<<CONT1
			<div class="bios-main-container">
				<div class="bios-scroll-left">
					<a href="javascript: void(0);" class="ui-link">&lt;</a>
				</div>
				<div class="bios-scroll-container">
					<ul class="bios">
CONT1;
			
		if(!is_array($staff_names)) {
			$staff_names = array($staff_names);
		}
		foreach($staff_names as $key => $name) {
			$img = (!empty($image_urls[$key])) ? '<img src="'.$image_urls[$key].'" alt="'.$name.'">' : '';
			$pos = (!empty($staff_positions[$key])) ? '<div>'.$staff_positions[$key].'</div>' : '';
			$lnk = (!empty($staff_links[$key])) ? $staff_links[$key] : '';
			$content .= <<<CONT2
						<li>
                        	<a href="$lnk" class="ui-link">
                        		$img
                        		<div class="bio-title"><strong>$name</strong>$pos</div>
                        	</a>
						</li>
CONT2;
		}
		$content .= <<<CONT3
					</ul>
				</div>
				<div class="bios-scroll-right">
					<a href="javascript: void(0);" class="ui-link">&gt;</a>
				</div>
			</div>
CONT3;
	}
	return $content;
} 
add_shortcode( 'add_staff_scroller', 'staff_scroller' );

/**
 * Add attribute to menu items.
 *
 */ 
add_filter( 'nav_menu_link_attributes', 'menu_atts', 10, 3 );

function menu_atts( $atts, $item, $args )
{
    // inspect $item, then …
    $atts['data-ajax'] = 'false';
    return $atts;
}

add_filter( 'get_custom_logo', 'logo_atts' );

function logo_atts( $html )
{
   $html = preg_replace('/(<a[^>]*?)/', '$1 data-ajax="false"', $html);
   
   return $html;
}

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'cbc_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function cbc_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Meta Box',
			'slug'      => 'meta-box',
			'required'  => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'cbc',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}