<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Load extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->helper('file');

        $this->_uri = $this->uri->segment_array();
        unset($this->_uri[1]);
        unset($this->_uri[2]);
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_uri;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        redirect($this->config->item('base_url'));
    }

    public function js(){
        header('Content-Type: text/javascript');
        $LOAD="js";
        foreach ( $this->_uri as $filename ){
            $arr = array();
            require('./js/includes/'.$filename.'_inc.php');

            foreach ( $arr as $val ){
                if( $val=="baseuri" ) {
                    $indexphp = index_page();
                    if( !empty($indexphp) ) $indexphp.="/";
                    echo 'var baseURI = document.getElementsByTagName("base")[0].getAttribute("href")+"'.$indexphp.'";';
                    echo 'var url_suffix = "'.$this->config->item('url_suffix').'";';
                }
                echo read_file('./js/'.$val.".js");
            }
        }
    }

    public function css(){
        header('Content-Type: text/css');

        $LOAD="css";
        $output="";
        foreach ( $this->_uri as $filename ){
            $arr = array();

            if( $filename=="initializer" ){
               $output.= read_file('./css/blueprint/screen'.$this->config->item('sufix_pack_css').'.css');
               $output.= read_file('./css/style'.$this->config->item('sufix_pack_css').'.css');
            }elseif( $filename=="initializer_panel" ){
               $output.= read_file('./css/blueprint/screen'.$this->config->item('sufix_pack_css').'.css');
               $output.= read_file('./css/style'.$this->config->item('sufix_pack_css').'.css');
               $output.= read_file('./css/style_panel'.$this->config->item('sufix_pack_css').'.css');

            }else{
                require('./js/includes/'.$filename.'_inc.php');

                foreach ( $arr as $val ){
                   $output.= read_file($val.".css");
                }
            }
        }
        echo str_replace("{BASE_URL}", $this->config->item('base_url'), $output);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}