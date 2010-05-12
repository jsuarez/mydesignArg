/* 
 * Clase Portfolio
 *
 */

var Portfolio = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(json){
        var Gallery1 = new ClassGallery({
            selSlide      : '#gallery-clientes .slide',
            selArrowPrev  : '#gallery-clientes .jq-prev',
            selArrowNext  : '#gallery-clientes .jq-next',
            controlNavAutoHide : false,
            controlNavHoverPrev : 'images/arrow_left_disabled.png',
            controlNavHoverNext : 'images/arrow_right_disabled.png'
        });
        var Gallery2 = new ClassGallery({
            selSlide      : '#gallery-portfolio .slide',
            selArrowPrev  : '#nav-prev',
            selArrowNext  : '#nav-next',
            thumbs          : json,
            thumbsContainer : '.frame',
            thumbsClassName : 'image',
            thumbsBySlide   : 4,
            cssAjaxLoader   : 'portfolio-ajaxloader',
            controlNavAutoHide : false,
            controlNavHoverPrev : 'images/arrow_previous_disabled.png',
            controlNavHoverNext : 'images/arrow_next_disabled.png'

        });

        $('#gallery-clientes .jq-prev').hover(hover_in, hover_out);
        $('#gallery-clientes .jq-next').hover(hover_in, hover_out);

        $('#nav-prev').hover(hover_in, hover_out);
        $('#nav-next').hover(hover_in, hover_out);
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var hover_in = function(){
        var img = $(this).find('img');
        var src = img.attr('src');
        $(this).data('srcprev', src);

        if( src.indexOf('disabled')==-1 && src.indexOf('over')==-1 ){
            img.attr('src', src.substr(0, src.length-4)+"_over.png");
        }
    };

    var hover_out = function(){
        var img = $(this).find('img');
        var src = img.attr('src');
        
        if( src.indexOf('disabled')==-1 ){
            img.attr('src', $(this).data('srcprev'));
        }
    };


    /* PRIVATE METHODS
     **************************************************************************/

})();
