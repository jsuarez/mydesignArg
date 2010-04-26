
var ClassGallery = function(options){

    /* PUBLIC METHODS
     **************************************************************************/
   

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var working=false;
     var elem={};
     var index=1;
     var slideWidth=0;
     var slideCount = 0;
     var DEFAULT={
         selSlide : '',
         selArrowPrev : '',
         selArrowNext : '',
         controlNavHover : false,
         animSpeed : 500,
         thumbs : null,  //json
         thumbsContainer : '',
         thumbsClassName : '',
         thumbsBySlide   : 4,
         cssAjaxLoader   : ''
     };

    /* PRIVATE METHODS
     **************************************************************************/
    var prev = function(e){
        e.preventDefault();
        if( working ) return false;
        working=true;

        index--;
        move('+');
        return false;
    };
    var next = function(e){
        e.preventDefault();
        if( working ) return false;
        working=true;
        
        index++;
        move('-');
        return false;
    };

    var move = function(sig){
        elem.slideFirst.animate({
            marginLeft : sig+'='+slideWidth
        }, options.animSpeed, function(){
            setVisibleNav();
            working=false;
        });        
    };

    var setVisibleNav = function(){
        elem.navPrev.show();
        elem.navNext.show();
        if( index==slideCount ) elem.navNext.hide();
        if( index==1 ) elem.navPrev.hide();
    };

    var setHiddenNav = function(){
        elem.navPrev.hide();
        elem.navNext.hide();
    };

    var showThumbs = function(){
        var thumbs = eval(options.thumbs);

        if( thumbs.length>0 ){
            var n=1, m=0;
            var slide, contThumbs;
            
            $(thumbs).each(function(i){
                if( n==1 ){
                    slide = elem.slide.eq(m);
                    contThumbs = slide.find(options.thumbsContainer);
                    m++;
                }

                if( slide.length>0 ){
                    var img = new Image();
                    img = $(img).hide();
                    var div = $('<div class="'+options.cssAjaxLoader+'" />');
                    contThumbs.eq(n-1).append(div, img);

                    img.load(function(){
                        $(this).parent().find('.'+options.cssAjaxLoader).remove();
                        $(this).show();
                    });

                    if( this.alt ) img.attr('alt', this.alt);
                    if( this.title ) img.attr('title', this.title);
                    img.addClass(options.thumbsClassName);
                    img.attr('src', this.src);
                }

                n++;
                if( n>options.thumbsBySlide ) n=1;
            });
        }
    };



    /* CONSTRUCTOR
     **************************************************************************/
    options = $.extend({}, DEFAULT, {}, options);

    elem.slide = $(options.selSlide);
    elem.slideFirst = elem.slide.eq(0);
    slideCount = elem.slide.length;
    slideWidth = elem.slideFirst.innerWidth();

    elem.slideFirst.parent().css({
        width : (slideWidth*slideCount)+"px",
        position : 'relative'
    });

    elem.navPrev = $(options.selArrowPrev);
    elem.navNext = $(options.selArrowNext);

    setHiddenNav();
    
    if( slideCount>1 ){
        if( elem.navPrev.find('a').length==1 ) elem.navPrev.find('a').bind('click', prev);
        else elem.navPrev.bind('click', prev);

        if( elem.navNext.find('a').length==1 ) elem.navNext.find('a').bind('click', next);
        else elem.navNext.bind('click', next);

        if( options.controlNavHover ) {
            elem.slideFirst.parent().hover(setVisibleNav, setHiddenNav);
            elem.navNext.hover(setVisibleNav, setHiddenNav);
            elem.navPrev.hover(setVisibleNav, setHiddenNav);

        }else elem.navNext.show();
    }
    if( options.thumbs!=null ) showThumbs();


}
