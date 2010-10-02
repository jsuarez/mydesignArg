var Account = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtNameNovia : 'required',
                txtNameNovio : 'required',
                txtLugar     : 'required',
                txtEmail: {
                   required : true,
                   email    : true
                },
                txtPhoneNum : 'required'
            },
            submitHandler : function(form){
                _Loader.show('#form1');
                form.submit();
            },
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });
        $('#form1').validate(o);

        // Configura el calendario
        $(document).ready(function(){
            $("#txtDate").datepicker({
                showOn          : 'both',
                buttonImage     : 'images/icon_calendar.png',
                buttonImageOnly : true,
                dateFormat      : 'dd-mm-yy',
                changeMonth     : true,
                changeYear      : true,
                monthNamesShort : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
            });
        });
    };

    this.initializer2 = function(){
        _optval = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtEmail: {
                   required : true,
                   email    : true
                }
            },
            submitHandler : function(form){
                _Loader.show('#form1');
                form.submit();
            },
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });

        $('#form1').validate(_optval);
    };

    this.showcontapass = function(el){
        $(el).parent().hide();
        
        $('#contPass').fadeIn('slow', function(){
            $('#txtPassOld, #txtPassNew, #txtConfirmPass').val('');
            $('#txtPassOld').focus();

            _optval.rules.txtPassOld = {
                required : true,
                remote : {
                   url  : baseURI+'paneladmin/myaccount/ajax_check_pass/',
                   type : "post"
                }
            };
            _optval.rules.txtPassNew = {
                required : true,
                password : true
            };
            _optval.rules.txtConfirmPass = {
                required : true,
                equalTo  : '#txtPassNew'
            };
            $('#form1').validate(_optval);
        });
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _optval={};

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

})();
