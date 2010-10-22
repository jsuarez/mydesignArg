<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Services extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

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
       /*$this->load->library('encpss');
       echo $this->encpss->encode('1234');
       die();*/
        $params = $this->_get_params($this->uri->segment(4));
        $data = array_merge($this->_data, array(
            'tlp_title'            => TITLE_INDEX_PANEL,
            'tlp_title_section'    => $params['title'],
            'tlp_section'          => 'panel/servicios_view.php',
            'tlp_script'           => array('class_services'),
            'list_services'        => $this->services_model->get_list_services($params['reference']),
            'reference'            => $params['reference']
        ));
        $this->load->view('template_panel_view', $data);
    }

    public function form(){
        if( $this->uri->segment(4) ){

            $id = $this->uri->segment(5);
            $params = $this->_get_params($this->uri->segment(4));

            $data = array_merge($this->_data, array(
                'tlp_title'            => TITLE_INDEX_PANEL,
                'tlp_section'          => 'panel/servicios_form_view.php',
                'reference'            => $params['reference']
            ));
            if( is_numeric($id) ){ //EDIT
                $info = $this->services_model->get_info($id);
                $data['tlp_title_section'] = "Editar - ".$info['title'];
                $data['tlp_script'] = array('class_services');
                $data['info'] = $info;
            }else{                 //NUEVO
                $data['tlp_title_section'] = "Nuevo";
                $data['tlp_script'] = array('helpers_json', 'class_services', 'plugins_validator', 'plugins_picturegallery');
                $data['tlp_script_special'] = array('plugins_tiny_mce', 'plugins_jqui_sortable');
            }
            $this->load->view('template_panel_view', $data);

        }
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->services_model->create();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                redirect('/jpanel/services/form/'.$this->input->post('reference'));
            }else redirect('/jpanel/services/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->services_model->edit();
            $this->session->set_flashdata('status', $res ? "success" : "error");
            redirect('/jpanel/services/form/'.$this->input->post('bodas_id'));
        }
    }

    public function delete(){
        if( $this->uri->segment(4) ){
            $id = $this->uri->segment_array();
            array_splice($id, 0,3);
            $res = $this->bodas_model->delete($id);

            $this->session->set_flashdata('status', $res ? "success" : "error");

            redirect('/jpanel/services/');
        }
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
            @unlink($_POST['au_filename_image']);
            @unlink($_POST['au_filename_thumb']);
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