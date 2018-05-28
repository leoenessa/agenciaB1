$(".top-navigation #menu-principal-mobile-btn").click(function(){
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

function b1slideshow(indice_slide,case_target){
    var i;
    var slides = $("."+case_target+" .slides .slide-img");
    for(i=0; i<slides.length; i++){
        slides[i].style.display = "none";
    }

    slides[indice_slide-1].style.display = "block";
}