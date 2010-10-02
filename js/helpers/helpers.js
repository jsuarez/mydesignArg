jQuery.fn.extend({
    ucFirst : function(){
        return this.each(function(){
            if( this.value ){
                this.value = this.value.substr(0,1).toUpperCase()+this.value.substr(1,this.value.length).toLowerCase();
            }
        });
    },

    ucTitle : function(){
        return this.each(function(){
            if( this.value ){
                if( this.value.length>0 ){
                    var arr = this.value.split(" ");
                    var t = this;
                    this.value="";
                    $(arr).each(function(){
                        t.value+= this.substr(0,1).toUpperCase()+this.substr(1,this.length).toLowerCase()+" ";
                    });
                    t.value = t.value.substr(0, t.value.length-1);
                }
            }
        });
    },

    ucLower : function(){
        return this.each(function(){
            if( this.value ){
                this.value = this.value.toLowerCase();
            }
        });
    },

    ucUpper : function(){
        return this.each(function(){
            if( this.value ){
                this.value = this.value.toUpperCase();
            }
        });
    },
    
    convertDate : function(){
        return this.each(function(){
            if( this.value ){
                this.value = this.value.replace(/^(\d{2})\/(\d{2})\/(\d{4})$/, "$2/$1/$3");
            }
        });
        
    },

    formatURL : function(){
        return this.each(function(){
            if( this.value ){
                this.value = this.value.toLowerCase();
                if( this.value.substr(0,7)!="http://" ){
                    this.value = "http://"+this.value.toLowerCase();
                }
            }
        });
    },

    setOptionOther : function(){
        return this.each(function(){
            var t = $(this);
            if( t.is('select') ){
                t.bind('change', function(){
                    if( this.value.toLowerCase() == "otro" ){
                        $(this).next('input').fadeIn('slow').focus();
                    }else{
                        $(this).next('input').fadeOut('slow').val('');
                    }
                });
            }
        });
    }
    
});

jQuery.fn.outerHTML = function(s) {
    return (s) ? this.before(s).remove() : jQuery("<p>").append(this.eq(0).clone()).html();
};

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

function openPopup(anchor, options) {
    var args = '';

    if (typeof(options) == 'undefined') { var options = new Object(); }
    if (typeof(options.name) == 'undefined') { options.name = 'win' + Math.round(Math.random()*100000); }

    if (typeof(options.height) != 'undefined' && typeof(options.fullscreen) == 'undefined') {
        args += "height=" + options.height + ",";
    }

    if (typeof(options.width) != 'undefined' && typeof(options.fullscreen) == 'undefined') {
        args += "width=" + options.width + ",";
    }

    if (typeof(options.fullscreen) != 'undefined') {
        args += "width=" + screen.availWidth + ",";
        args += "height=" + screen.availHeight + ",";
    }

    if (typeof(options.center) == 'undefined') {
        options.x = 0;
        options.y = 0;
        args += "screenx=" + options.x + ",";
        args += "screeny=" + options.y + ",";
        args += "left=" + options.x + ",";
        args += "top=" + options.y + ",";
    }

    if (typeof(options.center) != 'undefined' && typeof(options.fullscreen) == 'undefined') {
        options.y=Math.floor((screen.availHeight-(options.height || screen.height))/2)-(screen.height-screen.availHeight);
        options.x=Math.floor((screen.availWidth-(options.width || screen.width))/2)-(screen.width-screen.availWidth);
        args += "screenx=" + options.x + ",";
        args += "screeny=" + options.y + ",";
        args += "left=" + options.x + ",";
        args += "top=" + options.y + ",";
    }

    if (typeof(options.scrollbars) != 'undefined') { args += "scrollbars=1,"; }
    if (typeof(options.menubar) != 'undefined') { args += "menubar=1,"; }
    if (typeof(options.locationbar) != 'undefined') { args += "location=1,"; }
    if (typeof(options.resizable) != 'undefined') { args += "resizable=1,"; }

    try{
        var win = window.open(anchor, '', args);
    }catch(e){
        var win = window.open(anchor, options.name, args);
    }
    return false;
}

function get_data(arr){
    var names = [], id = [];

    arr.each(function(i){
        id.push(this.value);
        names.push($(this).parent().parent().find('.link-title').text());
    });

    return {
        id    : id,
        names : names
    }
}