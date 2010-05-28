
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
     var resto=0;
     var DEFAULT={
         selSlide : '',
         selArrowPrev : '',
         selArrowNext : '',
         controlNavHover    : false,
         controlNavAutoHide : true,
         controlNavHoverPrev : '',
         controlNavHoverNext : '',
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
        
        if( index>1 ){
            working=true;
            index--;
            resto-=slideWidth;
            move('+');
        }
        return false;
    };
    var next = function(e){
        e.preventDefault();
        if( working ) return false;

        if( (elem.slideparent.width()-resto) > elem.slideparent2.width() ){
            working=true;
            index++;
            resto+=slideWidth;
            move('-');
        }
        return false;
    };

    var move = function(sig){
        elem.slideparent.animate({
            left : sig+'='+slideWidth
        }, options.animSpeed, function(){
            setVisibleNav();
            working=false;
        });        
    };

    var setVisibleNav = function(){
        var condition = (elem.slideparent.width()-(resto)) <= elem.slideparent2.width();

        if( options.controlNavAutoHide ){
            elem.navPrev.show();
            elem.navNext.show();
            if( condition ) elem.navNext.hide();
            else if( index==1 ) elem.navPrev.hide();

        }else{
            eval(elem.navPrev.data('gallery-info').dataprev);
            eval(elem.navNext.data('gallery-info').dataprev);
            if( condition ) eval(elem.navNext.data('gallery-info').datanew);
            else if( index==1 ) eval(elem.navPrev.data('gallery-info').datanew);
        }
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
                        var t = $(this);
                        t.parent().find('.'+options.cssAjaxLoader).remove();
                        t.show();
                        t.attr('width', this.width);
                        t.attr('height', this.height);
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
    elem.slideparent = elem.slide.parent();
    elem.slideparent2 = elem.slide.parent().parent();
    elem.lastSlide = elem.slide.eq(elem.slide.length-1);
    slideCount = elem.slide.length;
    slideWidth = elem.slide.eq(0).innerWidth();

    elem.slideparent.css({
        width : (slideWidth*slideCount)+"px",
        position : 'relative'
    });
    
    elem.navPrev = $(options.selArrowPrev);
    elem.navNext = $(options.selArrowNext);

    if( options.controlNavAutoHide ) setHiddenNav();
    
    if( slideCount>1 ){
        if( elem.navPrev.find('a').length==1 ) elem.navPrev.find('a').bind('click', prev);
        else elem.navPrev.bind('click', prev);

        if( elem.navNext.find('a').length==1 ) elem.navNext.find('a').bind('click', next);
        else elem.navNext.bind('click', next);

        if( options.controlNavHover ) {
            elem.slideparent.hover(setVisibleNav, setHiddenNav);
            elem.navNext.hover(setVisibleNav, setHiddenNav);
            elem.navPrev.hover(setVisibleNav, setHiddenNav);

        }else {
            if( options.controlNavAutoHide ) elem.navNext.show();
            else{
                if( options.controlNavHoverPrev!='' && options.controlNavHoverNext!='' ){
                    var dataprev = '', datanew = '', data='', nav=['elem.navPrev', 'elem.navNext'];

                    // Sava data Button Prev
                    $(nav).each(function(){                        
                        eval("var obj = "+this);
                        if( obj.is('img') ) {
                            dataprev = this+".attr('src', '"+ obj.attr('src') +"')";
                            datanew  = this+".attr('src', '"+ ((this.indexOf('Prev')!=-1) ? options.controlNavHoverPrev :  options.controlNavHoverNext) +"')";

                        }else{
                            data = obj.find('img').attr('src');
                            
                            if( data ) {
                                dataprev = this+".find('img').attr('src', '"+ data +"')";
                                datanew  = this+".find('img').attr('src', '"+ ((this.indexOf('Prev')!=-1) ? options.controlNavHoverPrev :  options.controlNavHoverNext) +"')";
                            }else{
                                dataprev = this+".attr('class', '"+ obj.attr('class') +"')";
                                datanew  = this+".attr('class', '"+ ((this.indexOf('Prev')!=-1) ? options.controlNavHoverPrev :  options.controlNavHoverNext) +"')";
                            }
                        }
                        
                        obj.data('gallery-info', {
                            dataprev : dataprev,
                            datanew : datanew
                        });
                    });

                    eval(elem.navPrev.data('gallery-info').datanew);
                }
            }

        }
    }
    if( options.thumbs!=null ) showThumbs();


}
