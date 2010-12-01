<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();
        $meta = $this->setup_model->get(array('type'=>'meta'));

        $this->load->model('contents_model');
        $this->load->model('portfolio_model');
        $this->_data = array(
            'tlp_title'            => $meta['title_general'],
            'tlp_meta_description' => $meta['description_general'],
            'tlp_meta_keywords'    => $meta['keywords_general'],
            'content_footer'=>array(
                'sitios-recomendados' => $this->contents_model->get_content('sitios-recomendados'),
                'web-amigas'          => $this->contents_model->get_content('web-amigas')
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
            'tlp_section'          => 'frontpage/portfolio_view.php',
            'tlp_title_section'    => 'Nuestros clientes',
            'tlp_script'           => array('class_portfolio'),
            'listClients'          => $this->portfolio_model->get_list_clients(),
            'listWorks'            => $this->portfolio_model->get_list_works()
        ));
        $this->load->view('template_frontpage_view', $data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}