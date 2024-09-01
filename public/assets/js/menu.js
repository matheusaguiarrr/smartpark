window.onload = function() {
    let btn = document.getElementById("btn-menu");
    btn.addEventListener("click", esconderExibirMenu);
}

function esconderExibirMenu() {
    if ($('.menu-text').hasClass('invisible')) {
        $('.menu-text').removeClass('invisible');
        $('#btn-menu').find('i').removeClass('fa-chevron-right');
        $('#btn-menu').find('i').addClass('fa-chevron-left');
        $('#menu').css('width', '20vw');
        $('#conteudo').css('width', '80vw');
        $('#btn-menu').css('width', '15%');
    } else {
        $('.menu-text').addClass('invisible');
        $('#btn-menu').find('i').removeClass('fa-chevron-left');
        $('#btn-menu').find('i').addClass('fa-chevron-right');
        if($(window).width() <= 992 || $(window).width() <= 1200) {
            $('#menu').css('width', '8vw');
            $('#conteudo').css('width', '92vw');
            $('#btn-menu').css('width', '25%');
        }
        else {
            $('#menu').css('width', '6vw');
            $('#conteudo').css('width', '95vw');
            $('#btn-menu').css('width', '20%');
        }
    }
}