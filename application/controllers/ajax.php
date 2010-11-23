<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('contents_model');
        $this->load->model('services_model');
        $this->_data = array('content_footer'=>array(
            'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
            'web-amigas'          => $this->contents_model->get_content('web-amigas')
        ));
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
    }

    public function moreinfo(){
        $id=$this->uri->segment(3);
        if( is_numeric($id) ) {
            $data = array_merge($this->_data, array('info' => $this->services_model->get_service($id)));
            $this->load->view('frontpage/servicios_masinfo_view', $data);
        }
    }

}