<?php
// Register general settings
function tsp_register_mysettings() {
    // Config
	register_setting('tsp_settings_group', 'tsp_cep_value');
	register_setting('tsp_settings_group', 'tsp_cep_active');	
}
add_action('admin_init', 'tsp_register_mysettings');

// Function to load the styles
function tsp_scripts_admin() {
    global $pagenow;
    $currentScreen = get_current_screen();
	global $typenow;
    $var = $currentScreen->id;
	$telas = array(	'toplevel_page_tsp_options'	);
    if ( in_array( $var, $telas ) ) {
        
		// register CSS
		wp_register_style('tsp_adm_styles', plugin_dir_url(__FILE__) . 'assets/css/tsp-admin.css', false, false); 
		
		// enqueues CSS
		wp_enqueue_style('tsp_adm_styles');
		
		
		// registre js
        wp_register_script('tsp_mask', plugin_dir_url(__FILE__) . 'assets/js/jquery.mask.js', false, false, true);
		wp_register_script('tsp_adm_js', plugin_dir_url(__FILE__) . 'assets/js/tsp-admin.js', false, false, true);		
		
		// enqueues JS    
        wp_enqueue_script('jquery'); 
        wp_enqueue_script('tsp_mask');
		wp_enqueue_script('tsp_adm_js');
    }    
}
add_action('admin_enqueue_scripts', 'tsp_scripts_admin');
