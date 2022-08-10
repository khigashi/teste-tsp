<?php
if (!defined('ABSPATH')) {
    exit();
}
// Add Pages admin
function tsp_menu_page() {
  add_menu_page( 'Endereço Rodapé', 'Endereço Rodapé', 'manage_options', 'tsp_options', 'tsp_options', 'dashicons-location-alt', 90 ); 
  
}
add_action( 'admin_menu', 'tsp_menu_page' );

function tsp_options() {
	
	$tsp_cep_value = get_option('tsp_cep_value', false); //var_dump($tsp_cep_value);
    $tsp_cep_active = get_option('tsp_cep_active', false); //var_dump($tsp_cep_active);
	
    ?>
    <div id="custom-settings" class="wrap">
        <?php settings_errors(); ?>
		<div class="clear"></div>
        <form id="post-settings" method="post" action="options.php" >  
					
			<div class="container-header">
				<h1 class="settings-ico"><?php _e('Endereço de Rodapé - Configurações', TSP_TEXT); ?></h1>						
			</div>
			<div class="container">			
				<table id="table-tsp" class="table-tsp" celpadding='20'>
					<thead class="header-table">
						<tr>
							<th><?php _e('Detalhes', TSP_TEXT); ?></th>
							<th><?php _e('Valor', TSP_TEXT); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><label for="tsp_cep_value" class="label"><h3><?php _e('CEP', TSP_TEXT); ?></h3></label>
							<p>Informe o seu CEP.</p></td>
							<td>
                                <input class="cep" placeholder="60000-000" name="tsp_cep_value" id="tsp_cep_value" type="text" value="<?php echo $tsp_cep_value; ?> " maxlength="10">								
							</td>
						</tr>
                        <tr>
							<td><label for="tsp_cep_active" class="label"><h3><?php _e('Ativar endereço de rodapé?', TSP_TEXT); ?></h3></label>
							<p>Ao ativar este recurso será exibido uma tarja laranja no rodapé do site (front) somente da home do site para usuários logados.</p></td>
							<td>
                                <select name="tsp_cep_active" id="tsp_cep_active" class="select" required >
									<option value="">Selecione</option>
									<option value="yes" <?php if(!empty($tsp_cep_active) && ($tsp_cep_active == 'yes')) {  echo 'selected="selected"'; } ?> /><?php _e('Sim', TSP_TEXT); ?></option>
									<option value="no" <?php if(!empty($tsp_cep_active) && ($tsp_cep_active == 'no')) { echo 'selected="selected"';} ?> /><?php _e('Não', TSP_TEXT); ?></option> 
								</select> 								
							</td>
						</tr>	
					</tbody>
				</table>
				
			</div>	
			<div class="container">
					<?php submit_button( __('Salvar Configurações', TSP_TEXT), 'button-primary'); ?>
			</div>
						
				<?php settings_fields('tsp_settings_group'); ?>
				<?php do_settings_sections('tsp_settings_group'); ?>					
						
					
			<div class="clear"></div>
				
		</form>      
        
		

    </div> 
    <?php
}