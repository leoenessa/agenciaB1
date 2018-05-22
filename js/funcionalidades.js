$('.btn-busca-produto').on('click',function(){
    $('.busca-produto').show(1000);
});

/* Botao retornar para o topo  */

var voltaTopo = function(){
    if($(window).scrollTop()>500){
        $("#botao-topo").show(1000);
    }
    else{
        $("#botao-topo").hide(1000);
    }
};

$(window).on('scroll',function(){
    voltaTopo();
    console.log("Chamou voltatopo");
})

/* Retorna bara o topo apos clicar no botao-topo */
$('#botao-topo').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
});
