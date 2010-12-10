<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        $this->load->model('contents_model');
        $this->load->model('services_model');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){}

    public function moreinfo(){
        $id=$this->uri->segment(3);
        if( is_numeric($id) ) {
            $data = array('info' => $this->services_model->get_service($id));
            $this->_render('front/servicios_masinfo_view', $data);
        }
    }

}