$(document).ready(function() {
    $(document).on('click', '.btn-update-sm', function () { 
        console.log($(this).val());
        $.ajax({
            url : "../../src/controller/VeiculoController.php",
            type : 'post',
            data : {
                id: $(this).val(),
                buscar: 'buscar'
            },
            beforeSend : function(){
                $("#idModal").val('Carregando...');
                $("#motoristaModal").val('Carregando...');
                $("#corModal").val('Carregando...');
                $("#anoModal").val('Carregando...');
                $("#marcaModal").val('Carregando...');
                $("#modeloModal").val('Carregando...');
                $("#categoriaModal").val('Carregando...');
                $("#placaModal").val('Carregando...');
            },
            success : function(data){
                var veiculo = JSON.parse(data);
                const { id, motorista, cor, ano, marca, modelo, categoria, placa} = veiculo;
                $("#idModal").val(id);
                $("#motoristaModal").val(motorista);
                $("#corModal").val(cor);
                $("#anoModal").val(ano);
                $("#marcaModal").val(marca);
                $("#modeloModal").val(modelo);
                $("#categoriaModal").val(categoria);
                $("#placaModal").val(placa);
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