<?php
/**
 * Theme Functions
 *
 * @package Wordpress
 * @subpackage DC
 */

/**
 * Enqueue scripts
 */
function dc_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '2.7.1' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.1.1' );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'dc_scripts' );

/**
 * Enqueue styles
 */
function dc_styles() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.1.1' );
    wp_enqueue_style( 'font', 'http://fonts.googleapis.com/css?family=Montserrat' );
    wp_enqueue_style( 'dc-css', get_stylesheet_uri(), array('bootstrap-css'), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'dc_styles' );

/**
 * Enqueue admin styles
 */
function dc_admin_head() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/js/admin.js', array('jquery') );
	wp_enqueue_media();
}
add_action ( 'admin_enqueue_scripts', 'dc_admin_head' );

/**
 * Custom Post Type - Panel
 */
function dc_panel_post_init() {
    $labels = array(
        'name'               => 'Panels',
        'singular_name'      => 'Panel',
        'add_new_item'       => 'Add New Panel',
        'edit_item'          => 'Edit Panel',
        'new_item'           => 'New Panel',
        'all_items'          => 'All Panels',
        'view_item'          => 'View Panel',
        'search_items'       => 'Search Panels',
        'not_found'          => 'No panels found',
        'not_found_in_trash' => 'No panels found in Trash',
        'parent_item_colon'  => '',
        'menu_name'          => 'Panels'
    );
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'menu_position'     => 5,
        'menu_icon'         => null,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'supports'          => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'       => true,
        'rewrite'           => array( 'slug' => 'panel' ),
        'query_var'         => true
    );
    register_post_type( 'panel', $args );
}
add_action( 'init', 'dc_panel_post_init' );

/**
 * Admin Theme Options Menu
 */
function dc_admin_menu() {
    add_theme_page( 'DC Theme Options', 'Theme Options', 'edit_theme_options', 'dc-theme-options', 'dc_theme_options' );
}
add_action( 'admin_menu', 'dc_admin_menu' );

function dc_theme_options() { ?>
	<div class="wrap">
		<h2>Theme Options</h2>
		<div id="theme-options-frame" class="metabox-holder">
			<section id="homepage-options" class="postbox">
				<div title="Click to Toggle" class="handlediv"></div>
				<h3 class="hndle"><span>Front Page Panel Order</span></h3>
				<div class="inside">
					<p class="howto">Drag and Drop panels in to the order you prefer.</p><?php
                    $items = new WP_query( array( 
					   'post_type' => 'panel',
					   'post_status' => 'publish',
					   'orderby'=>'menu_order',
					   'order'=>'ASC',
                    ) );?>
                    <ul id="sortable"><?php
                        while( $items->have_posts() ) : $items->the_post(); ?>
                            <li id="<?php echo get_the_ID(); ?>">
                                <b><?php the_title(); ?></b>
                                <i>(<?php echo get_post_type( get_the_ID() ); ?>)</i>
                            </li><?php
                        endwhile; ?>
                    </ul>
                </div>
			</section>
		</div>
	</div>
	<script>
		jQuery(function($){
			//save all options
			$('#save-changes-btn').click(function(){
				$(this).val('Saving...');
				//get form values individually
				var values = {
				};
				var data = {
					action: 'dc_theme_options_ajax_action',
					options: values
				};
				$.post(ajaxurl, data, function( msg ) {
					if ( msg == 'reload' ) {
						location.reload();
					} else {
						$('#save-changes-btn').val( msg );
					}
				});
			});
		});
	</script>
<?php }

/**
 * DC Theme Options Save
 * @return String 'reload' reloads the parent page if changes need to be shown
 */
function dc_theme_options_ajax_action() {
    $return = 'Changes Saved';
    //update options
    foreach( $_POST['options'] as $key => $value ) :
        $changed = update_option( $key, $value );
        if ( $changed ) :
            $return = 'reload';
        endif;
    endforeach;
    echo $return;
    die();
}
add_action( 'wp_ajax_dc_theme_options_ajax_action', 'dc_theme_options_ajax_action' );

/**
 * DC Save Order AJAX
 */
function dc_save_item_order() {
    global $wpdb;
    $order = explode(',', $_POST['order']);
	$counter = 0;
	foreach ($order as $tax_id) {
		$wpdb->query( 
			$wpdb->prepare( "
	        	UPDATE $wpdb->posts 
				SET menu_order = $counter
				WHERE ID = $tax_id ", $tax_id
	        )
		);
		$counter++;
	}    
	die(1);
}
add_action('wp_ajax_item_sort', 'dc_save_item_order');
add_action('wp_ajax_nopriv_item_sort', 'dc_save_item_order');

/**
 * Add Panel Meta Boxes
 */
function dc_panel_metabox_init() {
    add_meta_box( 'data-settings-meta', 'Data Panel Settings', 'dc_panel_settings_meta', 'panel', 'side', 'default');
}
add_action( 'admin_init', 'dc_panel_metabox_init' );


/**
 * Panel Settings Meta Box
 */
function dc_panel_settings_meta( $post ) {
    $data_bg = get_post_meta($post->ID, 'dc_panel_bg', true);?>
    <p class="howto">Customize panel functionality.</p>
    <label for="dc_panel_bg">Background Color:</label>
    <select name="dc_panel_bg">
        <option <?php selected( $data_bg, 'gray' ); ?> value="gray">Gray</option>
        <option <?php selected( $data_bg, 'black' ); ?> value="black">Black</option>
        <option <?php selected( $data_bg, 'yellow' ); ?> value="yellow">Yellow</option>
        <option <?php selected( $data_bg, 'white' ); ?> value="white">White</option>
        <option <?php selected( $data_bg, 'gray-pattern' ); ?> value="gray-pattern">Gray Pattern</option>
        <option <?php selected( $data_bg, 'black-pattern' ); ?> value="black-pattern">Black Pattern</option>
        <option <?php selected( $data_bg, 'yellow-pattern' ); ?> value="yellow-pattern">Yellow Pattern</option>
    </select><br>
<?php }

/**
 * Save Panel Meta Values
 */
function dc_panel_metabox_save( $post_id ) {
    // update c404_data_bg
    if( isset($_POST['dc_panel_bg']) ) {
        update_post_meta( $post_id, 'dc_panel_bg', $_POST['dc_panel_bg'] );
    }
}
add_action( 'save_post', 'dc_panel_metabox_save' );

