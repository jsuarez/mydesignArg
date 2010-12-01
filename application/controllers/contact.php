<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();
        $this->load->library('email');
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->_valid();

            $this->load->model('contact_model');

            $phone = $this->input->post('txtPhoneNum');
            if( $this->input->post('txtPhoneCode')!='' ) $phone = $this->input->post('txtPhoneCode').' - '.$phone;
            
            $message = EMAIL_CONTACT_MESSAGE;
            $message = str_replace('{name}', $this->input->post('txtName'), $message);
            $message = str_replace('{phone}', $phone, $message);
            $message = str_replace('{email}', $this->input->post('txtEmail'), $message);
            $message = str_replace('{message}', nl2br($this->input->post('txtConsult')), $message);

            //die($message);
            $this->contact_model->save();
            
            $this->email->from($this->input->post('txtEmail'), $this->input->post('txtName'));
            $this->email->to(EMAIL_CONTACT_TO);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message($message);
            
            die(json_encode($this->email->send()));
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
     private function _valid(){
         $error=false;
        if( !$this->input->post('txtName') ){
            $this->session->set_flashdata('error_name', sprintf(ERR_VALID_REQUIRED, "Nombre"));
            $error=true;
        }
        if( !$this->input->post('txtPhoneNum') ){
            $this->session->set_flashdata('error_phone', sprintf(ERR_VALID_REQUIRED, "Tel&eacute;fono"));
            $error=true;
        }
        if( !$this->input->post('txtEmail') ){
            $this->session->set_flashdata('error_email', sprintf(ERR_VALID_REQUIRED, "Email"));
            $error=true;
        }else{
            if( !preg_match(
            '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
            $this->input->post('txtEmail'))) {
                $this->session->set_flashdata('error_email', ERR_VALID_EMAIL);
                $error=true;
            }
        }
        if( !$this->input->post('txtConsult') ){
            $this->session->set_flashdata('error_consult', sprintf(ERR_VALID_REQUIRED, "Consulta"));
            $error=true;
        }
        if( $error ) redirect($this->config->item('base_url'));
     }


}