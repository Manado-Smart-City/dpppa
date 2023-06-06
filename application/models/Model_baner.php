<?php
class Model_baner extends CI_Model {
    function all_baner() { 
        $this->db->where('status', 'Y');
        $this->db->order_by('id','DESC');
        $this->db->limit('1');
        return $this->db->get('banner')->result_array();
    }
}