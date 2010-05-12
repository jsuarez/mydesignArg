<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Servicios_extra extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('content_model');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/serviciosextra_view.php',
            'tlp_title'            =>  TITLE_SERVICIOSEXTRA,
            'tlp_meta_keywords'    =>  META_KEYWORDS_SERVICIOSEXTRA,
            'tlp_meta_description' =>  META_DESCRIPTION_SERVICIOSEXTRA,
            'tlp_script'           => 'nivoslider'
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
            'tlp_title_section' => 'Servicios Extra',
            'info'              => $this->content_model->get_servextra()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>