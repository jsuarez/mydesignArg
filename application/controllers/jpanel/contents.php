<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contents extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();
        if( !$this->session->userdata('logged_in') ) redirect('/jpanel/');
        
        $this->load->model("contents_model");

        $this->_data = array(
            'tlp_title'           => TITLE_INDEX_PANEL,
            'tlp_title_section'   => "Contenidos",
            'content_footer'      => array(
                 'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
                 'web-amigas'          => $this->contents_model->get_content('web-amigas')
            )
        );
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->assets->add_js('class/contents');
        $this->assets->add_js_group(array('plugins_tiny_mce'), false);
        $this->assets->add_js('plugins/jquery-ui.sortable/jquery-ui-1.8.2.custom.min', false);
        $this->_render('panel/contents_view', array_merge($this->_data, array(
            'listPages' => $this->contents_model->get_list()
        )), 'panel_view');
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