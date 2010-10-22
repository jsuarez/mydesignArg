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
            $phone = $_POST['txtPhoneNum'];
            if( !empty($_POST['txtPhoneCode']) ) $phone = $_POST['txtPhoneCode'].' - '.$phone;
            $ip = $_SERVER['REMOTE_ADDR'];
            
            $message = EMAIL_CONTACT_MESSAGE;
            $message = str_replace('{name}', $_POST['txtName'], $message);
            $message = str_replace('{phone}', $phone, $message);
            $message = str_replace('{email}', $_POST['txtEmail'], $message);
            $message = str_replace('{message}', $_POST['txtConsult'], $message);
            $message = str_replace('{ip}', $ip, $message);
            $message = str_replace('{browser}', $this->_get_browser(), $message);
            $message = str_replace('{so}', $this->agent->platform(), $message);

            //die($message);

            $this->email->from($_POST['txtEmail'], $_POST['txtName']);
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


}