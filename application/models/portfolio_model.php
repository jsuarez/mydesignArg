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
        $this->db->order_by('order', 'asc');
        $query = $this->db->get(TBL_PORTFOLIO);
        return $query->result_array();
    }

    public function list_clients(){
        $this->db->order_by('order', 'asc');
        $query = $this->db->get(TBL_CLIENTS);
        return $query->result_array();
    }


}
?>