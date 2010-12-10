<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Content extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();
        $this->load->model('contents_model');
        $this->_data = array('content_footer'=>array(
            'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
            'web-amigas'          => $this->contents_model->get_content('web-amigas')
        ));
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $meta = $this->setup_model->get(array('type'=>'meta'));
        switch($this->uri->segment(1)){
            case 'la_empresa':
                $reference = "la_empresa";
                $title_section = 'Empresa';
                $title = $meta['title_general'];
                $meta_description = $meta['description_general'];
                $meta_keywords = $meta['keywords_general'];
            break;
            case 'politicas-de-privacidad':
                $reference = "politicas-de-privacidad";
                $title_section = 'Pol&iacute;ticas de Privacidad';
                $title = $meta['title_general'];
                $meta_description = $meta['description_general'];
                $meta_keywords = $meta['keywords_general'];
            break;
            case 'faq':
                $reference = "faq";
                $title_section = 'Preguntas Frecuentes';
                $title = $meta['title_general'];
                $meta_description = $meta['description_general'];
                $meta_keywords = $meta['keywords_general'];
                $this->assets->add_css('view_faq');
            break;
            case 'sitemap':
                $reference = "sitemap";
                $title_section = 'Mapa del sitio';
                $title = $meta['title_general'];
                $meta_description = $meta['description_general'];
                $meta_keywords = $meta['keywords_general'];
                $this->assets->add_css('view_sitemap');
            break;
            default: die();
        }

        $this->assets->add_js(array('plugins/formatnumber/formatnumber.min'));
        $this->_render('front/content_view', array_merge($this->_data, array(
            'tlp_title'            => $title,
            'tlp_title_section'    => $title_section,
            'tlp_meta_description' => $meta_description,
            'tlp_meta_keywords'    => $meta_keywords,
            'content'              => $this->contents_model->get_content($reference)
        )));
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}