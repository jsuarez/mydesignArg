// VALORES POR DEFECTO
var jQueryValidatorOptDef = {
    errorPlacement: function(error, element) {
        var left = -170, top=0;
        if( error.text().indexOf('Por favor, escribe')!=-1 ) left = -237;

        if( $.browser.msie && $.browser.version<7 ){
            top = element.attr('id')=="txtConsult" ? element.offset().top-180 : element.offset().top-193;
        }else{
            top = element.attr('id')=="txtConsult" ? element.offset().top-145 : element.offset().top-160;
        }

        var h =$('<div></div>').append(error).html();
        var div = $('<div><div class="valid-msgleft"></div><div class="valid-msgmiddle">'+h+'</div><div class="valid-msgright"></div></div>');
        div.css({
            position : 'absolute',
            left : left,
            top  : top
        });
        element.parent().append(div);

    },
    highlight : function(element){
        element = $(element);
        var d = element.parent().find('div').show();
        if( element.attr('id')=="txtEmail" ){
            var m = d.find('label.valid-error2').text();
            var left1=-237, left2=-170;
            if( $.browser.msie && $.browser.version<7 ){
                left1 = -190;
                left2 = -100;
            }
            if( m.indexOf('Por favor, escribe')!=-1 ) d.css('left', left1+'px');
            else if( m.indexOf('El campo')!=-1 ) d.css('left', left2+'px');
        }

        element.removeClass('valid-unhighlight').addClass('valid-highlight');
    },

    unhighlight : function(element){
        element = $(element);
        element.parent().find('div').hide();
        element.removeClass('valid-highlight').addClass('valid-unhighlight');
    },
    onfocusout: false
};

// NUEVOS METODOS
jQuery.validator.addMethod("password", function(value, element, param) {
    if( value.length>0 && param ){
        eval('var RegExPattern = new RegExp(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{'+ 8 +','+ 10 +'})$/);');
        return value.match(RegExPattern);
    }
}, "El password debe tener entre 8 y 10 caracteres, por lo menos un dígito y un alfanumérico, y no puede contener caracteres espaciales.");

jQuery.validator.addMethod("tinymce_required", function(value, element, param) {
    return tinyMCE.get(element.id).getContent().length>0;

}, "Este campo es obligatorio.");
