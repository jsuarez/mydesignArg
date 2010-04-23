var Chat = {
    open : function(){
        this.openWindow(baseURI+"chat", {width:280, height:320, center:true, name: 'Chat Online'});
    },

    openWindow : function(anchor, options) {
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
}