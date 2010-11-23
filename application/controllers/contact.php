<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();
        $this->load->library('email');
        $this->load->library('user_agent');
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

            $phone = $this->input->post('txtPhoneNum');
            if( $this->input->post('txtPhoneCode')!='' ) $phone = $this->input->post('txtPhoneCode').' - '.$phone;
            $ip = $_SERVER['REMOTE_ADDR'];
            
            $message = EMAIL_CONTACT_MESSAGE;
            $message = str_replace('{name}', $this->input->post('txtName'), $message);
            $message = str_replace('{phone}', $phone, $message);
            $message = str_replace('{email}', $this->input->post('txtEmail'), $message);
            $message = str_replace('{message}', $this->input->post('txtConsult'), $message);
            $message = str_replace('{ip}', $ip, $message);
            $message = str_replace('{browser}', $this->_get_browser(), $message);
            $message = str_replace('{so}', $this->agent->platform(), $message);

            //die($message);

            $this->email->from($this->input->post('txtEmail'), $this->input->post('txtName'));
            $this->email->to(EMAIL_CONTACT_TO);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message(nl2br($message));
            
            die(json_encode($this->email->send()));
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

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
                $this->session->set_flashdata('error_email2', ERR_VALID_EMAIL);
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