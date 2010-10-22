<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Testimoniales extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('contents_model');
        $this->_data = array(
            'tlp_title'            => TITLE_TESTIMONIALES,
            'tlp_meta_description' => META_DESCRIPTION_TESTIMONIALES,
            'tlp_meta_keywords'    => META_KEYWORDS_TESTIMONIALES,
            'content_footer' => array(
                'sitios-recomendados'  => $this->contents_model->get_content('sitios-recomendados'),
                'web-amigas'           => $this->contents_model->get_content('web-amigas')
            )
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $data = array_merge($this->_data, array(
            'tlp_section'       => 'frontpage/testimoniales_view.php',
            'tlp_title_section' => 'Testimoniales'
        ));
        $this->load->view('template_frontpage_view', $data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}