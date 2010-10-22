<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Services_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $reference;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_list_services($reference){
        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where(TBL_CONTENTS_SERVICES, array('codlang'=>LANG, 'reference'=>$reference));
        return $query->result_array();
    }

    public function get_service($a, $b=null){
        $where = is_numeric($a) ? array('content_id'=>$a) : array('reference'=>$a, 'reference2'=>$b);
        $info = $this->db->get_where(TBL_CONTENTS_SERVICES, $where)->row_array();
        $list = $this->get_list_services($info['reference']);

        $info['prev']=null; $info['next']=null;
        for( $n=0; $n<=count($list)-1; $n++ ){
            $a = $list[$n];
            if( $a['content_id']==$info['content_id'] ){
                if( $n>0 ) {
                    $info['prev']['title'] = $list[$n-1]['title'];
                    $info['prev']['href'] = site_url($list[$n-1]['reference'] .'/'. $list[$n-1]['reference2']);
                    $info['prev']['id'] = $list[$n-1]['content_id'];
                }
                if( $n<count($list)-1 ) {
                    $info['next']['title'] = $list[$n+1]['title'];
                    $info['next']['href'] = site_url($list[$n+1]['reference'] .'/'. $list[$n+1]['reference2']);
                    $info['next']['id'] = $list[$n+1]['content_id'];
                }
                break;
            }
        }

        return $info;
    }

    public function create(){
        $json = json_decode($this->input->post('json'));

        print_array($_POST)."<br>";
        print_array($json);

        $this->reference = $this->input->post('reference');
        $data = array(
            'codlang'       => 1,
            'reference'     => normalize($this->reference),
            'reference2'    => normalize($this->input->post('txtTitle')),
            'title'         => $this->input->post('txtTitle'),
            'content_intro' => $this->input->post('txtDescription'),
            'content_full'  => $this->input->post('txtContent'),
            'thumb'         => $json->image_thumb->filename_image,
            'order'         => $this->_get_num_order(TBL_CONTENTS_SERVICES),
            'date_added'    => strtotime(date('d-m-Y'))
        );

         $this->db->trans_start(); // INICIO TRANSACCION
         if( $this->db->insert(TBL_CONTENTS_SERVICES, $data) ){
             $id = $this->db->insert_id();

             if( !@copy(urldecode($json->image_thumb->href_image_full), UPLOAD_PATH_SERVICES_THUMBS .$ref."/". urldecode($json->image_thumb->filename_image)) ) return false;
             if( !$this->_copy_images($json->gallery->images_new, $id) ) return false;
             
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION
die();
         return true;
    }
    
    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

    private function _copy_images($arr, $id){
        $n=0;
        $path = UPLOAD_PATH_SERVICES_GALLERY .$this->reference."/";
        foreach( $arr as $row ){
            $n++;
            $filename = urldecode($row->image_full);
            $cp1 = @copy($path.".tmp/".$filename, $path.$filename);

            if( $cp1 ){
                $data = array(
                    'content_id'    => $id,
                    'filename'      => urldecode($row->image_full),
                    'width'         => $row->width,
                    'height'        => $row->height
                );

                if( $id==0 ) $data['order'] = $n;
                if( !$this->db->insert(TBL_CONTENTS_SERVICES_GALLERY, $data) ) return false;
            }else return false;
        }

        return true;
    }

}
?>