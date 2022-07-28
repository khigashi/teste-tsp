jQuery(document).ready(function ($) {

    $(".seletor-simples").map(function() {
            
        let selecionado = $(this).data('select');
        if(selecionado) $(this).val(selecionado)
        
    });

    
    $(".seletor-radio").map(function() {
        
        let selecionado = $(this).data('select');
        if(selecionado) $(this).val(selecionado);
        if(!selecionado) return;

        $(this).find("[value=" + selecionado + "]").prop('checked', true);

        //$("input[name="+nome_radio+"][value=" + selecionado + "]").prop('checked', true);
        
    });
});