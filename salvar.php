<?php
include_once('../../../wp-config.php');
include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');





if(isset($_POST['action'])){
    
    //echo '<pre>$_POST<br />'; var_dump($_POST); echo '</pre>'; exit;

    $action = $_POST['action'];
    $tabela = 'categorias';
    $rs     = '';

    $retorno['msg'] = 'Dados salvos com sucesso!';
    
    
    $dataForm['nome'] = $_POST['nome'];

    if($action == 'add') $rs = $wpdb->insert( $tabela, $dataForm);
    if($action == 'edit') $rs = $wpdb->update( $tabela, $dataForm, ['id' => $_POST['id']]);
    if($action == 'deletar') {
        $rs = $wpdb->delete( $tabela, ['id' => $_POST['id']]);
        $retorno['msg'] = 'Dados excluídos com sucesso!';
    }

    
    if($rs){
        
        $retorno['destino'] = 'reload';
    }else{
        $retorno['msg'] = 'Erro';
    }


    echo json_encode($retorno) ;
}

/*
function produto_meta_save( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;

    if( isset( $_POST[ 'form-produto' ] ) ) {
        update_post_meta( $post_id, 'texto', sanitize_textarea_field( nl2br($_POST[ 'texto' ]) ) );
        update_post_meta( $post_id, 'checkbox', sanitize_text_field( $_POST[ 'checkbox' ] ) );
        update_post_meta( $post_id, 'textfield', sanitize_text_field( $_POST[ 'textfield' ] ) );
        update_post_meta( $post_id, 'seletor', sanitize_text_field( $_POST[ 'seletor' ] ) );
    }

}
*/

?>