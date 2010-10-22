function MessageShowHide(parent, status, t){
    if( status && status!='' ){
        if( !t ) t=5000;
        if( status!='' ){
            var div = $(parent).find(status=="success" ? "div.success" : "div.error");
            if( div.is(':visible') ){
                setTimeout(function(){
                    div.slideUp('slow');
                }, t);
            }else{
                div.slideDown('slow', function(){
                    setTimeout(function(){
                        div.slideUp('slow');
                    }, t);
                });
            }
        }
    }
}

function ShowHide(sel){
    var div = $($(sel).attr('href'));
    if( div.is(':hidden') ) div.stop().slideDown('slow');
    else div.stop().slideUp('slow');
}

function get_url(url){return baseURI+url+url_suffix}