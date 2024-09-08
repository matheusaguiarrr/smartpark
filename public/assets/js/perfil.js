$(document).ready(function() {
    $(document).on('click', '.btn-update-lg', function () { 
        console.log($(this).val());
        $.ajax({
            url : "../../src/controller/PerfilController.php",
            type : 'post',
            data : {
                id: $(this).val(),
                buscar: 'buscar'
            },
            beforeSend : function(){
                $("#nomeModal").val('Carregando...');
                $("#telefoneModal").val('Carregando...');
            },
            success : function(data){
                let usuario = JSON.parse(data);
                $("#idModal").val(usuario.id);
                $("#nomeModal").val(usuario.nome);
                $("#telefoneModal").val(usuario.telefone);
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