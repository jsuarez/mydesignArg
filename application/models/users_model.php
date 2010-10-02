<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
     public function save(){
        $data = array(
            'email'   => $_POST['txtEmail'],
            'last_modified' => date('Y-m-d H:i:s')
        );

        if( !empty($_POST['txtPassNew']) ){
            $this->load->library('encpss');
            $data['password'] = $this->encpss->encode($_POST['txtPassNew']);
        }
        
        $this->db->where(array('username'=>$this->session->userdata('username')));
        return $this->db->update(TBL_USERS, $data);
     }

     public function get_info($where=array()){
        $query = $this->db->get_where(TBL_USERS, $where);
        if( $query->num_rows>0 ){
            $row = $query->row_array();
            return $row;
        }else return false;
     }

}
?>