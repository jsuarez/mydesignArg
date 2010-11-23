<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contents_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function save(){
        $data = array(
            'content'       => $this->input->post('content'),
            'last_modified' => strtotime(date('d-m-Y'))
        );
        $this->db->where('reference', $this->input->post('reference'));
        return $this->db->update(TBL_CONTENTS, $data);
    }

    public function get_content($ref){
        $query = $this->db->get_where(TBL_CONTENTS, array('reference'=>$ref));
        $content="";
        if( $query->num_rows>0 ) {
            $row = $query->row_array();
            $content = $row['content'];
        }
        return $content;
    }

    public function get_list_banners($reference){
        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where(TBL_BANNERS, array('codlang'=>LANG, 'reference'=>$reference));
        return $query->result_array();
    }

    public function get_list(){
        $query = $this->db->get_where(TBL_CONTENTS);
        return $query->result_array();
    }
    
}
?>