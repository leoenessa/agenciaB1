$(".top-navigation #menu-principal-mobile-btn").click(function(){
    console.log("APERTOU");
    var botao =  $(this);
    var menu = $(".menu-principal-mobile");
    
    if(botao.attr("data-aberto") == 0){
        console.log('0');
        botao.attr("data-aberto",'1');
        botao.removeClass('fa-bars');
        menu.removeClass('menu-invisivel');
        botao.addClass('fa-times');
        menu.addClass('menu-visivel');
    }
    else if(botao.attr('data-aberto') == 1){
        console.log('1');
        botao.attr("data-aberto",'0');
        botao.removeClass('fa-times');
        menu.removeClass('menu-visivel');
        botao.addClass('fa-bars');  
        menu.addClass('menu-invisivel');
    }
  
});
                    