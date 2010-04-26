<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Disenio_grafico extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/diseniografico_view.php',
            'tlp_title'            =>  TITLE_DISENIOGRAFICO,
            'tlp_meta_keywords'    =>  META_KEYWORDS_DISENIOGRAFICO,
            'tlp_meta_description' =>  META_DESCRIPTION_DISENIOGRAFICO,
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
            'tlp_title_section' => 'Dise&ntilde;o Gr&aacute;fico'
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>