<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Faq extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/faq_view.php',
            'tlp_title'            =>  TITLE_FAQ,
            'tlp_meta_keywords'    =>  META_KEYWORDS_FAQ,
            'tlp_meta_description' =>  META_DESCRIPTION_FAQ
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
            'tlp_title_section' => 'Preguntas Frecuentes'
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>