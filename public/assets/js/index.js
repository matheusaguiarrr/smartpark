$(document).ready(function() {
    $(document).on('click', '.btn-register-sm', function () {
        $("#idModal").val($(this).val());
    });
    $("#motorista").change(function() {
        console.log($(this).val());
        $.ajax({
            url : "../../src/controller/IndexController.php",
            type : 'post',
            data : {
                id: $(this).val(),
                buscar: 'buscar'
            },
            beforeSend : function(){
                $("#veiculo").append('<option value="" select>Carregando...</option>');
            },
            success : function(data){
                var veiculos = JSON.parse(data);
                if ($("#message").css("display") !== "none") {
                    $("#message").hide();
                }
                if ($("#veiculos").css("display") !== "none") {
                    $("#veiculos").hide();
                }
                if ($("#veiculo option").length > 1) {
                    $("#veiculo").empty().append('<option value="">------</option>');
                }
                if(veiculos.message){
                    $("#message").show();
                    $("#message").html(veiculos.message);
                    console.log(veiculos.message);
                }
                else {
                    $("#veiculos").show();
                    for (let i = 0; i < veiculos.length; i++) {
                        const veiculo = veiculos[i];
                        $("#veiculo").append(`<option value="${veiculo.id}">${veiculo.modelo}</option>`);
                        console.log(veiculo);
                    }
                }
            }
        });
    });
});