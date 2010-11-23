<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

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
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->show();
    }

    public function show(){
        $params = $this->_get_params($this->uri->segment(1));

        $data = array_merge($this->_data, array(
            'tlp_title'            => $params['title'],
            'tlp_title_section'    => $params['title_section'],
            'tlp_meta_description' => $params['meta_description'],
            'tlp_meta_keywords'    => $params['meta_keywords'],
            'tlp_section'          => 'frontpage/servicios_view.php',
            'tlp_script'           => array('plugins_jqueryflip', 'plugins_cycle', 'plugins_carousel', 'class_services_front'),
            'list_services'        => $this->services_model->get_list_services($params['reference']),
            'list_banners'         => $this->contents_model->get_list_banners($params['reference']),
            'reference'            => $params['reference']
        ));
        $this->load->view('template_frontpage_view', $data);
    }

    public function moreinfo(){
        $ref1 = $this->uri->segment(1);
        $ref2 = $this->uri->segment(2);

        $params = $this->_get_params($ref1);
        $info = $this->services_model->get_service($ref1, $ref2);

        $data = array_merge($this->_data, array(
            'tlp_title'            => $params['title'],
            'tlp_title_section'    => $info['title'],
            'tlp_meta_description' => $params['meta_description'],
            'tlp_meta_keywords'    => $params['meta_keywords'],
            'tlp_section'          => 'frontpage/servicios_masinfo_view.php',
            'tlp_script'           => array('plugins_carousel', 'class_services_front'),
            'info'                 => $info,
            'reference'            => $params['reference']
        ));
        $data = array_merge($this->_data, $data);
        $this->load->view('template_frontpage_view', $data);
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_params($ref){
         switch($ref){
             case 'disenio_web': default:
                 return array(
                     'reference'        => "disenio_web",
                     'title_section'    => 'Dise&ntilde;o de P&aacute;ginas Web',
                     'title'            => TITLE_DISENIOWEB,
                     'meta_description' => META_KEYWORDS_DISENIOWEB,
                     'meta_keywords'    => META_KEYWORDS_DISENIOWEB
                 );
             break;
             case 'disenio_grafico':
                 return array(
                     'reference'        => "disenio_grafico",
                     'title_section'    => 'Dise&ntilde;o Gr&aacute;fico',
                     'title'            => TITLE_DISENIOGRAFICO,
                     'meta_description' => META_KEYWORDS_DISENIOGRAFICO,
                     'meta_keywords'    => META_KEYWORDS_DISENIOGRAFICO
                 );
             break;
             case 'marketing_online':
                 return array(
                     'reference'        => "marketing_online",
                     'title_section'    => 'Marketing Online',
                     'title'            => TITLE_MARKETINGONLINE,
                     'meta_description' => META_KEYWORDS_MARKETINGONLINE,
                     'meta_keywords'    => META_KEYWORDS_MARKETINGONLINE
                 );
             break;
         }
    }

}