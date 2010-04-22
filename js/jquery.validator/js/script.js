/*
 * jQuery JavaScript Library v1.3
 * http://jquery.com/
 *
 * Copyright (c) 2009-2010 Ivan Mattoni
 * Empresa MyDesign
 * Dual licensed under the MIT and GPL licenses.
 * http://docs.jquery.com/License
 *
 * Version: 3.0
 */

var ClassValidator = function(param1, param2){

    /* PUBLIC METHODS
     **********************************************************************/
    this.setting = function(selector, setting){
        SETTING = $.extend({}, SETTING, {}, setting);
        SETTING.object = $(selector);
        SETTING.object.each(function(){
            this.validator_setting = SETTING;
        });
    };

    this.validate = function(){
        var arg = arguments;
        if( arg.length<2 ) return false;

        var selector = arg[0];
        var cont=false, callback=Function();
        if( typeof arg[1]=="string"||typeof arg[1]=="object" && arg[2] && typeof arg[2]=="function" ) {
            cont = typeof arg[1]=="string" ? $(arg[1]) : arg[1];
            if( !plantilla ) plantilla = cont.html();
            else cont.html(plantilla);

            callback = arg[2];
        }else if( typeof arg[1]=="function" && arg.length==2 ){
            callback = arg[1];
        }

        try{
            This = $(selector);
            var error = false;
            var index = false;
            This.each(function(i){
                index = i;
                this.validator_container_one = cont;
                var result = event_blur(this);
                if( result.error ) error=true;
                if( result.end_loop ) {
                    index = result.index;
                    throw true;
                }

                if( i==This.length-1 ) {
                    if( error ) this.focus();
                    callback(error);
                }
            });
        }catch(e){
            This[index].focus();
            callback(error);
        }

        return false;
    };

    this.show = function(selector, options){
        if( (typeof selector=="string" || typeof selector=="object") && typeof options=="object" ){
            var options_default={
                container : null,
                message   : ''
            };
            options = $.extend({}, options_default, {}, options);

            OPTIONS.msg_custom = options.message;

            $(selector).each(function(){
                if( !this.validator_options ) this.validator_options = OPTIONS;
                if( !this.validator_setting ) this.validator_setting = SETTING;

                var obj=false;
                if( options.container!=null && (typeof options.container=="string"||typeof options.container=="object") ){
                    obj = (typeof options.container)=="string" ? $(options.container) : options.container;
                }
                var div = get_div();
                var cssAdd = (this.validator_setting.addClass=='') ? this.validator_options.addClass : this.validator_setting.addClass;
                if( !obj ){
                    if( !this.validator_container ){
                        $(this).after(div);
                        this.validator_container = $(this).parent().find("."+this.validator_setting.className);
                        $(this.validator_container).addClass(cssAdd);
                    }
                }else{
                    this.validator_container = obj.append(div);
                    $(this.validator_container).find('.'+this.validator_setting.className).addClass(cssAdd);
                }
   
                this.validator_error = true;
                
                message(true, this, 'custom');

            });
        }
    };

    this.hide = function(selector){
        $(selector).each(function(){
            if( this.validator_container ){
                this.validator_error=false;
                message(false, this, '');
            }
        });
    };


    /* PRIVATE PROPERTIES
     **********************************************************************/
    var OPTIONS={
        container       :       null,   // [STRING] || [OBJECT]
        addClass        :       '',     // [STRING]
        msg_required    :       '',     // [STRING]
        msg_email       :       '',     // [STRING]
        msg_string      :       '',     // [STRING]
        msg_numeric     :       '',     // [STRING]
        msg_date        :       '',     // [STRING]
        msg_password    :       '',     // [STRING]
        msg_user        :       '',     // [STRING]
        msg_compare     :       '',     // [STRING]
        msg_custom      :       '',     // [STRING]
        v_required	:	false,	// [BOOLEAN]
        v_string	:	null,	// [BOOLEAN]
        v_password	:	null,	// [ARRAY]   [min, max]
        v_user  	:	null,	// [ARRAY]   [min, max]
        v_email		:	null,	// [BOOLEAN]
        v_date		:	null,	// [STRING]
        v_compare	:	null,	// [STRING] || [OBJECT]
        v_custom        :       null   // [FUNCTION]
    };
    var SETTING = {
        object          :       [],                  // [OBJECT]
        className	:	'jquery-validator',  // [STRING]
        classArrow      :       '',                  // [STRING]
        classMessage    :       'jquery-validator-message',           // [STRING]
        addClass        :       '',                  // [STRING]
        effect_show  	:	'fade',              // [STRING]  null, fade, slide, slidefade, toggle
        effect_hide  	:	'fade',              // [STRING]  null, fade, slide, slidefade, toggle
        validateOne	:	false,               // [BOOLEAN]
        activeBlur      :	true,                // [BOOLEAN]
        show_alert      :       false                // [BOOLEAN]
    };
    var MESSAGE = {
        required	:	'Este campo es obligatorio.',
        email		:	'El email ingresado es incorrecto.',
        string		:	'Debe contener solo caracteres alfab&eacute;ticos.',
        numeric		:	'Debe contener solo caracteres num&eacute;ricos.',
        date		:	'El formato de la fecha es incorrecto.',
        password	:	'El password debe tener entre %min y %max caracteres, por lo menos un d&iacute;gito y un alfanum&eacute;rico, y no  puede contener caracteres espaciales.',
        user        	:	'El usuario debe tener entre %min y %max caracteres, debe ser en minuscula y no puede contener caracteres espaciales.',
        compare		:	'El password y la confirmaci&oacute;n no coinciden.',
        custom		:	''
    };
    var This=this;
    var plantilla=false;

    /* PRIVATE METHODS
     **********************************************************************/
    var initializer = function() {
        var obj=false;
        This.each(function(){

            if( !this.validator_options ){
                this.validator_options = $.extend({}, OPTIONS, {}, param1);
            }else{
                this.validator_options = $.extend({}, this.validator_options, {}, param1);
            }

            var opt = this.validator_options;
            if( !this.validator_container_one && opt.container!=null && (typeof opt.container=="string"||typeof opt.container=="object") ){
                obj = (typeof opt.container)=="string" ? $(opt.container) : opt.container;
            }

            if( !this.validator_setting ) this.validator_setting = SETTING;

            if( !this.validator_container_one ){
                var div = get_div();
                var cssAdd = (this.validator_setting.addClass=='') ? this.validator_options.addClass : this.validator_setting.addClass;
                if( !obj ){
                    if( !this.validator_container ){
                        $(this).after(div);
                        this.validator_container = $(this).parent().find("."+this.validator_setting.className);
                        $(this.validator_container).addClass(cssAdd);
                    }
                }else{
                    this.validator_container = obj.append(div);
                    $(this.validator_container).find('.'+this.validator_setting.className).addClass(cssAdd);
                }
            }

            if( this.validator_setting.activeBlur ) $(this).blur(event_blur);

        });
    };

    var event_blur = function(e){
        var t=e;
        if( e.currentTarget ) t=e.currentTarget;
        
        if( t.validator_options ) OPTIONS = t.validator_options;
        if( t.validator_setting ) SETTING = t.validator_setting;

        if( SETTING.validateOne ){
            try{
                var index=0;
                SETTING.object.each(function(i){
                    index=i;
                    if( this!=t ){
                        if( this.validator_error ) throw true;
                    }
                });
            }catch(e){
                return {error:true, end_loop:true, index:index};
            }
        }

        var v = validate(t);
        t.validator_error = v.result;
        message(v.result, t, v.error);

        return {error:v.result, end_loop:false};
    };

    var validate = function(t){
        //============== REQUIRED ==============
        if( OPTIONS.v_required ){
            if( $(t).is('input:text') || $(t).is('input:password') || $(t).is('textarea') ){
                if( t.value.length==0 ) return {result: true, error: 'required'};
            }
            if( $(t).is('input:checkbox') ){
                if( !t.checked ) return {result: true, error: 'required'};
            }
            if( $(t).is('input:radio') ){
                if( !This.is(':checked') ) return {result: true, error: 'required'};
            }
            if( $(t).is('select') ){
                if( t.value==0 ) return {result: true, error: 'required'};
            }
        }
        //============== STRING ===============
        if( OPTIONS.v_string!=null && OPTIONS.v_string ){
            if( t.value.length>0 && !isNaN(parseFloat(t.value)) ) return {result: true, error: 'string'};
        }

        //============== NUMERIC ===============
        if( OPTIONS.v_string!=null && !OPTIONS.v_string ){
            if( t.value.length>0 && isNaN(parseFloat(t.value)) ) return {result: true, error: 'numeric'};
        }

        //============== PASSWORD ===============
        if( OPTIONS.v_password!=null && typeof OPTIONS.v_password=="object" && OPTIONS.v_password.length==2 ){
            eval('var RegExPattern = new RegExp(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{'+OPTIONS.v_password[0]+','+OPTIONS.v_password[1]+'})$/);');
            if( t.value.length>0 && !t.value.match(RegExPattern) ) return {result: true, error: 'password'};
        }

        //============== USER ===============
        if( OPTIONS.v_user!=null && typeof OPTIONS.v_user=="object" && OPTIONS.v_user.length==2 ){
            //document.title = "pase";
            if( t.value.length>0 ){
                eval('var RegExPattern = new RegExp(/^[a-z0-9ü][a-z0-9ü_]{'+OPTIONS.v_user[0]+','+OPTIONS.v_user[1]+'}$/);');
                if( !t.value.match(RegExPattern) ) return {result: true, error: 'user'};
            }
        }

        //============== EMAIL ===============
        if( OPTIONS.v_email!=null && OPTIONS.v_email ){
            var regExp = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
            if( t.value.length>0 && !regExp.test(t.value) ) return {result: true, error: 'email'};
        }

        //============== DATE ===============
        if( OPTIONS.v_date!=null && typeof OPTIONS.v_date=="string" && t.value.length>0 ){
            if( valid_date($.trim(t.value)) ) return {result: true, error: 'date'};
        }

        //============== COMPARE ===============
        if( OPTIONS.v_compare!=null && (typeof OPTIONS.v_compare=="string" || typeof OPTIONS.v_compare=="object") ){
            var obj = (typeof OPTIONS.v_compare=="string") ? $(OPTIONS.v_compare) : OPTIONS.v_compare;
            var condition=false;

            try{
                obj.each(function(i){
                    if( t.value.length>0 && this.value != t.value ) condition=true;
                    if( i==obj.length-1 ){
                        if( condition ) throw true;
                    }
                });
            }catch(e){
                return {result: true, error: 'compare'};
            }
        }

        //============== CUSTOM ===============
        if( OPTIONS.v_custom!=null && typeof OPTIONS.v_custom=="function" ){
            if( OPTIONS.v_custom(t) ) return {result: true, error: 'custom'};
        }


        return {result: false};
    };

    var get_div = function(){
        var div = $('<div class="'+SETTING.className+'"></div>');
        if( SETTING.classArrow!="" ){
            div.append('<div class="'+SETTING.classArrow+'"></div>');
        }
        div.append('<span class="'+SETTING.classMessage+'"></span>');
        return div;
    };

    var message = function(condition, el, error){
        var div = !el.validator_container_one ? el.validator_container : el.validator_container_one;

        if( condition ){
            var msg = get_message(error);
            if( !el.validator_container_one ){
                if( div.hasClass('.'+SETTING.className) ){
                    div.find('.'+SETTING.classMessage).html(msg);
                }else{
                    div = div.find('.'+SETTING.className);
                    div.find('.'+SETTING.classMessage).html(msg);
                }

            }else{
                var tag,i,ntag;

                if( div.find('p,li').length>0 ){
                    for( i=0, ntag=['p','li']; i<=2; i++ ){
                        tag = div.find(ntag[i]+':last');
                        if( tag.length>0 ) {
                            if( tag.text()=="" ){
                                tag.html(msg);
                            }else{
                                tag.after(tag.clone().html(msg));
                            }
                        }
                    }
                }
            }

            if( SETTING.validateOne && SETTING.show_alert ){
                alert(msg);
            }else{
                message_show(div);
            }
        }else{
            if( !SETTING.show_alert ){
                if( !div.hasClass('.'+SETTING.className) ){
                    div = div.find('.'+SETTING.className);
                }
                message_hidden(div);
            }
        }
    };

    var get_message = function(error){
        var msg="";
        eval('msg = OPTIONS.msg_'+error);
        eval('if( msg=="" ) msg = MESSAGE.'+error);

        if( error=='user' || error=='password' ){
            eval('var arr = OPTIONS.v_'+error);
            msg = msg.replace(/\%min/gi, arr[0]);
            msg = msg.replace(/\%max/gi, arr[1]);
        }

        return msg;
    };

    var message_show = function(div){
        if( !div.is(':visible') ) {
            switch(SETTING.effect_show){
                case null: default:
                    div.show();
                break;
                case "fade":
                    div.fadeIn('slow');
                break;
                case "slide":
                    div.slideDown('slow');
                break;
                case "slidefade":
                    div.css('opacity', '0');
                    div.animate({
                        height : 'show',
                        opacity : 1
                    }, 'slow');
                break;
                case "toggle":
                    div.toggle('slow');
                break;
            }
        }
    };

    var message_hidden = function(div){
        if( div.is(':visible') ) {
            switch(SETTING.effect_hide){
                case null: default:
                    div.show();
                break;
                case "fade":
                    div.fadeOut('slow', function(){div.hide()});
                break;
                case "slide":
                    div.slideUp('slow', function(){div.hide()});
                break;
                case "slidefade":
                    div.css('opacity', '1');
                    div.animate({
                        height : '0',
                        opacity : 0
                    }, 'slow', function(){div.hide()});
                break;
                case "toggle":
                    div.toggle('slow');
                break;
            }
        }
    };

    var valid_date = function(value){
        var pattern = "";
        var arr = new Array;
        var Day, Month, Year;
        switch( OPTIONS.v_date ){
            case 'dd/mm/yyyy':pattern = "/";break;
            case 'dd-mm-yyyy':pattern = "-";break;
            case 'dd.mm.yyyy':pattern = ".";break;
            case 'mm/dd/yyyy':pattern = "/";break;
            case 'mm-dd-yyyy':pattern = "-";break;
            case 'mm.dd.yyyy':pattern = ".";break;
        }
        if( pattern!="" ) {
            arr = value.split(pattern);
            if( arr.length==3 ) {
                if( OPTIONS.v_date.substr(0,2)=="dd" ){
                    Day = arr[0];
                    Month = arr[1];
                }else{
                    Day = arr[1];
                    Month = arr[0];
                }
                Year = arr[2];

                if( isNaN(Year) || Year.length<4 || parseFloat(Year)<1900 ) return true;
                if( isNaN(Month) || parseFloat(Month)<1 || parseFloat(Month)>12 ) return true;
                if( isNaN(Day) || parseInt(Day, 10)<1 || parseInt(Day, 10)>31 ) return true;
                if( Month==4 || Month==6 || Month==9 || Month==11 || Month==2 ) {
                    if( Month==2 && Day > 28 || Day>30 ) return true;
                }

            }else return true;
        }else return true;
        return false;
    };


    /* CONSTRUCTOR
     **********************************************************************/
    if( typeof param1=="object" && typeof param2=="undefined" ){
        initializer();
    }else if( typeof param1=="object" && typeof param2=="object" ){
        $.validator.setting(this, param2);
        initializer();
    }
};

$.fn.validator = ClassValidator;
$.validator = new ClassValidator();