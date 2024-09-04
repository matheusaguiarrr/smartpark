$('#cep').keyup(function (e) { 
    if ($('#cep').val().length == 8) {
        fetchCEP($('#cep').val());
    }
});

const fetchCEP = async (cepForm) => {
    const response = await fetch(`https://viacep.com.br/ws/${cepForm}/json/`);
    const data = await response.json();
    const {cep, uf, localidade, bairro, logradouro} = data;
    $('#cep').val(cep);
    $('#estado').val(uf);
    $('#cidade').val(localidade);
    $('#bairro').val(bairro);
    $('#rua').val(logradouro);
}