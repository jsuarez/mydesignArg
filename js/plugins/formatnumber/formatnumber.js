var formatNumber = new (function(){

    /* CONSTRUCTOR
     **************************************************************************/
    this.init = function(sel, options){
        if( typeof options=="object" ) OPTIONS = $.extend({}, OPTIONS, options);

        $(sel).each(function(){
            var t = $(this);
            t.bind('keypress', on_keypress);
            if( OPTIONS.monedaSymbol ) t.bind('focus', on_focus);
            if( OPTIONS.autoFormat ) t.bind('blur', on_blur);
        });
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/
    var OPTIONS={
        decimalSymbol    : '.',
        symbolSeparation : ',',
        monedaSymbol     : null,
        decimalDigit     : null,
        integerDigit     : null,
        negativeNumber   : false,
        integerNumber    : true,
        autoFormat       : false
    };

    /* PRIVATE METHODS
     **************************************************************************/
    var on_keypress = function(e){
        var condition = false;
        var t = $(this);

        //document.title = e.which;

        condition = "e.which >= 48 && e.which <= 57 || e.which == 8 || e.which == 0";
        if( !OPTIONS.integerNumber ) condition+= " || e.which == 46 || e.which == 44";
        if( OPTIONS.negativeNumber ) condition+= " || e.which == 45";
        condition = eval(condition);

        if( condition ){
            return true;
        } else e.preventDefault();

        return false;
    };

    var on_blur = function(){
        var val = $.trim(this.value);
        if( val.length==0 ) return false;

        if( !OPTIONS.integerNumber ) {
            var numInt='', numDec='';
            var n = 0;
            var result = [];
            var c='';
            var i=0;
            var part = get_intdec(val);

            numInt = part.numInt;
            numDec = part.numDec;

            if( OPTIONS.integerDigit!=null ) numInt = numInt.substr(0, OPTIONS.integerDigit);
            if( OPTIONS.decimalDigit!=null && numDec!='' ) numDec = numDec.substr(0, OPTIONS.decimalDigit);

            for( i=numInt.length-1; i>=0; i-- ){
                c = numInt.charAt(i).toString();
                n++;

                result.push(c);
                if( n==3 && i!=0 ) {
                    result.push(",");
                    n=0;
                }
            }

            this.value = result.reverse().join('');

            if( OPTIONS.decimalDigit!=null ) {
                this.value+=OPTIONS.decimalSymbol;
                if( numDec=='' ) for( i=1; i<=OPTIONS.decimalDigit; i++ ) this.value += '0';
                else this.value+=numDec;
            }else{
                if( numDec!='' ){
                    this.value+=OPTIONS.decimalSymbol;
                    this.value+=numDec;
                }
            }
        }else{
            if( OPTIONS.integerDigit!=null ) this.value = this.value.toString().substr(0, OPTIONS.integerDigit);
        }

        if( OPTIONS.monedaSymbol!=null ) this.value = OPTIONS.monedaSymbol+' '+this.value;
        return false;
    };

    var on_focus = function(){
        this.value = this.value.replace(OPTIONS.monedaSymbol+' ', '');
    };

    var get_intdec = function(str){
        var v = eval("str.toString().replace(/\\"+ OPTIONS.symbolSeparation +"/gi, '').replace(/\\-/gi, '')");
        var f = v.lastIndexOf(OPTIONS.decimalSymbol);
        var numInt = v;
        var numDec = '';
        if( f!=-1 ){
            numInt = v.substr(0, f);
            numInt = eval("numInt.replace(/\\"+ OPTIONS.decimalSymbol +"/gi, '')");
            numDec = v.substr(f+1, v.length);
        }
        return {
            numInt : numInt,
            numDec : numDec
        };
    };
})();