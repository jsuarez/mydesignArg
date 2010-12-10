var Services=new(function(){

    /* PRIVATE PROPERTIES
     **************************************************************************/
    var _content=false;
    var _content_revert="";
    var _load=false;

    /* CONSTRUCTOR
     **************************************************************************/
    $(document).ready(function(){
        _content = $('<div>'+$('#flipbox').html()+'</div>');
        var a = _content.find('>.middle');
        _content_revert = a.html();
        a.html('<div class="align-center"><img src="public/img/ajax-loader.gif" alt="Cargando, espere porfavor..." width="100" height="100" /></div>');

        if( $('#carousel').length>0 ) _exec_carousel();
    });

    /* PUBLIC METHODS
     **************************************************************************/
    this.show = function(id, dir){
        if( !_content ) return false;
        _flip(dir, function(){
            $.get(get_url('ajax/moreinfo/'+id), '', function(data){
                $('#flipbox .middle').html(data);
                _exec_carousel();
            });
        });
        return false;
    };

    this.revert = function(ref){
        _flip('rl', function(){
            $('#flipbox .middle').html(_content_revert);
        });
    };

    /* PRIVATE METHODS
     **************************************************************************/
    var _flip = function(dir, callback){
        $("#flipbox").flip({
            direction : dir,
            content   : _content.html(),
            color     : '#D5ECF1',
            bgColor   : '#DDEFF4',
            onEnd: function(){
                callback();
                $("#flipbox").css('backgroundColor', 'transparent');
            }
        });
    };

    var _exec_carousel = function(){
        $('#carousel').carousel({
            speed           : 800,
            sel_button_prev : 'div.carousel-prev',
            sel_button_next : 'div.carousel-next'
        });
    };

});
