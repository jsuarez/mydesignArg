<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Testimoniales extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $meta = $this->setup_model->get(array('type'=>'meta'));
        $this->load->model('contents_model');
        $this->_data = array(
            'tlp_title'            => $meta['title_general'],
            'tlp_meta_description' => $meta['description_general'],
            'tlp_meta_keywords'    => $meta['keywords_general'],
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