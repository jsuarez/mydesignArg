<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    public $error;

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_reference;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_list_clients(){
        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where(TBL_PORTFOLIO_CLIENTS);
        return $query->result_array();
    }

    public function get_list_works($type='all'){
        if( $type!='all' ) $this->db->where('type', $type);
        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where(TBL_PORTFOLIO_WORKS);
        return $query->result_array();
    }

    public function get_info_works($id){
        return $this->db->get_where(TBL_PORTFOLIO_WORKS, array('id'=>$id))->row_array();
    }

    public function get_info_clients($id){
        return $this->db->get_where(TBL_PORTFOLIO_CLIENTS, array('id'=>$id))->row_array();
    }

    public function work_create(){
        $json = json_decode($this->input->post('json'));

        $filename_image = urldecode($json->image_thumb->filename_image);
        $data = array(
            'type'          => $this->input->post('cboType'),
            'name'          => $this->input->post('txtName'),
            'url'           => $this->input->post('txtUrl'),
            'filename'      => $filename_image,
            'order'         => $this->_get_num_order(TBL_PORTFOLIO_WORKS, array('type'=>$this->input->post('cboType'))),
            'date_added'    => strtotime(date('d-m-Y')),
            'last_modified' => strtotime(date('d-m-Y'))
        );

        /*print_array($data)."<br>";
        print_array($json, true);*/

         $this->db->trans_start(); // INICIO TRANSACCION
         if( $this->db->insert(TBL_PORTFOLIO_WORKS, $data) ){
             $id = $this->db->insert_id();

             if( !@copy(urldecode($json->image_thumb->href_image_full), UPLOAD_PATH_PORTFOLIOWORKS . $filename_image) ) {
                 $this->error = "Error al copiar archivo imagen thumb.";
                 return false;
             }
             
         }else {
             $this->error = "Error al insertar datos en la tabla: ".TBL_PORTFOLIO_WORKS;
             return false;
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        //Borra archivos temporales
        $this->load->helper('file');
        delete_files(UPLOAD_PATH_PORTFOLIOWORKS . ".tmp");

        return true;
    }

    public function work_edit(){
        $json = json_decode($this->input->post('json'));

        $data = array(
            'type'          => $this->input->post('cboType'),
            'name'          => $this->input->post('txtName'),
            'url'           => $this->input->post('txtUrl'),
            'last_modified' => strtotime(date('d-m-Y'))
        );
        /*print_array($data)."<br>";
        print_array($json, true);*/

        if( isset($json->image_thumb->filename_image) ){
            $filename_image = urldecode($json->image_thumb->filename_image);
            $data['filename'] = $filename_image;
        }


         $this->db->trans_start(); // INICIO TRANSACCION
         $id = $this->input->post('id');
         $this->db->where('id', $id);
         if( $this->db->update(TBL_PORTFOLIO_WORKS, $data) ){

             if( isset($json->image_thumb->href_image_full) ){
                 if( !@copy(urldecode($json->image_thumb->href_image_full), UPLOAD_PATH_PORTFOLIOWORKS . $filename_image) ) {
                     $this->error = "Error al copiar archivo imagen thumb.";
                     return false;
                 }
             }

         }else {
             $this->error = "Error al insertar datos en la tabla: ".TBL_PORTFOLIO_WORKS;
             return false;
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        //Borra archivos temporales
        $this->load->helper('file');
        delete_files(UPLOAD_PATH_PORTFOLIOWORKS.".tmp");

        //Borra imagen temporal
        if( isset($json->image_thumb->filename_image) ) @unlink($this->input->post('image_thumb_old'));
        
        return true;
    }

    public function clie_create(){
        $json = json_decode($this->input->post('json'));

        $filename_image = urldecode($json->image_thumb->filename_image);
        $data = array(
            'name'          => $this->input->post('txtName'),
            'filename'      => $filename_image,
            'order'         => $this->_get_num_order(TBL_PORTFOLIO_CLIENTS),
            'date_added'    => strtotime(date('d-m-Y')),
            'last_modified' => strtotime(date('d-m-Y'))
        );

        /*print_array($data)."<br>";
        print_array($json, true);*/

         $this->db->trans_start(); // INICIO TRANSACCION
         if( $this->db->insert(TBL_PORTFOLIO_CLIENTS, $data) ){
             $id = $this->db->insert_id();

             if( !@copy(urldecode($json->image_thumb->href_image_full), UPLOAD_PATH_PORTFOLIOCLIE . $filename_image) ) {
                 $this->error = "Error al copiar archivo imagen thumb.";
                 return false;
             }
             
         }else {
             $this->error = "Error al insertar datos en la tabla: ".TBL_PORTFOLIO_CLIENTS;
             return false;
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        //Borra archivos temporales
        $this->load->helper('file');
        delete_files(UPLOAD_PATH_PORTFOLIOCLIE . ".tmp");

        return true;
    }

    public function clie_edit(){
        $json = json_decode($this->input->post('json'));

        $data = array(
            'name'          => $this->input->post('txtName'),
            'last_modified' => strtotime(date('d-m-Y'))
        );
        /*print_array($data)."<br>";
        print_array($json, true);*/

        if( isset($json->image_thumb->filename_image) ){
            $filename_image = urldecode($json->image_thumb->filename_image);
            $data['filename'] = $filename_image;
        }


         $this->db->trans_start(); // INICIO TRANSACCION
         $id = $this->input->post('id');
         $this->db->where('id', $id);
         if( $this->db->update(TBL_PORTFOLIO_CLIENTS, $data) ){

             if( isset($json->image_thumb->href_image_full) ){
                 if( !@copy(urldecode($json->image_thumb->href_image_full), UPLOAD_PATH_PORTFOLIOCLIE . $filename_image) ) {
                     $this->error = "Error al copiar archivo imagen thumb.";
                     return false;
                 }
             }

         }else {
             $this->error = "Error al insertar datos en la tabla: ".TBL_PORTFOLIO_CLIENTS;
             return false;
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        //Borra archivos temporales
        $this->load->helper('file');
        delete_files(UPLOAD_PATH_PORTFOLIOCLIE.".tmp");

        //Borra imagen temporal
        if( isset($json->image_thumb->filename_image) ) @unlink($this->input->post('image_thumb_old'));

        return true;
    }
    
    public function delete($id, $type){
        $table = $type=="work" ? TBL_PORTFOLIO_WORKS : TBL_PORTFOLIO_CLIENTS;
        $path = $type=="work" ? UPLOAD_PATH_PORTFOLIOWORKS : UPLOAD_PATH_PORTFOLIOCLIE;
        $this->db->select('filename');
        $this->db->where_in('id', $id);
        $arr = $this->db->get($table)->result_array();

        $this->db->trans_start(); // INICIO TRANSACCION
        $this->db->where_in('id', $id);
        if( $this->db->delete($table) ){
            foreach( $arr as $row ){
                @unlink($path . $row['filename']);
            }
        }
        $this->db->trans_complete(); // COMPLETO LA TRANSACCION
        return true;
    }

    public function order(){
        $initorder = $this->input->post('initorder');
        $rows = json_decode($this->input->post('rows'));

        $table = $this->input->post('type')=='work' ? TBL_PORTFOLIO_WORKS : TBL_PORTFOLIO_CLIENTS;

        $this->db->select('order');
        $res = $this->db->get_where($table, array('id'=>$initorder))->row_array();
        $order = $res['order'];

        //print_array($rows, true);
        foreach( $rows as $row ){
            $id = substr($row, 3);
            $this->db->where('id', $id);
            if( !$this->db->update($table, array('order' => $order)) ) return false;
            $order++;
        }

        return true;
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name, $where=array()){
        $this->db->select_max('`order`');
        $this->db->where($where);
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

    private function _copy_images($arr, $id){
        $n=0;
        $path = UPLOAD_PATH_SERVICES_GALLERY .$this->_reference."/";
        foreach( $arr as $row ){
            $n++;
            $filename = urldecode($row->image_thumb);
            $cp1 = @copy($path.".tmp/".$filename, $path.$filename);

            if( $cp1 ){
                $data = array(
                    'content_id'    => $id,
                    'filename'      => $filename,
                    'width'         => $row->width_complete,
                    'height'        => $row->height_complete
                );

                if( !is_numeric($this->input->post('content_id')) ) $data['order'] = $n;
                if( !$this->db->insert(TBL_CONTENTS_SERVICES_GALLERY, $data) ) {
                    $this->error = "Error al insertar los datos en la tabla: ".TBL_CONTENTS_SERVICES_GALLERY;
                    return false;
                }
            }else {
                $this->error = "Error al copiar la imagen de la galeria";
                return false;
            }
        }

        return true;
    }

}
?>