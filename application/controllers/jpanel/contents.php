<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contents extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("contents_model");

        $this->_data = array(
            'tlp_section'         => 'panel/contents_view.php',
            'tlp_title'           => TITLE_INDEX_PANEL,
            'tlp_title_section'   => "Contenidos",
            'content_footer'      => array(
                 'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
                 'web-amigas'          => $this->contents_model->get_content('web-amigas')
            )
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->_data = array_merge($this->_data, array(
            'tlp_script'         => array('class_contents'),
            'tlp_script_special' => array('plugins_tiny_mce', 'plugins_jqui_sortable'),
            'listPages'          => $this->contents_model->get_list()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_save(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            die($this->contents_model->save() ? "success" : "error");
        }
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>