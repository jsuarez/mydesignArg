var Content=new(function(){

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
        a.html('<div class="align-center"><img src="img/ajax-loader.gif" alt="Cargando, espere porfavor..." width="100" height="100" /></div>');
    });

    /* PUBLIC METHODS
     **************************************************************************/
    this.show = function(id, dir){
        if( !_content ) return false;
        _flip(dir, function(){
            if( !_load ){
                $('<link rel="stylesheet" href="'+ get_url('load/css/plugins_jqueryboutique') +'" type="text/css" media="screen, projection" />').appendTo('head');
                _load=true;
            }
            $.get(get_url('index/ajax_moreinfo/'+id), '', function(data){
                $('#flipbox .middle').html(data);
                $.getScript(get_url('load/js/plugins_jqueryboutique'), function(){
                    $('#gallery').boutique();
                });
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

});
