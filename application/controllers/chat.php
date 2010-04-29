<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Chat extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->view('chat_view');
    }

}
?>