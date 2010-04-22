<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_section'     =>  'frontpage/disenioweb_view.php',
            'tlp_title'       =>  TITLE_DISENIOWEB,
            'tlp_script'      => 'nivoslider'
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->_data = $this->dataview->set_data(array(
            'tlp_title_section' => 'Dise&ntilde;o Web'
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_sendform(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            
            $this->load->library('email');
            $this->load->helper('form');
            
            $message = sprintf(EMAIL_CONTACT_MESSAGE,
                    date('d-m-Y H:i:s'),
                    $_POST['txtName'],
                    $_POST['txtEmail'],
                    $_POST['txtPhone'],
                    nl2br($_POST['txtConsult'])
            );

            $this->email->from($_POST['txtEmail'], $_POST['txtName']);
            $this->email->to(EMAIL_CONTACT_TO);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message($message);
            if( $this->email->send() ){
                die("ok");
            }else {
                die("error");
            }
        }
        
    }

}
?>