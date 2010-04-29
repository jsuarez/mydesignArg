/* 
 * Clase Contact
 *
 */

var Contact = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        $.validator.setting('#formContact .validate', {
            effect_show     : 'slidefade',
            validateOne     : true
        });
        $('#formContact input[name=txtName], #formContact textarea[name=txtConsult], #formContact input[name=txtCaptcha]').validator({
            v_required  : true
        });
        $('#formContact input[name=txtEmail]').validator({
            v_required  : true,
            v_email     : true
        });
        $('#si-mask').css('opacity', '0.5');
    };

    this.send = function(){
        if( working ) return false;

        ajaxloader.show();

        $.validator.validate('#formContact .validate', function(error){
             if( !error ){
                 $.post(baseURI+'index.php/index/ajax_sendform', $('#formContact').serialize(), function(data){
                    ajaxloader.hidden();

                     if( data=="ok" ){
                         $('#formContact').hide();
                         $('#si-msg, #si-msg .si-success').show();

                     }else if( data=="errorcaptcha" ){
                        $.validator.show($('#txtCaptcha'),{
                            message : 'El c&oacute;digo ingresado es incorrecto.'
                        });

                     }else if( data=="errormail" ){
                         $('#formContact').hide();
                         $('#si-msg, #si-msg .si-error').show();

                     }else{
                         alert("ERROR:\n"+data);
                     }
                });

             }else ajaxloader.hidden();
         });

         return false;
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var working=false;

    /* PRIVATE METHODS
     **************************************************************************/
    var ajaxloader={
        show : function(){
            working=true;
            $('#si-mask, #si-ajaxloader').show();
        },
        hidden : function(){
            working=false;
            $('#si-mask, #si-ajaxloader').hide();
        }
    };


})();
