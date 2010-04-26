<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('portfolio_model');
        $this->load->library('dataview', array(
            'tlp_section'     => 'frontpage/portfolio_view.php',
            'tlp_title'       => TITLE_PORTFOLIO,
            'tlp_script'      => 'gallery'
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $info = $this->portfolio_model->list_portfolio();

        $this->_data = $this->dataview->set_data(array(
            'tlp_title_section' => 'Portfolio',
            'info'              => $info
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

}
?>