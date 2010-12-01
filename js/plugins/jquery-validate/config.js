// VALORES POR DEFECTO
var jQueryValidatorOptDef = {
    errorPlacement: function(error, element) {
        var div = $('<div class="fright"><div class="valid-msgleft"></div><div class="valid-msgmiddle">'+$('<div></div>').append(error).html()+'</div><div class="valid-msgright"></div></div>');
        element.parent().find('.cont-msgerror').append(div);
    },
    highlight : function(element){
        element = $(element);
        element.parent().find('.cont-msgerror').show();
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
