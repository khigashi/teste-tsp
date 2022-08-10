<?php
if (!defined('ABSPATH')) {
    exit();
}

class ConnectViaCep{   
    
    function __construct() {
        
        return false;
		
	}

    function get_cep_infos( $tsp_cep_value, $tsp_cep_active ){		
		

        $cep = str_replace('-', '', $tsp_cep_value);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://viacep.com.br/ws/$cep/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        

        return json_decode($response, true);
    

    }


}

