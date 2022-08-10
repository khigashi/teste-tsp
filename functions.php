<?php
// Register general settings
function tsp_register_mysettings() {
    // Config
	register_setting('tsp_settings_group', 'tsp_cep_value');
	register_setting('tsp_settings_group', 'tsp_cep_active');	
}
add_action('admin_init', 'tsp_register_mysettings');

// Function to load the styles and scripts in back
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

// Function to load the styles and scripts in back
function tsp_scripts_front() {
    
    if( is_home() || is_front_page() ){
        
		// register CSS
		wp_register_style('tsp_styles', plugin_dir_url(__FILE__) . 'assets/css/tsp-front.css', false, false); 
		
		// enqueues CSS
		wp_enqueue_style('tsp_styles');	
		
    }    
}
add_action('wp_enqueue_scripts', 'tsp_scripts_front');


// Insert HTML in footer
function tsp_footer_orange_stripe(){	
	$tsp_cep_value = get_option('tsp_cep_value', false); //var_dump($tsp_cep_value);
    $tsp_cep_active = get_option('tsp_cep_active', false); //var_dump($tsp_cep_active);
    $show = false;
    if( is_home() || is_front_page() ){
        $show = true;
    }
	if( !empty($tsp_cep_value) && $tsp_cep_active == 'yes' && $show ){
	
	?>
    <div id="orange_stripe">
        <div class="content-address">
            <?php $ConnectViaCep = new ConnectViaCep; $infos = $ConnectViaCep->get_cep_infos( $tsp_cep_value, $tsp_cep_active );  //var_dump($infos);?>
            <p><?php echo $infos['logradouro']; ?>, <?php echo $infos['localidade']; ?> - <?php echo $infos['uf']; ?></p>
            <p><?php echo $infos['cep']; ?></p>
        </div>
    </div>
	<?php
	    $ret = ob_get_contents();
		
		/* Clean buffer */
		ob_end_clean();
		
	    echo $ret;
    }
}
add_action( 'wp_footer', 'tsp_footer_orange_stripe');

