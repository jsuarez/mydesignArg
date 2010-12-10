(function($){

    /*  CONSTRUCTOR
     **********************************************************************/
    $.fn.carousel = function(o) {
        _options = $.extend({
            speed    : 500,
            porcent  : 23,
            opacity  : 0.3,
            sel_button_prev : null,
            sel_button_next : null,
            sel_loader  : '.carousel-loader',
            class_thumb : 'carousel-thumb',
            onclick  : true,
            auto     : false,
            title_opacity : 0.5,
            interval : 3000  //3 seg
        }, o || {});

        return this.each(function() {
            _ul = $(this).css('position', 'relative');
            if( !_ul.is('ul') || _ul.find('li').length!=3 ) return false;

            var ulw=0;
            _li = _ul.find('li');
            
            _preload(function(){

                _li.each(function(i){
                    var l = $(this), img=l.find('img');
                    var restoW=0, restoH=0, opct = 0;

                    if( i==0||i==2 ){
                        restoW = img.innerWidth()*_options.porcent / 100, restoH = img.innerHeight()*_options.porcent / 100;
                    }

                    _data[i]={
                        w : i==0||i==2 ? img.innerWidth() - (restoW) : img.innerWidth(),
                        h : i==0||i==2 ? img.innerHeight() - (restoH) : img.innerHeight(),
                        restoW : restoW,
                        restoH : restoH
                    };

                    img.css({
                        width   : '100%',
                        height  : '100%'
                    });

                    l.css({
                        'float'   : 'left',
                        'z-index' : 1000,
                        width : _data[i].w,
                        height : _data[i].h
                    });

                    if( i!=1 ) {
                        l.css({
                            'z-index' : 1,
                            'opacity' : _options.opacity
                        });
                    }else l.css('background-color', 'transparent');

                    if( !$.browser.msie ) l.css('background-color', 'transparent');

                    l.addClass(_options.class_thumb+(i+1));
                    ulw+= l.innerWidth() +1 - (_data[i].restoW*2);
                });

                _ul.css('width', ulw+'px');

                var left = _middle(ulw, _data[1].w);
                _data[0].left = left - _data[0].w + (_data[0].restoW*2);
                _data[0].top = _middle(_data[1].h, _data[0].h);
                _data[1].left = left;
                _data[1].top = 0;
                _data[2].left = left + _li.eq(1).innerWidth() - (_data[2].restoW*2);
                _data[2].top = _middle(_data[1].h, _data[2].h);


                _li.css('position', 'absolute');
                _li.eq(0).css({
                    left     : _data[0].left,
                    top      : _data[0].top
                });
                _li.eq(1).css({
                    left     : _data[1].left,
                    top      : _data[1].top
                });
                _li.eq(2).css({
                    left     : _data[2].left,
                    top      : _data[2].top
                });

                var a = _li.eq(1).find('img').attr('alt');
                if( a!='' ) _div_title = $('<div class="carousel-title">'+a+'</div>').text(a).css('opacity', _options.title_opacity).appendTo(_li.eq(1));

                if( $.browser.msie ){
                    $(_options.sel_button_prev).css({backgroundColor:'#fff', opacity:0});
                    $(_options.sel_button_next).css({backgroundColor:'#fff', opacity:0});
                }

                _set_events();

                if( _options.auto ){
                    setInterval(_next, _options.interval);
                }

                if( $.browser.msie ) _bg = _li.eq(0).css('background-color');
            });

        });


    };
    
    /*  PRIVATE PROPERTIES
     **********************************************************************/
    var _data=[];
    var _li, _ul;
    var _options={}, _buttons={};
    var _div_title=false;
    var _bg='';


    /*  PRIVATE FUNCTIONS
     **********************************************************************/
    var _middle = function(a,b){
        return a/2 - b/2;
    };

    var _prev = function(e){
        _li.stop();

        _li.eq(2).css('z-index', 1).animate({
            left    : _data[0].left,
            top     : _data[0].top,
            width   : _data[0].w,
            height  : _data[0].h,
            opacity : _options.opacity
        }, _options.speed);

        var map={
            left    : _data[2].left,
            top     : _data[2].top,
            width   : _data[2].w,
            height  : _data[2].h,
            opacity : _options.opacity
        };
        if( $.browser.msie ) map.backgroundColor =_bg;
        _li.eq(1).css('z-index', 1).animate(map, _options.speed);
        
        if( _div_title ) _div_title.hide();
        _li.eq(0).css('z-index', 1000).animate({
            left    : _data[1].left,
            top     : _data[1].top,
            width   : _data[1].w,
            height  : _data[1].h,
            opacity : 1
        }, _options.speed, function(){
            var t = $(this);
            if( $.browser.msie ) t.css({'background-color':'transparent', 'opacity':''});
            if( _div_title ) _div_title.text(t.find('img').attr('alt')).appendTo(t).show();
        });

        _li.eq(2).insertBefore(_li.eq(0));
        _li.eq(2).removeClass(_options.class_thumb+'3').addClass(_options.class_thumb+'1');

        _reset();
        _set_events();
    };

    var _next = function(e){
        _li.stop();
        
        _li.eq(0).css('z-index', 1).animate({
            left    : _data[2].left,
            top     : _data[2].top,
            width   : _data[2].w,
            height  : _data[2].h,
            opacity : _options.opacity
        }, _options.speed);

        var map={
            left    : _data[0].left,
            top     : _data[0].top,
            width   : _data[0].w,
            height  : _data[0].h,
            opacity : _options.opacity
        };
        if( $.browser.msie ) map.backgroundColor =_bg;
        _li.eq(1).css('z-index', 1).animate(map, _options.speed);

        if( _div_title ) _div_title.hide();
        _li.eq(2).css('z-index', 1000).animate({
            left    : _data[1].left,
            top     : _data[1].top,
            width   : _data[1].w,
            height  : _data[1].h,
            opacity : 1
        }, _options.speed, function(){
            var t = $(this);
            if( $.browser.msie ) t.css({'background-color':'transparent', 'opacity':''});
            if( _div_title ) _div_title.text(t.find('img').attr('alt')).appendTo(t).show();
        });

        _li.eq(0).insertAfter(_li.eq(1));
        _li.eq(0).insertAfter(_li.eq(2));

        _reset();
        _set_events();
    };

    var _set_events = function(){
        if( _options.onclick ){
            var img = _li.find('img');
            img.unbind('click');
            img.eq(0).one('click', _prev);
            img.eq(2).one('click', _next);
        }
        _buttons.prev = $(_options.sel_button_prev).unbind('click').bind('click', _prev);
        _buttons.next = $(_options.sel_button_next).unbind('click').bind('click', _next);
    };

    var _reset = function(){
        _li = _ul.find('li').each(function(i){
            $(this).attr('class', _options.class_thumb+(i+1));
        });
        _buttons.prev.appendTo(_li.eq(1));
        _buttons.next.appendTo(_li.eq(1));
    };

    var _preload = function(callback){
        var arr = [];
        _li.find('img').each(function(){
            var img = new Image();
            $(img).attr('src', $(this).attr('src'));
            arr.push(img);
        });
        var t = setInterval(function(){
            if( arr[0].complete && arr[1].complete && arr[2].complete ){
                clearInterval(t);
                $(_options.sel_loader).hide();
                callback();
            }
        }, 50);
    };

})(jQuery);