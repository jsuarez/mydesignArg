<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        $this->load->model('contents_model');
        $this->load->model('portfolio_model');

        $meta = $this->setup_model->get(array('type'=>'meta'));
        $this->_data = array(
            'tlp_title'            => $meta['title_general'],
            'tlp_meta_description' => $meta['description_general'],
            'tlp_meta_keywords'    => $meta['keywords_general'],
            'content_footer' => array(
                'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
                'web-amigas'          => $this->contents_model->get_content('web-amigas')
            )
        );
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->assets->add_css('view_portfolio');
        $this->assets->add_js(array('plugins/formatnumber/formatnumber.min', 'class/portfolio'));
        $this->_render('front/portfolio_view', array_merge($this->_data, array(
            'tlp_title_section'    => 'Nuestros clientes',
            'listClients'          => $this->portfolio_model->get_list_clients(),
            'listWorks'            => $this->portfolio_model->get_list_works()
        )));
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}