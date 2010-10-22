<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class services_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $reference;
    private $_path;

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

        /*
         * `content_id`, `codlang`, `reference`, `reference2`, `title`,
         *  `content_intro`, `content_full`, `thumb`, `thumb_gallery1`,
         * `thumb_gallery2`, `thumb_gallery3`, `thumb_gallery1_w`,
         * `thumb_gallery1_h`, `thumb_gallery2_w`, `thumb_gallery2_h`,
         * `thumb_gallery3_w`,
         * `thumb_gallery3_h`, `order`, `date_added`, `last_modified`
         */
        $data = array(
            'codlang'       => 1,
            'reference'     => $this->reference,
            'reference2'    => normalize($this->input->post('txtTitle')),
            'title'         => $this->input->post('txtTitle'),
            'content_intro' => $this->input->post('txtDescription'),
            'content_full'  => $this->input->post('txtContent'),
            'thumb'         => $json->image_thumb->filename_image,
            'order'         => $this->_get_num_order(TBL_CONTENTS_SERVICES),
            'date_added'    => strtotime(date('d-m-Y'))
        );

         $this->db->trans_start(); // INICIO TRANSACCION
         $this->_path = UPLOAD_PATH_SERVICES_THUMBS .$this->reference;
         if( $this->db->insert(TBL_CONTENTS_SERVICES, $data) ){
             $id = $this->db->insert_id();

             if( !@copy(urldecode($json->image_thumb->href_image_full),  $this->_path."/". urldecode($json->image_thumb->filename_image)) ) return false;
             if( !$this->_copy_images($json->gallery->images_new, $id) ) return false;
             
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION
         $this->_delete_images_tmp();
die();
         return true;
    }
    public function edit(){
        print_array($_POST)."<br>";
        print_array($json);
        $json = json_decode($this->input->post('json'));
        $content_id = $this->input->post('content_id');


        $this->reference = $this->input->post('reference');

        /*
         * `content_id`, `codlang`, `reference`, `reference2`, `title`,
         *  `content_intro`, `content_full`, `thumb`, `thumb_gallery1`,
         * `thumb_gallery2`, `thumb_gallery3`, `thumb_gallery1_w`,
         * `thumb_gallery1_h`, `thumb_gallery2_w`, `thumb_gallery2_h`,
         * `thumb_gallery3_w`,
         * `thumb_gallery3_h`, `order`, `date_added`, `last_modified`
         */
        $data = array(
            'codlang'       => 1,
            'reference'     => $this->reference,
            'reference2'    => normalize($this->input->post('txtTitle')),
            'title'         => $this->input->post('txtTitle'),
            'content_intro' => $this->input->post('txtDescription'),
            'content_full'  => $this->input->post('txtContent'),
            'thumb'         => $json->image_thumb->filename_image,
            'order'         => $this->_get_num_order(TBL_CONTENTS_SERVICES),
            'date_added'    => strtotime(date('d-m-Y'))
        );

         $this->db->trans_start(); // INICIO TRANSACCION
         $this->_path = UPLOAD_PATH_SERVICES_THUMBS .$this->reference;
         if( $this->db->update(TBL_CONTENTS_SERVICES, $data, array('content_id' => $content_id)) ){
             if( !@copy(urldecode($json->image_thumb->href_image_full),  $this->_path."/". urldecode($json->image_thumb->filename_image)) ) {
                    return false;
              }
              else{
                  @unlink(urldecode($_POST['image_thumb_old']));
              }
              if( !$this->_copy_images($json->gallery->images_new, $content_id) ) return false;
         }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION
         $this->_delete_images_tmp();
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

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _delete_images_tmp(){
        $dir = $this->_path."/.tmp";
        echo "directorio: ".$dir."_";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                if( preg_replace('/_.*$/', '', $file)==$this->session->userdata('users_id') )
                    @unlink($dir."/".$file);
            }
        }

    }

}
?>