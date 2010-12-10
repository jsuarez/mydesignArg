<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Testimoniales extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

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


    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->assets->add_js(array('plugins/formatnumber/formatnumber.min'));
        $this->_render('front/testimoniales_view.php', array_merge($this_>data, array(
            'tlp_title_section' => 'Testimoniales'
        )));
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}