// VALORES POR DEFECTO
var jQueryValidatorOptDef = {
    errorPlacement: function(error, element) {
        var a=$('#txtPhoneCode');
        var left = -190;
        var top = element.attr('id')=="txtConsult" ? element.offset().top-145 : element.offset().top-160;
        error.css({
            position : 'absolute',
            left : left,
            top  : top
        })
        element.parent().append(error);
    },
    highlight : function(element){
        $(element).removeClass('valid-unhighlight').addClass('valid-highlight');
    },
    unhighlight : function(element){
        $(element).removeClass('valid-highlight').addClass('valid-unhighlight');
    },
    errorClass : 'valid-error',
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
