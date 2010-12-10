<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Services extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();
        if( !$this->session->userdata('logged_in') ) redirect('/jpanel/');

        $this->load->model('contents_model');
        $this->load->model('services_model');
        $this->_data = array('content_footer'=>array(
            'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
            'web-amigas'          => $this->contents_model->get_content('web-amigas')
        ));
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $params = $this->_get_params($this->uri->segment(4));
        $this->assets->add_js('class/services_panel');
        $this->assets->add_css('view_services');
        $this->_render('panel/servicios_view', array_merge($this->_data, array(
            'tlp_title'            => TITLE_INDEX_PANEL,
            'tlp_title_section'    => $params['title'],
            'list_services'        => $this->services_model->get_list_services($params['reference']),
            'reference'            => $params['reference']
        )), 'panel_view');
    }

    public function form(){
        if( $this->uri->segment(4) ){

            $id = $this->uri->segment(5);
            $params = $this->_get_params($this->uri->segment(4));

            $this->assets->add_js_group(array('helpers_json', 'plugins_validate'));
            $this->assets->add_js_group(array('plugins_tiny_mce'), false);
            $this->assets->add_js(array('plugins/picturegallery/picturegallery.min', 'class/services_panel'));
            $this->assets->add_js('plugins/jquery-ui.sortable/jquery-ui-1.8.2.custom.min', false);

            $data = array(
                'tlp_title' => TITLE_INDEX_PANEL,
                'reference' => $params['reference']
            );

            if( is_numeric($id) ){ //EDIT
                $info = $this->services_model->get_info($id);
                $data['tlp_title_section'] = "Editar - ".$info['title'];
                $data['info'] = $info;
            }else{   //NUEVO
                $data['tlp_title_section'] = "Nuevo";
            }

            $this->_render('panel/servicios_form_view', array_merge($this->_data, $data), 'panel_view');
        }
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->services_model->create();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                $this->session->set_flashdata('error', $this->services_model->error);
                redirect('/jpanel/services/form/'.$this->input->post('reference'));
            }else redirect('/jpanel/services/index/'.$this->input->post('reference'));
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->services_model->edit();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                $this->session->set_flashdata('error', $this->services_model->error);
                redirect('/jpanel/services/form/'.$this->input->post('reference').'/'.$this->input->post('bodas_id'));
            }else redirect('/jpanel/services/index/'.$this->input->post('reference'));
        }
    }

    public function delete(){        
        $this->services_model->delete($this->uri->segment(5));
        redirect('/jpanel/services/index/'.$this->uri->segment(4));
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_upload_products(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $this->load->library('superupload');

            $config = array(
                'path'          => UPLOAD_PATH_SERVICES_THUMBS .$this->input->post('reference') .'/.tmp/',
                'thumb_width'   => IMAGESIZE_WIDTH_THUMBS,
                'thumb_height'  => IMAGESIZE_HEIGHT_THUMBS,
                'maxsize'       => UPLOAD_MAXSIZE,
                'filetype'      => UPLOAD_FILETYPE,
                'resize_image_original' => false,
                'master_dim'            => 'width',
                'filename_prefix'       => $this->session->userdata('users_id')."_"
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload(key($_FILES)));
        }
    }
    public function ajax_upload_gallery(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $this->load->library('superupload');
            $config = array(
                'path'            => UPLOAD_PATH_SERVICES_GALLERY .$this->uri->segment(4) .'/.tmp/',
                'thumb_width'     => IMAGESIZE_WIDTH_GALLERY,
                'thumb_height'    => IMAGESIZE_HEIGHT_GALLERY,
                'maxsize'         => UPLOAD_MAXSIZE,
                'filetype'        => UPLOAD_FILETYPE,
                'filename_prefix' => $this->session->userdata('users_id')."_",
                'resize_image_original' => false,
                'master_dim'            => 'width',
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload(key($_FILES)));
        }
    }
    public function ajax_upload_delete(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            @unlink($this->input->post('au_filename_image'));
            @unlink($this->input->post('au_filename_thumb'));
            die("ok");
        }
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_params($seg){
        switch($seg){
            case 'disenio_web': default:
                return array(
                    'title'     => "Dise&ntilde;o Web",
                    'reference' => "disenio_web"
                );
            break;
            case 'disenio_grafico':
                return array(
                    'title'     => "Dise&ntilde;o Gr&aacute;fico",
                    'reference' => "disenio_grafico"
                );
            break;
            case 'marketing_online':
                return array(
                    'title'     => "Marketing Online",
                    'reference' => "marketing_online"
                );
            break;
        }
    }

}