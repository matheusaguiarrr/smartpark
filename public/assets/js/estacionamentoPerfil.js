$(document).ready(function() {
    $(document).on('click', '.btn-update-lg', function () { 
        console.log($(this).val());
        $.ajax({
            url : "../../src/controller/EstacionamentoController.php",
            type : 'post',
            data : {
                buscar: 'buscar'
            },
            beforeSend : function(){
                $("#nomeModal").val('Carregando...');
                $("#telefoneModal").val('Carregando...');
                $("#vagasModal").val('Carregando...');
                $("#cepModal").val('Carregando...');
                $("#estadoModal").val('Carregando...');
                $("#cidadeModal").val('Carregando...');
                $("#bairroModal").val('Carregando...');
                $("#ruaModal").val('Carregando...');
                $("#numeroModal").val('Carregando...');
                $("#complementoModal").val('Carregando...');
            },
            success : function(data){
                console.log(data);
                let estacionamento = JSON.parse(data);
                const { id, nome, telefone, vagas, cep, estado, cidade, bairro, rua, numero, complemento } = estacionamento;
                $("#idModal").val(id);
                $("#nomeModal").val(nome);
                $("#telefoneModal").val(telefone);
                $("#vagasModal").val(vagas);
                $("#cepModal").val(cep);
                $("#estadoModal").val(estado);
                $("#cidadeModal").val(cidade);
                $("#bairroModal").val(bairro);
                $("#ruaModal").val(rua);
                $("#numeroModal").val(numero);
                $("#complementoModal").val(complemento);
            }
        });

        // .done(function(msg){
        //     // $("#resultado").html(msg);
        //     console.log(msg);
        // })
        // .fail(function(jqXHR, textStatus, msg){
        //     alert(msg);
        // });
    })
})