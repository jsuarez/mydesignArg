<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Setup_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get($where){
        $list = $this->db->get(TBL_SETUP, $where)->result_array();
        $arr = Array();
        foreach( $list as $row ){
            $arr[$row['var']] = $row['value'];
        }
        return $arr;
    }

    
}
?>