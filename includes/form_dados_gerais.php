<style>

.area-field{
    margin: 0 18px 12px 0;

}

.area-field input{ width: 100%;}

</style>

<div  class="postbox-container total dados_gerais">
    <div id="" class="postbox ">
        <div class="inside">
            
            <div class='linha'>
                <h3 class="azul">Dados de endereço</h3>
                    
            </div>  

            <div class='linha '>
                <div class='area-field '>
                    <label>CEP:</label>
                    <input style="width: 150px;" type="text" id="cep" name ="cep" value="<?php echo get_option('cep') ?>" />
                    <button id="buscar-cep" class="button button-secondary" >Buscar</button>
                </div>
            </div>
     
            <style>
                .box-endereco{
                    padding: 3px 15px;
                    border: 1px solid #ddd;
                    max-width: 350px;
                    margin-top: 20px;
                    border-radius: 4px;
                }
                .box-endereco span{
                    font-style: italic;
                    color: #135e96;
                }
            </style>

            <div id="endereco" class='linha box-endereco'>
                <ul>
                    <li>
                        <strong>Logradouro: </strong> 
                        <span class="logradouro"></span>
                        <input class="logradouro" type="hidden" name="logradouro">
                    </li>
                    <li>
                        <strong>Cidade:</strong>
                        <span class="cidade"></span>
                        <input class="cidade" type="hidden" name="cidade">
                    </li>
                    <li>
                        <strong>Estado: </strong>
                        <span class="uf"></span>
                        <input class="uf" type="hidden" name="uf">
                    </li>
                </ul
                >
            </div> 

        </div>
    </div>
</div>

<script>



jQuery(document).ready(function() {


    buscaCEP(jQuery("#cep").val());

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#endereco .rua").text("").val("");
        $("#endereco .uf").text("").val("");
        $("#endereco .logradouro").text("").val("");
    }

    jQuery("#buscar-cep").click(function(e) {

        e.preventDefault();

        var cep = jQuery("#cep").val();
        buscaCEP(cep)
        
    });

    function buscaCEP(cep){

        var cep = jQuery("#cep").val().replace(/\D/g, '');
    
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {

                jQuery("#endereco .rua").text("...").val('');
                jQuery("#endereco .bairro").text("...").val('');
                jQuery("#endereco .cidade").text("...").val('');
                jQuery("#endereco .uf").text("...").val('');
                jQuery("#endereco .logradouro").text("...").val('');

                jQuery.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        jQuery("#endereco .logradouro").text(dados.logradouro).val(dados.logradouro);
                        jQuery("#endereco .cidade").text(dados.localidade).val(dados.localidade);
                        jQuery("#endereco .uf").text(dados.uf).val(dados.uf);
                    } else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            limpa_formulário_cep();
        }
    }

});

</script>













