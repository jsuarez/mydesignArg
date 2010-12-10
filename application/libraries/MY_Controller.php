<?php
class MY_Controller extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    public function MY_Controller(){
        parent::Controller();
        @include(APPPATH.'config/filters'.EXT);
        $this->ci =& get_instance();
        $this->filter = $filter;
        $this->precontroller('auth');
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $filter;
    private $ci;

    /* PUBLIC PROPERTIES
     **************************************************************************/
    public $_data;


    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function precontroller($filter){
        if( $this->_applies($this->filter[$filter]) ){            
            if( !$this->session->userdata('logged_in') ) {
                $this->ci->assets->add_js_default(array(
                    array('group', array('plugins_jqueryflip', 'plugins_validate')),
                    'general'
                ));
                $this->ci->assets->add_css_default(array('view_sidebar'));
            }else{
                $this->ci->assets->add_js_default(array('general_panel'));
                $this->ci->assets->add_css_default(array('view_sidebar', 'style_panel'));
            }
        }
    }

    public function _render($view, $data=array(), $layout = FALSE, $cache_me=FALSE){
        $this->template->set($data);
        $this->template->current_view = $view;
        $this->template->render($layout, $cache_me);
    }

    public function _post($var = FALSE){
        if($var) return $this->input->post($var);
        else return $this->input->post();

    }



    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _applies($filter_conf) {
        $paths = $filter_conf[1];
        switch ($filter_conf[0]) {
            // exclusion mode
            case 'exclude':
                $apply = TRUE;
                foreach($paths as $path) if ($this->_matches($path)) return FALSE;
                break;
            // inclusion mode
            case 'include':
                $apply = TRUE;
                foreach( $paths as $path ) if ( $this->_matches($path) ) return TRUE;
                break;
            default:
                $this->_error('Bad filter type in config/filters.php - only "exclude" and "include" are valid.');
        }

        return $apply;
    }


    private function _matches($path){
        global $class, $method;

        if ( $path == '*' ) {
            return TRUE;
        } else if ( $path == '/' ) {
            if ($_SERVER['REQUEST_URI'] == '' || $_SERVER['REQUEST_URI'] == '/') return TRUE;
        } else {
            $parts = explode('/', $path);
            if ( $parts[1] == '*' ) {
                if ( $parts[0] == $method ) return TRUE;
            } else if ( strpos($parts[1], ',') !== false ) {
                $subparts = explode( ',', $parts[1] );
                if ( array_search($class, $subparts) !== FALSE ) return TRUE;
            } else {
                if ( $parts[0] == $class && $parts[1] == $method ) return TRUE;
            }
        }
        return FALSE;
    }



}