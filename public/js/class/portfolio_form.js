var Portfolio=new(function(){

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _ajaxupload_output=false;
     var _ajaxupload_div=false;
     var _ajaxupload_working=false;
     var _ajaxupload_remove=false;

    /* CONSTRUCTOR
     **************************************************************************/
    $(document).ready(function(){
        var form, submit_handler,rules;
        if( (form = $('#form-portfoliowork')).length>0 ){
            rules = {
                txtName       : 'required'
            };
            if( !$('#id').val() ) rules.txtThumb = 'required';
            submit_handler = _work_submit_handler;
        }else{
            form = $('#form-portfolioclie');
            rules = {
                txtName       : 'required'
            };
            if( !$('#id').val() ) rules.txtThumb = 'required';
            submit_handler = _clie_submit_handler;
        }

        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : rules,
            errorPlacement: function(error, element) {
                if( element.attr('id')=="txtThumb" ){
                    element.parent().find('.ajaxupload-error').append(error);
                }else element.parent().append(error);
            },
            submitHandler : submit_handler,
            errorClass : 'valid-error'
        });
        form.validate(o);

        $('#ajaxupload-form iframe').load(function(){
            if( this.src=="about:blank" ) return false;

            var content = this.contentDocument || this.contentWindow.document;
                content = content.body.innerHTML;

            _ajaxupload_working=false;
            _ajaxupload_div.find('button')[0].disabled=false;
            _ajaxupload_div.find('.ajaxupload-load').hide();
            _ajaxupload_div.find('.valid-error, .ajaxupload-error').hide();

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
                if( typeof(_ajaxupload_remove)=="object" ) _ajaxupload_remove.show();
            }
            else _ajaxupload_div.find('.ajaxupload-error').html(result['error'][0]['message']).show();

            return false;
        });

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
        _ajaxupload_remove = me.find('.ajaxupload-remove');
        return false;
     };


    /* PRIVATE METHODS
     **************************************************************************/
    var _work_submit_handler = function(form){
        if( !_valid() ) return false;
        $('#json').val(JSON.encode({image_thumb : _ajaxupload_output}));
        form.submit();
    };

    var _clie_submit_handler = function(form){
        if( !_valid() ) return false;
        $('#json').val(JSON.encode({image_thumb : _ajaxupload_output}));
        form.submit();
    };

    var _valid = function(){
        if( !_ajaxupload_output && !$('#id').val() ){
            $('#txtThumb').css('border-style', 'dashed');
            $('#ajaxupload-error').html('Este campo es obligatorio.').show();
            return false;
        }else $('#txtThumb').css('border-style', 'solid');
        return true;
    };

});
