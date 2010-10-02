var BodasList = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var list = $('#sortable');

        if( list.length>0 ){

            list.sortable({
                stop : function(){
                    _working = true;
                    list.sortable( "option", "disabled", true );

                    var initorder = $(this).find('tr:first').attr('id').substr(2);

                    var arr = $(this).sortable("toArray");

                    var callback = function(){
                        list.sortable( "option", "disabled", false );
                    };

                    _save_order(arr, initorder, callback);
                },
                handle : '.handle'
            }).disableSelection();
        }
    };

    this.del_sel = function(){
        var list = $("#tblList tbody input:checked");
        if( list.length==0 ){
            alert("Debe seleccionar un item.");
            return false;
        }

        var data = get_data(list);

        if( confirm("¿Está seguro de eliminar la(s) boda(s) seleccionada(s)?\n\n"+data.names.join(", ")) ){
            location.href = baseURI+'paneladmin/bodas/delete/'+data.id.join("/");
        }
        return false;
    };

    this.del = function(id){
        if( confirm("¿Está seguro de eliminar esta boda?")){
              location.href = baseURI+'paneladmin/bodas/delete/'+id;
        }
        return false;
    };

    this.popup_comments = function(id, view){
        _bodasid=id;
        _view=view;
        $.post(baseURI+'paneladmin/bodas/ajax_popup_comments/', {view:view, bodas_id:id}, function(data){
            $('#popup').html(data).modal({
                overlayClose : true,
                onShow : function(){
                    
                }
            });
        });
    };

    this.comments_del = function(id, tabla){

        if( confirm("¿Está seguro de eliminar?")){
            $('#ajaxloader').show();


           _del_comment(id, tabla);
           
        }

    };

    this.comments_del_sel = function(tabla){
        var list = $("#tblList tbody input:checked");
        if( list.length==0 ){
            alert("Debe seleccionar un item.");
            return false;
        }

        var data = get_data(list);

        if( confirm("¿Está seguro de eliminar la(s) boda(s) seleccionada(s)?") ){
            _del_comment(data.id.join("/"), tabla);
        
        }
        return false;

    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _working=false;
     var _bodasid=0;
     var _view=0;

    /* PRIVATE METHODS
     **************************************************************************/

    var _del_comment = function(id, tabla){        
        $.post(baseURI+'paneladmin/bodas/ajax_comments_del/'+tabla+"/"+id, function(data){
                $('#ajaxloader').hide();
                if( data=="true" ){
                    BodasList.popup_comments(_bodasid, _view);
                }
            });
    };

    var _save_order = function(arr, initorder, callback){
        $.post(baseURI+'paneladmin/bodas/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
            _working = false;
            if( data!="success" ) alert('ERROR AJAX:\n\n'+data);
            else {
                if( typeof(callback)=="function" ) callback();
            }
        });
    };

})();
