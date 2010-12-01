<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("contents_model");
        $this->load->model("portfolio_model");

        $this->_data = array(
            'tlp_title'           => TITLE_INDEX_PANEL,
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
            'tlp_script'          => array('helpers_json', 'class_portfolio_list'),
            'tlp_script_special'  => array('plugins_jqui_tabs', 'plugins_jqui_sortable'),
            'tlp_section'         => 'panel/portfolio_list_view.php',
            'tlp_title_section'   => "Portfolio",
            'list'                => $this->portfolio_model->get_list_works()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function workform(){
        $id = $this->uri->segment(4);

        $data = array_merge($this->_data, array(
            'tlp_title'          => TITLE_INDEX_PANEL,
            'tlp_section'        => 'panel/portfolio_form_works_view.php',
            'tlp_script'         => array('helpers_json', 'plugins_validator', 'class_portfolio_form')
        ));
        if( is_numeric($id) ){ //EDIT
            $info = $this->portfolio_model->get_info_works($id);
            $data['tlp_title_section'] = "Portfolio Trabajo - Edicion";
            $data['info'] = $info;
        }else{                 //NUEVO
            $data['tlp_title_section'] = "Portfolio Trabajo - Nuevo";
        }
        $this->load->view('template_panel_view', $data);
    }

    public function clientsform(){
        $id = $this->uri->segment(4);

        $data = array_merge($this->_data, array(
            'tlp_title'          => TITLE_INDEX_PANEL,
            'tlp_section'        => 'panel/portfolio_form_clients_view.php',
            'tlp_script'         => array('helpers_json', 'plugins_validator', 'class_portfolio_form')
        ));
        if( is_numeric($id) ){ //EDIT
            $info = $this->portfolio_model->get_info_clients($id);
            $data['tlp_title_section'] = "Portfolio Clientes - Edicion";
            $data['info'] = $info;
        }else{                 //NUEVO
            $data['tlp_title_section'] = "Portfolio Clientes - Nuevo";
        }
        $this->load->view('template_panel_view', $data);
    }

    public function workcreate(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->portfolio_model->work_create();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                $this->session->set_flashdata('error', $this->portfolio_model->error);
                redirect('/jpanel/portfolio/workform/');
            }else redirect('/jpanel/portfolio/');

        }
    }

    public function workedit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->portfolio_model->work_edit();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                $this->session->set_flashdata('error', $this->portfolio_model->error);
                redirect('/jpanel/portfolio/workform/'.$this->input->post('id'));
            }else redirect('/jpanel/portfolio/');
        }
    }

    public function cliecreate(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->portfolio_model->clie_create();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                $this->session->set_flashdata('error', $this->portfolio_model->error);
                redirect('/jpanel/portfolio/clieform/');
            }else redirect(site_url('jpanel/portfolio/').'#ui-tabs-2');

        }
    }

    public function clieedit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->portfolio_model->clie_edit();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                $this->session->set_flashdata('error', $this->portfolio_model->error);
                redirect('/jpanel/portfolio/clieform/'.$this->input->post('id'));
            }else redirect(site_url('jpanel/portfolio/').'#ui-tabs-2');
        }
    }

    public function delete(){
        if( $this->uri->segment(4) ){
            $id = $this->uri->segment_array();
            array_splice($id, 0,4);

            $res = $this->portfolio_model->delete($id, $this->uri->segment(4));

            $this->session->set_flashdata('status', $res ? "success" : "error");

            if( $this->uri->segment(4)=="work" ){
                redirect('/jpanel/portfolio/');
            }else{
                redirect(site_url('jpanel/portfolio/').'#ui-tabs-2');
            }
        }
    }

    public function view(){
        $data = array('list' => $this->uri->segment(4)=="work" ? $this->portfolio_model->get_list_works() : $this->portfolio_model->get_list_clients());
        $this->load->view('panel/ajax/'.$this->uri->segment(5).'_view', $data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_upload_products(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $this->load->library('superupload');

            $config = array(
                'path'          => $this->input->post('path').'.tmp/',
                'thumb_width'   => $this->input->post('width'),
                'thumb_height'  => $this->input->post('height'),
                'maxsize'       => UPLOAD_MAXSIZE,
                'filetype'      => UPLOAD_FILETYPE,
                'resize_image_original' => false,
                'master_dim'            => 'width',
                'filename_prefix'       => $this->session->userdata('users_id')."_"
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload('txtThumb'));
        }
    }
    public function ajax_upload_delete(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            @unlink($_POST['au_filename_image']);
            @unlink($_POST['au_filename_thumb']);
            die("ok");
        }
    }
    public function ajax_order(){
        die($this->portfolio_model->order() ? "success" : "error");
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>