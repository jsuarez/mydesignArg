<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();
        $this->load->library("simplelogin");
        $this->load->model('contents_model');
    }


    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        //echo $this->encpss->encode('abc123');
        
        if( $this->session->userdata('logged_in') ) {
            redirect('/jpanel/services/');
        }else{
            $this->assets->add_css('view_login');
            $this->assets->add_js(array('plugins/formatnumber/formatnumber.min'));
            $this->_render('panel/login_view.php', array(
                'tlp_title'            => TITLE_INDEX_PANEL,
                'tlp_meta_description' => '',
                'tlp_meta_keywords'    => '',
                'tlp_title_section'    => "Acceder al Sistema",
                'content_footer'       => array(
                    'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
                    'web-amigas'          => $this->contents_model->get_content('web-amigas')
                )
            ));
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