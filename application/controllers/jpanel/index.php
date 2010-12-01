<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();
        $this->load->library("simplelogin");
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        //echo $this->encpss->encode('abc123');
        
        if( $this->session->userdata('logged_in') ) {
            redirect('/jpanel/services/');
        }else{
            $data = array(
                'tlp_section'          => 'panel/login_view.php',
                'tlp_title'            => TITLE_INDEX_PANEL,
                'tlp_meta_description' => '',
                'tlp_meta_keywords'    => '',
                'tlp_title_section'    => "Acceder al Sistema"
            );
            $this->load->view('template_frontpage_view', $data);
        }
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $statusLogin = $this->simplelogin->login($this->input->post("txtUser"), $this->input->post("txtPass"));
            
            if( $statusLogin['status']=="error" ){
                if( $statusLogin['error']=="loginfaild" ){
                    $message = "El usuario y/o password son incorrectos.";
                }
                $this->session->set_flashdata('message_login', $message);
                redirect('/jpanel/');

            }else{
                redirect('/jpanel/services/');
            }
        }
    }

    public function logout(){
        $this->simplelogin->logout();
        redirect($this->config->item('base_url'));
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}