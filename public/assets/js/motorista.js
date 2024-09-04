$(document).ready(function() {
    $(document).on('click', '.editar', function () { 
        console.log($(this).val());
        $.ajax({
            url : "../../src/controller/MotoristaController.php",
            type : 'post',
            data : {
                id: $(this).val(),
                buscar: 'buscar'
            },
            beforeSend : function(){
                $("#nomeModal").val('Carregando...');
                $("#cpfModal").val('Carregando...');
                $("#telefoneModal").val('Carregando...');
            },
            success : function(data){
                let motorista = JSON.parse(data);
                $("#idModal").val(motorista.id);
                $("#nomeModal").val(motorista.nome);
                $("#cpfModal").val(motorista.cpf);
                $("#telefoneModal").val(motorista.telefone);
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