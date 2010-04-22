/* 
 * Clase Contact
 *
 */

var Contact = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode){
        $.validator.setting('#formContact .validate', {
            effect_show     : 'slidefade',
            validateOne     : true
        });
        $('#formContact input[name=txtName], #formContact textarea[name=txtConsult]').validator({
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
        working=true;
        
        $.validator.validate('#formContact .validate', function(error){
             if( !error ){
                 $('#si-mask, #si-ajaxloader').show();
                 
                 $.post(baseURI+'index.php/index/ajax_sendform', $('#formContact').serialize(), function(data){
                     $('#formContact').hide();
                     if( data=="ok" ){
                         $('#si-msg, #si-msg .si-success').show();
                         
                     }else{
                         $('#si-msg, #si-msg .si-error').show();                         
                     }
                      $('#si-mask, #si-ajaxloader').hide();
                 });


             }else working=false;
         });

         return false;
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var working=false;

    /* PRIVATE METHODS
     **************************************************************************/
     var ajaxloader = {
         show : function(){
         }
     }

})();