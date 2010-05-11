<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('portfolio_model');
        $this->load->library('dataview', array(
            'tlp_section'          => 'frontpage/portfolio_view.php',
            'tlp_title'            => TITLE_PORTFOLIO,
            'tlp_meta_keywords'    =>  META_KEYWORDS_PORTFOLIO,
            'tlp_meta_description' =>  META_DESCRIPTION_PORTFOLIO,
            'tlp_script'           => 'portfolio'
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
            'tlp_title_section' => 'Portfolio',
            'info_portfolio'    => $this->portfolio_model->list_portfolio(),
            'info_clients'      => $this->portfolio_model->list_clients()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>