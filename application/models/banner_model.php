<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Banner_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_disenioweb(){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_BANNER_DISWEB);
    }

    public function get_diseniografico(){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_BANNER_DISGRAF);
    }

    public function get_markonline(){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_BANNER_MARKONL);
    }

    public function get_servextra(){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_BANNER_SERVEXTRA);
    }



}
?>