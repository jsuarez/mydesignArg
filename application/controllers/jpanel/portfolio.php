<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();
        if( !$this->session->userdata('logged_in') ) redirect('/jpanel/');
        
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


    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->assets->add_js_group(array('helpers_json'));
        $this->assets->add_js_group(array('plugins_jqui_tabs'), false);
        $this->assets->add_js(array('class/portfolio_list'));
        $this->assets->add_js('plugins/jquery-ui.sortable/jquery-ui-1.8.2.custom.min', false);

        $this->_render('panel/portfolio_list_view', array_merge($this->_data, array(
            'tlp_title_section'   => "Portfolio",
            'list'                => $this->portfolio_model->get_list_works()
        )), 'panel_view');
    }

    public function workform(){
        $id = $this->uri->segment(4);

        $data = array_merge($this->_data, array(
            'tlp_title'          => TITLE_INDEX_PANEL,
        ));
        if( is_numeric($id) ){ //EDIT
            $info = $this->portfolio_model->get_info_works($id);
            $data['tlp_title_section'] = "Portfolio Trabajo - Edicion";
            $data['info'] = $info;
        }else{                 //NUEVO
            $data['tlp_title_section'] = "Portfolio Trabajo - Nuevo";
        }

        $this->assets->add_js_group(array('helpers_json', 'plugins_validate'));
        $this->assets->add_js(array('class/portfolio_form'));
        $this->_render('panel/portfolio_form_works_view', $data, 'panel_view');
    }

    public function clientsform(){
        $id = $this->uri->segment(4);

        $data = array_merge($this->_data, array(
            'tlp_title'          => TITLE_INDEX_PANEL,
        ));
        if( is_numeric($id) ){ //EDIT
            $info = $this->portfolio_model->get_info_clients($id);
            $data['tlp_title_section'] = "Portfolio Clientes - Edicion";
            $data['info'] = $info;
        }else{                 //NUEVO
            $data['tlp_title_section'] = "Portfolio Clientes - Nuevo";
        }
        $this->assets->add_js_group(array('helpers_json', 'plugins_validate'));
        $this->assets->add_js(array('class/portfolio_form'));
        $this->_render('panel/portfolio_form_clients_view', $data, 'panel_view');
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