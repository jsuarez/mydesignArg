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
        switch($this->uri->segment(1)){
            case 'empresa':
                $reference = "empresa";
                $title_section = 'Empresa';
                $title = TITLE_EMPRESA;
                $meta_description = META_KEYWORDS_EMPRESA;
                $meta_keywords = META_KEYWORDS_EMPRESA;
            break;
            case 'politicas-de-privacidad':
                $reference = "politicas-de-privacidad";
                $title_section = 'Pol&iacute;ticas de Privacidad';
                $title = TITLE_POLITICAS;
                $meta_description = META_KEYWORDS_POLITICAS;
                $meta_keywords = META_KEYWORDS_POLITICAS;
            break;
            case 'terminos-y-condiciones':
                $reference = "terminos-y-condiciones";
                $title_section = 'Terminos y Condiciones';
                $title = TITLE_TERMINOS;
                $meta_description = META_KEYWORDS_TERMINOS;
                $meta_keywords = META_KEYWORDS_TERMINOS;
            break;
            case 'preguntas-frecuentes':
                $reference = "preguntas-frecuentes";
                $title_section = 'Preguntas Frecuentes';
                $title = TITLE_FAQ;
                $meta_description = META_KEYWORDS_FAQ;
                $meta_keywords = META_KEYWORDS_FAQ;
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