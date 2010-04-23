/* 
 * Clase Info
 *
 */

var Info = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode){
        
    };

    this.show = function(tag_id){
        if( working ) return false;
        working=true;

        var div = $('#'+tag_id);
        var data = div.data('info-slidedown-on');
        var divText, height, h;

        if( !data ){
            h = div.height();

            div.data('info-slidedown-on', true);
            div.data('info-height-div', h);
            div.css('height', h+"px");

            div.find('div.jq-intro').hide();
            divText = div.find('div.jq-complete').show();
            height = divText.innerHeight()+50;
        }else{
            div.data('info-slidedown-on', false);
            height = div.data('info-height-div');
        }

        div.animate({
            height : height+"px"
        }, 800, function(){
            working=false;
            div.find('a.link-moreinfo').html( !data ? 'Menos info' : 'M&aacute;s info');
            if( data ){
                div.find('div.jq-complete').hide();
                div.find('div.jq-intro').show();
            }
        });

        return false;
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var working=false;

    /* PRIVATE METHODS
     **************************************************************************/

})();
