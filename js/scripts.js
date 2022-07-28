

jQuery(document).ready(function() {



    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#endereco .rua").text("");
        $("#endereco .bairro").text("");
        $("#endereco .cidade").text("");
        $("#endereco .uf").text("");
        $("#endereco .logradouro").text("");
    }
    
    //Quando o campo cep perde o foco.
    jQuery("#buscar-cep").click(function(e) {
    
        e.preventDefault();
    
        var cep = jQuery("#cep").val().replace(/\D/g, '');
        
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
    
                //Preenche os campos com "..." enquanto consulta webservice.
                jQuery("#endereco .rua").text("...");
                jQuery("#endereco .bairro").text("...");
                jQuery("#endereco .cidade").text("...");
                jQuery("#endereco .uf").text("...");
                jQuery("#endereco .logradouro").text("...");
    
                //Consulta o webservice viacep.com.br/
                jQuery.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
    
                        console.log(dados);
                        if (!("erro" in dados)) {
    
                            //let logradouro = dados.logradouro.split(" ")[0];
    
                            //Atualiza os campos com os valores da consulta.
                            jQuery("#endereco .logradouro").text(dados.logradouro);
                            jQuery("#endereco .cidade").text(dados.localidade);
                            jQuery("#endereco .uf").text(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

