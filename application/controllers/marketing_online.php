<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Marketing_online extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('content_model');
        $this->load->model('banner_model');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/content_view.php',
            'tlp_title'            =>  TITLE_MARKETINGONLINE,
            'tlp_meta_keywords'    =>  META_KEYWORDS_MARKETINGONLINE,
            'tlp_meta_description' =>  META_DESCRIPTION_MARKETINGONLINE,
            'tlp_script'           => array('nivoslider', 'info')
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
            'tlp_title_section' => 'Marketing Online',
            'info_content'      => $this->content_model->get_markonline(),
            'info_banner'       => $this->banner_model->get_markonline()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>