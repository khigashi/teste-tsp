<?php
// Function to load the styles
function tsp_scripts_admin() {
    global $pagenow;
    $currentScreen = get_current_screen();
	global $typenow;
    $var = $currentScreen->id;
	$telas = array(
	'toplevel_page_tsp_options',
	'tag-manager-options_page_settings_tsp_body_tags',
	'tag-manager-options_page_settings_tsp_body_tags_amp',
	);
    if ( in_array( $var, $telas ) ) {
        
		// register CSS
		wp_register_style('tsp_styles', plugin_dir_url(__FILE__) . 'assets/css/tsp-admin.css', false, false); 
		
		// enqueues CSS
		wp_enqueue_style('tsp_styles');
		
		
		// registre js
		wp_register_script('tsp_js', plugin_dir_url(__FILE__) . 'assets/js/tsp-admin.js', false, false, true);		
		
		// enqueues JS    
        wp_enqueue_script('jquery'); 
		wp_enqueue_script('tsp_js');
    }    
}
add_action('admin_enqueue_scripts', 'tsp_scripts_admin');