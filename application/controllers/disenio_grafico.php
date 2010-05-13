<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Disenio_grafico extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('content_model');
        $this->load->model('banner_model');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/content_view.php',
            'tlp_title'            =>  TITLE_DISENIOGRAFICO,
            'tlp_meta_keywords'    =>  META_KEYWORDS_DISENIOGRAFICO,
            'tlp_meta_description' =>  META_DESCRIPTION_DISENIOGRAFICO,
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
            'tlp_title_section' => 'Dise&ntilde;o Gr&aacute;fico',
            'info_content'      => $this->content_model->get_diseniografico(),
            'info_banner'       => $this->banner_model->get_diseniografico()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>