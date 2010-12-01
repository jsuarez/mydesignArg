var Portfolio=new(function(){

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _table;
     var _working;
     var _type='work';

    /* CONSTRUCTOR
     **************************************************************************/
    $(document).ready(function(){
        $( "#tabs" ).tabs({
            load : function(e, ui){
                if( ui.index==0 ){
                    _table = $('#tbl-portwork');
                    _type = 'work';
                    _set_sortable(_table.find('.sortable'));
                }else{
                    _table = $('#tbl-portclients');
                    _type = 'clients';
                    _set_sortable(_table.find('.sortable'));
                }
            }
        });
    });

    /* PUBLIC METHODS
     **************************************************************************/
    this.New = function(){
        location.href = get_url('jpanel/portfolio/'+(_type=='work' ? 'workform' : 'clientsform'));
        return false;
    };

    this.del_sel = function(){
        var list = _table.find("tbody input:checked");
        if( list.length==0 ){
            alert("Debe seleccionar un item.");
            return false;
        }

        var data = get_data(list);

        if( confirm("¿Está seguro de eliminar?\n\n"+data.names.join(", ")) ){
            location.href = get_url('jpanel/portfolio/delete/'+_type+'/'+data.id.join("/"));
        }
        return false;
    };

    this.del = function(id){
        if( confirm("¿Está seguro de eliminar?")){
              location.href = get_url('jpanel/portfolio/delete/'+_type+'/'+id);
        }
        return false;
    };

    /* PRIVATE METHODS
     **************************************************************************/
     var _set_sortable = function(list){
         list.sortable({
            stop : function(){
                _working = true;
                list.sortable( "option", "disabled", true );

                var initorder = $(this).find('tr:first').attr('id').substr(3);

                var arr = $(this).sortable("toArray");

                var callback = function(){
                    list.sortable( "option", "disabled", false );
                };

                _save_order(arr, initorder, callback);
            },
            handle : '.handle'
        }).disableSelection();
     };
     
     var _save_order = function(arr, initorder, callback){
        $.post(get_url('jpanel/portfolio/ajax_order/'), {rows : JSON.encode(arr), initorder : initorder, type : _type}, function(data){
            _working = false;
            if( data!="success" ) alert('ERROR AJAX:\n\n'+data);
            else {
                if( typeof(callback)=="function" ) callback();
            }
        });
     };

});
