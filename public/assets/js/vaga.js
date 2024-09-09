$(document).ready(function() {
    $(document).on('click', '.btn-vaga-update', function () {
        $.ajax({
            url : "../../src/controller/VagaController.php",
            type : 'post',
            data : {
                id: $(this).val(),
                buscar: 'buscar'
            },
            beforeSend : function(){
                $("#idModal").val('Carregando...');
                $("#identificadorModal").val('Carregando...');
                $("#statusModal").val('Carregando...');
            },
            success : function(data){
                var vaga = JSON.parse(data);
                const { id, identificador, status } = vaga;
                $("#idModal").val(id);
                $("#identificadorModal").val(identificador);
                $("#statusModal").val(status);
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