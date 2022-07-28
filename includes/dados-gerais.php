<?php

    


    function add_dados_gerais()
    {
        add_menu_page(
            "Inserir endereço",
            "Inserir endereço",
            "manage_options",
            "dados-gerais",
            "dados_gerais_barra_page",
            "",
            50
        );

    }

    function dados_gerais_barra_page()
    {
        ?>
            <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
           
            <!-- run the settings_errors() function here. -->
            <?php settings_errors(); ?>
            <h1>Inserir endereço no rodapé</h1>
       
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
               
                    settings_fields("dados_gerais");
                   
                    do_settings_sections("dados-gerais");
                    
               
                    submit_button();
                   
                ?>          
            </form>
        </div>
        <?php
    }

    add_action("admin_menu", "add_dados_gerais");

    function display_dados_gerais(){

        add_settings_section("dados_gerais", "", "display_form_cep", "dados-gerais");
        register_setting("dados_gerais", "cep");    
        register_setting("dados_gerais", "logradouro");    
        register_setting("dados_gerais", "cidade");    
        register_setting("dados_gerais", "uf");    
    }

    function display_form_cep(){
        
        include('form_dados_gerais.php');
    }

    add_action("admin_init", "display_dados_gerais");

    function admin_barra_stylescripts() {
		
        wp_enqueue_style( 'admin-estilos', WP_PLUGIN_URL.'/inserir-endereco-rodape/css/estilos.css');
        wp_enqueue_style( 'admin-sizes', WP_PLUGIN_URL.'/inserir-endereco-rodape/css/sizes.css');
    
        wp_enqueue_script( 'cep-js', WP_PLUGIN_URL.'/inserir-endereco-rodape/js/scripts.js','','',true );
        wp_enqueue_script( 'data-select', WP_PLUGIN_URL.'/inserir-endereco-rodape/js/data-select.js','','',true );
    
    }
    
    add_action('admin_enqueue_scripts', 'admin_barra_stylescripts', 11);

    function custom_barra_styles() {
        wp_enqueue_style( 'barra', WP_PLUGIN_URL.'/inserir-endereco-rodape/css/barra-front.css');
    }

    if(is_user_logged_in()) add_action( 'wp_enqueue_scripts', 'custom_barra_styles' );
    

    