var FormInputMask = function () {

        var handleInputMasks = function () {

        $(".telefone").inputmask("(99) 99999-9999", {
            clearMaskOnLostFocus: true,
            autoUnmask: true,
            removeMaskOnSubmit: true,
        });

        $("#data_nascimento").inputmask('99/99/9999', {
            clearMaskOnLostFocus: true,
            autoUnmask: true,
            rightAlign: false
        });

        $("#cpf").inputmask('999.999.999-99', {
            clearMaskOnLostFocus: true,
            autoUnmask: true,
            rightAlign: false,
            removeMaskOnSubmit: true,
        });

        $("#cep").inputmask('99999-999', {
            clearMaskOnLostFocus: true,
            autoUnmask: true,
            rightAlign: false,
            removeMaskOnSubmit: true,
        });

        $("#cep").inputmask({removeMaskOnSubmit: true});
        $("#telefone").inputmask({removeMaskOnSubmit: true});
        $("#cpf").inputmask({removeMaskOnSubmit: true});
    };

    return {
        init: function () {
            handleInputMasks();
        }
    };
}();


$(document).ready(function () {

    // Inicializar máscaras
    FormInputMask.init();

    // Mudar processo seletivo
    $('#processo_seletivo').change(function () {

        var processoSeletivoTitulo = $(this).find('option:selected').val();

        if(processoSeletivoTitulo.length === 0) {
            swal("Ooops!", "Ocorreu um erro na alteração de processo seletivo, tente novamente!", "error");
        }

        if (processoSeletivoTitulo.length !== 0) {

            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                dataType: 'json',
                url: '/processo_seletivo/setar/sessao',
                data: '&processoSeletivoTitulo=' + processoSeletivoTitulo,
                success: function (retorno) {

                    if (retorno.message === 'success') {
                        swal("Bom trabalho!", "O processo seletivo foi alterado com sucesso!", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    }
                }
            })
        }
    });

    if ($("#cep").val() != '') {

        var cep = $('#cep').val();

        $.ajax({
            url: 'http://api.postmon.com.br/v1/cep/'+cep,
            type: 'GET',
            dataType: 'json',
            success: function(json){
                if (typeof json.estado != 'undefined') {
                    $('#cidade').val(json.cidade);
                    $('#logradouro').val(json.logradouro);
                    $('#bairro').val(json.bairro);
                    $('#estado').html('<option value="'+json.estado+'">'+json.estado+'</option>');
                }
            }
        })
    }

    $('#cep').blur(function() {

        var cep = $('#cep').val();

        $.ajax({
            url: 'http://api.postmon.com.br/v1/cep/'+cep,
            type: 'GET',
            dataType: 'json',
            success: function(json){
                if (typeof json.estado != 'undefined') {
                    $('#cidade').val(json.cidade);
                    $('#logradouro').val(json.logradouro);
                    $('#bairro').val(json.bairro);
                    $('#estado').val(json.estado);
                }
            }
        })
    });
});