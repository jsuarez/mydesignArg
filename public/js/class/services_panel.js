var Services=new(function(){


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _ajaxupload_output=false;
     var _ajaxupload_div=false;
     var _ajaxupload_working=false;
     var _modedit=false;

    /* CONSTRUCTOR
     **************************************************************************/

    $(document).ready(function(){
        _modedit = $('#modedit').val()=="1" ? true : false;
        if( typeof(tinyMCE)!="undefined" ){
            //Esto es para el validador del Formulario de Contacto
            var o = $.extend({}, jQueryValidatorOptDef, {
                rules : {
                    txtTitle       : 'required',
                    txtDescription : 'tinymce_required',
                    txtContent     : 'tinymce_required'
                },
                errorPlacement: function(error, element) {
                    /*error.css({
                        position : 'absolute',
                        left : element.offset().left + element.innerWidth()+3,
                        top  : element.offset().top-3
                    });*/
                    element.parent().append(error);
                },
                submitHandler : function(form){
                    var out = {};out.gallery={};
                    out.image_thumb = _ajaxupload_output;

                    out.gallery.images_new = PictureGallery.get_images_new();

                    if( _modedit ) {
                        out.gallery.images_del = PictureGallery.get_images_del();
                        out.gallery.images_order = PictureGallery.get_orders();
                    }

                    $('#json').val(JSON.encode(out));
                    form.submit();
                },
                errorClass : 'valid-error'
            });
            $('#form1').validate(o);

            // Configura el editor
            TinyMCE_init.width = '300px';
            TinyMCE_init.height = '250px';
            tinyMCE.init(TinyMCE_init);

            // ESTO ES PARA EL UPLOAD SIMPLE
            $('#ajaxupload-form iframe').load(function(){
                if( this.src=="about:blank" ) return false;

                var content = this.contentDocument || this.contentWindow.document;
                    content = content.body.innerHTML;

                _ajaxupload_working=false;
                _ajaxupload_div.find('button')[0].disabled=false;
                _ajaxupload_div.find('.ajaxupload-load').hide();

                var result;
                try{
                    eval('result = '+content);
                }catch(e){
                    alert('ERROR:\n\n'+content);
                    return false;
                }

                if( result['status']=="success" ) {
                    _ajaxupload_div.find('.ajaxupload-error').hide();
                    var output = result['output'][0];

                    _ajaxupload_div.find('.ajaxupload-thumb').attr('src', output['href_image_full'])
                                          .attr('alt', output['filename_image'])
                                          .attr('width', output['thumb_width'])
                                          .attr('height', output['thumb_height'])
                                          .show();

                    _ajaxupload_output = output;
                }
                else _ajaxupload_div.find('.ajaxupload-error').html(result['error'][0]['message']).show();

                return false;
            });
            //-----

            PictureGallery.initializer({
                sel_input      : '#txtUploadFile',
                sel_button     : '#btnUpload',
                sel_ajaxloader : '#ajax-loader1',
                sel_gallery    : '#gallery-image',
                sel_msgerror   : '#pg-msgerror',
                action         : get_url('jpanel/services/ajax_upload_gallery/'+$('#reference').val()),
                href_remove    : get_url('jpanel/services/ajax_upload_delete'),
                defined_size   : {
                    width  : 108,
                    height : 70
                }
            });

            $("#gallery-image").sortable({
                revert : true,
                handle : '.handle'
            }).disableSelection();

        }else{
           $("#sortable").sortable({
                revert : true,
                handle : '.handler'
           }).disableSelection();

        }

    });

    /* PUBLIC METHODS
     **************************************************************************/
    this.upload = function(sel){
        if( _ajaxupload_working ) return false;

        var me = $(sel);
        var input = me.find(':file');
        if( !input.val() ) return false;
        var parent = input.parent();
        var ext = input.val().replace(/^([\W\w]*)\./gi, '').toLowerCase();

        if( !(ext && /^(jpg|png|jpeg|gif)$/.test(ext)) ){
            alert('Error: Solo se permiten imagenes');
            return false;
        }

        var inputclone = input.clone(true);

        var form = $('#ajaxupload-form');

        me.find('button')[0].disabled=true;
        me.find('ajaxupload-load').show();

        form.find('input:file').remove();
        input.prependTo(form);
        parent.prepend(inputclone);

        $('#ajaxupload-form iframe').attr('src', '');
        form.submit();

        _ajaxupload_working=true;
        _ajaxupload_div = me;
        return false;
    };

    this.del = function(ref, id){
        if( confirm('¿Estás seguro de eliminar?') ){
            location.href = get_url('/jpanel/services/delete/'+ref+'/'+id);
        }
    };



    /* PRIVATE METHODS
     **************************************************************************/

});
