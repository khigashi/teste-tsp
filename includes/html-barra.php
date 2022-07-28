<?php

function tarja_laranja() {

    $data['cep']        = get_option('cep');
    $data['logradouro'] = get_option('logradouro');
    $data['cidade']     = get_option('cidade');
    $data['uf']         = get_option('uf');

    $arquivo = __DIR__.'/../html/barra.html';
    $html = file_exists($arquivo) ? file_get_contents($arquivo) : '';

    $chaves = array_keys($data);
    $chaves = array_map(function($item){
        return '{{'.$item.'}}';
    },$chaves);
  
    echo str_replace($chaves,array_values($data),$html);

}


if(is_user_logged_in()) add_action('wp_footer', 'tarja_laranja');