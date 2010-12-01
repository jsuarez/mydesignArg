<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Content extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();
        $this->load->model('contents_model');
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
            break;
            case 'sitemap':
                $reference = "sitemap";
                $title_section = 'Mapa del sitio';
                $title = $meta['title_general'];
                $meta_description = $meta['description_general'];
                $meta_keywords = $meta['keywords_general'];
            break;
            default: die();
        }
        $data = array_merge($this->_data, array(
            'tlp_title'            => $title,
            'tlp_title_section'    => $title_section,
            'tlp_meta_description' => $meta_description,
            'tlp_meta_keywords'    => $meta_keywords,
            'tlp_section'          => 'frontpage/content_view.php',
            'content'              => $this->contents_model->get_content($reference)
        ));
        $this->load->view('template_frontpage_view', $data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}