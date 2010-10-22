$(function(){
    //Esto es para el MENU
    $("#lavaLamp").lavaLamp({fx: "backout", speed: 700})

    //Esto es para el validador del Formulario de Contacto
    var o = $.extend({}, jQueryValidatorOptDef, {
        rules : {
            txtName      : 'required',
            txtPhoneNum  : 'required',
            txtConsult   : 'required',
            txtEmail     : {
                required : true,
                email    : true
            }
        },
        messages : {
            txtName : {
                required : 'El campo "Nombre" es obligatorio.'
            },
            txtPhoneNum : {
                required : 'El campo "Telefono" es obligatorio.'
            },
            txtEmail : {
                required : 'El campo "E-mail" es obligatorio.'
            },
            txtConsult : {
                required : 'El campo "Consulta" es obligatorio.'
            }
        },
        submitHandler : function(){
            var form = $('#form-contact');
            form.hide();
            $('#fc-send').show();
            $.post(form.attr('action'), form.serialize(), function(data){
                $('#fc-send').hide();
                $('#flipbox-fcontact').flip({
                    direction : 'lr',
                    content   : '<div class="fc-message" style="display:block;">'+(data=="true" ? '<p><img width="32" height="32" alt="" src="img/icon-success.png" style="position: relative; top: 8px; left: -5px;" /> El formulario ha sido enviado con &eacute;xito.</p>' : '<p><img width="32" height="32" alt="" src="img/icon-error.png" style="position: relative; top: 8px; left: -5px;" /> El formulario no ha podido ser enviado. Porfavor, intentelo nuevamente mas tarde o envienos un email a <a href="mailto:info@mydesign.com.ar">info@mydesign.com.ar</a>.</p>')+'</div>',
                    color     : 'transparent',
                    onEnd: function(){
                        $('#flipbox-fcontact').css('backgroundColor', 'transparent');
                    }
                });
            });
        },
        invalidHandler : function(){
        }
    });
    $('#form-contact').validate(o);

    //Define estos campos como numericos
    formatNumber.init('#txtPhoneCode, #txtPhoneNum');

    //Esto es para darle el efecto al banner
    if ($("#slider").length > 0) {
        $('#slider').cycle({
            fx: "fade",
            slideExpr: "img"
        });
    }

    //Ejecuta la galeria de imagen
    if( $('#gallery').length>0 ) $('#gallery').boutique();
});

var Chat = {
    open : function(){
        this.openWindow("./chat.html", {width:280, height:320, center:true, name: 'Chat Online'});
    },

    openWindow : function(anchor, options) {
        var args = '';

        if (typeof(options) == 'undefined') {var options = new Object();}
        if (typeof(options.name) == 'undefined') {options.name = 'win' + Math.round(Math.random()*100000);}

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

        if (typeof(options.scrollbars) != 'undefined') {args += "scrollbars=1,";}
        if (typeof(options.menubar) != 'undefined') {args += "menubar=1,";}
        if (typeof(options.locationbar) != 'undefined') {args += "location=1,";}
        if (typeof(options.resizable) != 'undefined') {args += "resizable=1,";}

        try{
            var win = window.open(anchor, '', args);
        }catch(e){
            var win = window.open(anchor, options.name, args);
        }
        return false;
    }
};
