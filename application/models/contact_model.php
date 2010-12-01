<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
        $this->load->library('user_agent');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
     public function save(){        
         $phone = $this->input->post('txtPhoneNum');
         if( $this->input->post('txtPhoneCode')!='' ) $phone = $this->input->post('txtPhoneCode').' - '.$phone;
         $ip = $_SERVER['REMOTE_ADDR'];
         
         $data = array(
             'name'     => $this->input->post('txtName'),
             'phone'    => $phone,
             'email'    => $this->input->post('txtEmail'),
             'ip'       => $ip,
             'browser'  => $this->_get_browser(),
             'platform' => $this->agent->platform(),
             'message'  => nl2br($this->input->post('txtConsult')),
             'date_add' => strtotime(date('d-m-Y')),
         );
         return $this->db->insert(TBL_MESSAGES, $data);
     }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
     private function _get_browser(){
        if ($this->agent->is_browser()){
            return $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot()){
            return $this->agent->robot();
        }
        elseif ($this->agent->is_mobile()){
            return $this->agent->mobile();
        }
        else{
            return 'Unidentified User Agent';
        }
     }
}
?>