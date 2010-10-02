<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Simplelogin Class
 **/
class Simplelogin{

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct($p=array('table'=>TBL_USERS)){
        $this->user_table = $p['table'];
        $this->CI =& get_instance();
        $this->CI->load->library('encpss');
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $CI;
    private $user_table;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function login($user = '', $password = '') {
        //Make sure login info was sent
        if( $user == '' OR $password == '' ) {
            return array('status'=>'error', 'error'=>'loginfaild');
        }

        //Check if already logged in
        if( $this->CI->session->userdata('username') == $user ) {
            //User is already logged in.
            return array('status'=>'error', 'error'=>'loginfaild');
        }

        //Check against user table
        $where = array('username'=>$user);
        $query = $this->CI->db->get_where($this->user_table, $where);

        if( $query->num_rows > 0 ) {
            $row = $query->row_array();
            //Check against password

            if( $password != $this->CI->encpss->decode($row['password']) ) {
                return array('status'=>'error', 'error'=>'loginfaild');
            }

            //Destroy old session
            $this->CI->session->sess_destroy();

            //Create a fresh, brand new session
            $this->CI->session->sess_create();

            //Set session data
            $data = array();
            $data['logged_in'] = true;
            if( isset($row['level']) ) $data['level'] = $row['level'];
            if( isset($row['bodas_id']) ) $data['bodas_id'] = $row['bodas_id'];
            if( isset($row['users_id']) ) $data['users_id'] = $row['users_id'];
            $data['username'] = $row['username'];
            
            $this->CI->session->set_userdata($data);

            //Login was successful
            return array('status'=>'ok');
        } else {
            //No database result found
            return array('status'=>'error', 'error'=>'loginfaild');
        }
    }

    public function logout() {
        //Delete User online
        //$this->CI->db->delete(TBL_USERSONLINE, array('user_id' => $this->CI->session->userdata('user_id')));

        //Destroy session
        $this->CI->session->sess_destroy();
    }
}
?>