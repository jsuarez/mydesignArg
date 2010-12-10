<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends My_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::My_Controller();

        $this->load->model('contents_model');
        $this->load->model('services_model');

        $this->assets->add_css('view_services');
        $this->assets->add_js_group(array('plugins_carousel'));
        $this->assets->add_js(array('plugins/jquery.cycle.all.min', 'plugins/formatnumber/formatnumber.min', 'class/services_front'));

        $params = $this->_get_params($this->uri->segment(1, 'index'));
        $this->_data = array(
            'tlp_title'            => $params['title'],
            'tlp_title_section'    => $params['title_section'],
            'tlp_meta_description' => $params['meta_description'],
            'tlp_meta_keywords'    => $params['meta_keywords'],
            'reference'            => $params['reference'],
            'content_footer'       => array(
                'sitios-recomendados'  => $this->contents_model->get_content('sitios-recomendados'),
                'web-amigas'           => $this->contents_model->get_content('web-amigas')
            )
        );

    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->show();
    }

    public function show(){
        $this->_render('front/servicios_view', array_merge($this->_data, array(
            'list_services'        => $this->services_model->get_list_services($this->_data['reference']),
            'list_banners'         => $this->contents_model->get_list_banners($this->_data['reference'])
        )));
    }

    public function moreinfo(){
        $ref1 = $this->uri->segment(1);
        $ref2 = $this->uri->segment(2);

        $info = $this->services_model->get_service($ref1, $ref2);
        $this->_render('front/servicios_masinfo_view', array_merge($this->_data, array(
            'tlp_title_section'    => $info['title'],
            'info'                 => $info
        )));
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_params($ref){
         $meta = $this->setup_model->get(array('type'=>'meta'));

         switch($ref){
             case 'disenio_web': default:
                 return array(
                     'reference'        => 'disenio_web',
                     'title_section'    => 'Dise&ntilde;o de P&aacute;ginas Web',
                     'title'            => $meta['title_disenioweb'],
                     'meta_description' => $meta['description_disenioweb'],
                     'meta_keywords'    => $meta['keywords_disenioweb']
                 );
             break;
             case 'disenio_grafico':
                 return array(
                     'reference'        => "disenio_grafico",
                     'title_section'    => 'Dise&ntilde;o Gr&aacute;fico',
                     'title'            => $meta['title_diseniografico'],
                     'meta_description' => $meta['description_diseniografico'],
                     'meta_keywords'    => $meta['keywords_diseniografico']
                 );
             break;
             case 'marketing_online':
                 return array(
                     'reference'        => "marketing_online",
                     'title_section'    => 'Marketing Online',
                     'title'            => $meta['title_marketingonline'],
                     'meta_description' => $meta['description_marketingonline'],
                     'meta_keywords'    => $meta['keywords_marketingonline']
                 );
             break;
         }
    }

}