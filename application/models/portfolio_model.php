<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function list_portfolio(){
        return $this->db->get(TBL_PORTFOLIO)->result_array();
    }


}
?>