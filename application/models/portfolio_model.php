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
        $this->db->order_by('type', 'desc');
        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where(TBL_PORTFOLIO_WORKS);
        return $query->result_array();
    }

    public function create(){
        $json = json_decode($this->input->post('json'));

        $this->_reference = $this->input->post('reference');
        $filename_image = urldecode($json->image_thumb->filename_image);
        $data = array(
            'codlang'       => 1,
            'reference'     => $this->_reference,
            'reference2'    => normalize($this->input->post('txtTitle')),
            'title'         => $this->input->post('txtTitle'),
            'content_intro' => $this->input->post('txtDescription'),
            'content_full'  => $this->input->post('txtContent'),
            'thumb'         => $filename_image,
            'order'         => $this->_get_num_order(TBL_CONTENTS_SERVICES),
            'date_added'    => strtotime(date('d-m-Y')),
            'last_modified' => strtotime(date('d-m-Y'))
        );

        /*print_array($data)."<br>";
        print_array($json, true);*/

         $this->db->trans_start(); // INICIO TRANSACCION
         if( $this->db->insert(TBL_CONTENTS_SERVICES, $data) ){
             $id = $this->db->insert_id();

             if( !@copy(urldecode($json->image_thumb->href_image_full), UPLOAD_PATH_SERVICES_THUMBS .$this->_reference."/". $filename_image) ) {
                 $this->error = "Error al copiar archivo imagen thumb.";
                 return false;
             }
             if( !$this->_copy_images($json->gallery->images_new, $id) ) return false;
             
         }else {
             $this->error = "Error al insertar datos en la tabla: ".TBL_CONTENTS_SERVICES;
             return false;
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        //Borra archivos temporales
        $this->load->helper('file');
        delete_files(UPLOAD_PATH_SERVICES_THUMBS. $this->_reference . "/.tmp");
        delete_files(UPLOAD_PATH_SERVICES_GALLERY. $this->_reference . "/.tmp");

        return true;
    }

    public function edit(){
        $json = json_decode($this->input->post('json'));

        $this->_reference = $this->input->post('reference');
        $data = array(
            'codlang'        => 1,
            'reference2'     => normalize($this->input->post('txtTitle')),
            'title'          => $this->input->post('txtTitle'),
            'content_intro'  => $this->input->post('txtDescription'),
            'content_full'   => $this->input->post('txtContent'),
            'last_modified'  => strtotime(date('d-m-Y'))
        );
        /*print_array($data)."<br>";
        print_array($json, true);*/

        if( isset($json->image_thumb->filename_image) ){
            $filename_image = urldecode($json->image_thumb->filename_image);
            $data['thumb'] = $filename_image;
        }


         $this->db->trans_start(); // INICIO TRANSACCION
         $id = $this->input->post('content_id');
         $this->db->where('content_id', $id);
         if( $this->db->update(TBL_CONTENTS_SERVICES, $data) ){

             if( isset($json->image_thumb->href_image_full) ){
                 if( !@copy(urldecode($json->image_thumb->href_image_full), UPLOAD_PATH_SERVICES_THUMBS .$this->_reference."/". $filename_image) ) {
                     $this->error = "Error al copiar archivo imagen thumb.";
                     return false;
                 }
             }
             if( count($json->gallery->images_new)>0 ){
                if( !$this->_copy_images($json->gallery->images_new, $id) ) return false;
             }

             // Elimina las imagenes quitadas
            foreach( $json->gallery->images_del as $row ){
                if( $this->db->delete(TBL_CONTENTS_SERVICES_GALLERY, array('filename' => urldecode($row->image_thumb))) ){
                    @unlink(UPLOAD_PATH_SERVICES_GALLERY . $this->_reference ."/". $row->image_thumb);
                }else {
                    $this->error = "Error al eliminar imagen.";
                    return false;
                }
            }

            // Reordena los thumbs
            foreach( $json->gallery->images_order as $row ){
                $this->db->where('filename', urldecode($row->image));
                $this->db->update(TBL_CONTENTS_SERVICES_GALLERY, array('order' => $row->order));
            }


         }else {
             $this->error = "Error al insertar datos en la tabla: ".TBL_CONTENTS_SERVICES;
             return false;
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        //Borra archivos temporales
        $this->load->helper('file');
        delete_files(UPLOAD_PATH_SERVICES_THUMBS. $this->_reference . "/.tmp");
        delete_files(UPLOAD_PATH_SERVICES_GALLERY. $this->_reference . "/.tmp");

        //Borra imagen temporal
        if( isset($json->image_thumb->filename_image) ) @unlink($this->input->post('image_thumb_old'));
        
        return true;
    }
    
    public function delete($id){
        $info = $this->get_info($id);
        if( $this->db->delete(TBL_CONTENTS_SERVICES, array('content_id'=>$id))  ){
            if( $this->db->delete(TBL_CONTENTS_SERVICES_GALLERY, array('content_id'=>$id)) ){

             $this->db->trans_start(); // INICIO TRANSACCION
             @unlink(UPLOAD_PATH_SERVICES_THUMBS . $info['reference'] . '/' . $info['thumb']);
             foreach( $info['gallery'] as $row ){
                @unlink(UPLOAD_PATH_SERVICES_GALLERY . $info['reference'] . '/' . $row['filename']);
             }
             $this->db->trans_complete(); // COMPLETO LA TRANSACCION

            }else return false;
        }else return false;
        return true;
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $this->db->where('reference', $this->_reference);
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