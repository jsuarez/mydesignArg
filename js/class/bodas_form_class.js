var Bodas = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode_edit){
        _mode_edit = mode_edit;

        var rules = {
            txtNombreNovio : 'required',
            txtNombreNovia : 'required',
            txtApellidoNovio : 'required',
            txtApellidoNovia : 'required',
            txtUbiSalon : 'required',
            txtUbiIglesia : 'required',
            txtNombreIglesia : 'required',
            txtNombreSalon : 'required',
            txtHistNovia : 'required',
            txtHistNovio : 'required',
            txtHistNovios : 'required',
            lstMenu : {
                required_list : true
            },
            txtUsuario : {
                required: true,
                remote : {
                   url  : baseURI+'paneladmin/bodas/ajax_check_exists/',
                   type : "post",
                   data : {bodas_id : $('#bodas_id').val()}
                }
            },
            txtPass : 'required'
        };

        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : rules,
            submitHandler : _on_submit,
            invalidHandler : function(){
                _Loader.hide('#form1');
            },
            errorPlacement: function(error, element) {
                element.parent().append(error);
            }
        });
        $('#form1').validate(o);

        // ESTO ES PARA LA GALERIA DE IMAGENES
        $(document).ready(function(){
            PictureGallery.initializer({
                sel_input      : '#txtUploadFile',
                sel_button     : '#btnUpload',
                sel_ajaxloader : '#ajax-loader1',
                sel_gallery    : '#gallery-image',
                sel_msgerror   : '#pg-msgerror',
                action         : baseURI+'paneladmin/bodas/ajax_upload_gallery',
                href_remove    : baseURI+'paneladmin/bodas/ajax_upload_delete',
                defined_size   : {
                    width  : 108,
                    height : 70
                },
                callback       : function(){
                    $('a.jq-image').fancybox();
                }
            });

            // Configura Fancybox
            $('a.jq-image').fancybox();
        });

        $("#gallery-image").sortable({
                                stop : function(){
                                    $('a.jq-image').fancybox();
                                },
                                revert: true,
                                handle : '.handle'
                           }).disableSelection();
        // ----


       // ESTO ES PARA EL UPLOAD SIMPLE
        $('#ajaxupload-form iframe').load(function(){
            if( this.src=="about:blank" ) return false;

            var content = this.contentDocument || this.contentWindow.document;
                content = content.body.innerHTML;

            _btnSubmit.disabled=false;

            _divAjaxLoad.hide();
            _working=false;

            var result;
            
            
            try{
                eval('result = '+content);
            }catch(e){

                alert('ERROR:\n\n'+content);
                return false;
            }
            if( result ){
                if( result['status']=="success" ) {
                    _divError.hide();
                    var output = result['output'][0];

                    _imgThumb.attr('src', output['href_image_full'])
                             .attr('alt', output['filename_image'])
                             .attr('width', output['thumb_width'])
                             .attr('height', output['thumb_height'])
                             .show();

                    eval("_ajaxupload_output."+_inputAjaxUpload+" = output;");


                }else _divError.html(result['error'][0]['message']).show();

            }else alert("Ha ocurrido un error en el servidor.");

            return false;
        });
        //-----

        $('#txtApellidoNovia, #txtNombreNovia, #txtApellidoNovio, #txtNombreNovio').blur(function(){$(this).ucTitle()});
    };

   this.upload = function(txt,opcion){
        var input = $('#'+txt);
        if( !input.val() ) return false;
        if( _working ) {
            alert("El servidor se encuentra ocupado.");
            return false;
        }

        _working=true;

        var parent = input.parent();
        var ext = input.val().replace(/^([\W\w]*)\./gi, '').toLowerCase();

        if( !(ext && /^(jpg|png|jpeg|gif)$/.test(ext)) ){
            alert('Error: Solo se permiten imagenes');
            return false;
        }

        var inputclone = input.clone(true);

        var form = $('#ajaxupload-form');
        _inputAjaxUpload = txt;
        _btnSubmit = input.parent().find('.jq-au-button')[0];
        _btnSubmit.disabled=true;

        _divAjaxLoad = input.parent().find('.ajaxupload-load').show();
        _imgThumb = input.parent().parent().parent().find('.jq-au-thumb');
        _divError = input.parent().parent().find('.ajaxupload-error');


        form.find('input').remove();
        input.prependTo(form);
        form.append("<input type='hidden' value='"+opcion+"' name='opcion' />");
        parent.prepend(inputclone);

        $('#ajaxupload-form iframe').attr('src', '');
        form.submit();

        return false;
    };

    this.add_item = function(list, item){
        item = $(item);
        list = $(list);
        if( item.val().length>0 ){
            try{
                list.find('option').each(function(){
                   if( $(this).text().toLowerCase() == item.val().toLowerCase() ) throw true;
                });
            }catch(e){
                alert('El item "'+ item.val() +'" ya existe.');
                return false;
            }

            list.append("<option value=''>"+ item.val() +"</option");
            item.val("").focus();
        }
    };

    this.remove_item = function(list){
        $(list+" :selected").remove();
    };

    this.generate_pass = function(){
      var str='';
      var n=0;
      while( n<10 ){
          // between 0 - 1
          var rndNum = Math.random();

          // rndNum from 0 - 1000
          rndNum = parseInt(rndNum * 1000);

          // rndNum from 33 - 127
          rndNum = (rndNum % 74) + 48;

          if( !(/^(58|59|60|61|62|63|64|91|92|93|94|95|96)$/.test(rndNum.toString())) ){
              str+=String.fromCharCode(rndNum);
              n++;
          }
      }

       $('#txtPass').val(str);
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _working=false;
     var _mode_edit;
     var _imgThumb;
     var _divError;
     var _divAjaxLoad;
     var _btnSubmit;
     var _inputAjaxUpload;
     var _ajaxupload_output= {};

    /* PRIVATE METHODS
     **************************************************************************/
     var _Loader = {
         show : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').show();
             $('#btnSubmit')[0].disabled=true;
         },
         hide : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').hide();
             $('#btnSubmit')[0].disabled=false;
         }
     };
     
     var _on_submit = function(form){
        if( !_mode_edit ){
            var img = $('img.jq-au-thumb:hidden');
            if( img.length>0 ){
                img.each(function(){
                    $(this).parent().find('.ajaxupload-error').html('Este campo es obligatorio.').show();
                });
                img.eq(0).parent().find('.ajaxupload-input').focus();
                return false;
            }
        }

        _ajaxupload_output.gallery={};
        _ajaxupload_output.gallery.images_new = PictureGallery.get_images_new();

        if( _mode_edit ) {
            _ajaxupload_output.gallery.images_del = PictureGallery.get_images_del();
            _ajaxupload_output.gallery.images_order = PictureGallery.get_orders();
        }

         var regalos=[];
         $("#lstRegalos option").each(function () {regalos.push($(this).text());});
         _ajaxupload_output.regalos=regalos;
         var menus=[];
         $("#lstMenu option").each(function () {menus.push($(this).text());});

         _ajaxupload_output.menus=menus;

         $("#json").val(JSON.encode(_ajaxupload_output));

        $(['#txtUbiSalon', '#txtUbiIglesia']).each(function(i,o){
             var div = $('<div></div>').append($(o).val());
             div.find('br, small').remove();
             div.find('iframe').attr('width', '362').attr('height', '196');
             $(o).val(div.html());
        });
        
        _Loader.show('#form1');
        form.submit();
     };

})();
