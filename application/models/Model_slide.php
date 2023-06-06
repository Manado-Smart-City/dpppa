<?php
class Model_slide extends CI_Model {


    function slide_depan() { 
        $this->db->where('posisi', '1');
        $this->db->where('status', 'Y');
        $this->db->order_by('id','DESC');
        $this->db->limit('1');
        return $this->db->get('slide')->result_array();
    }
    function slide_next() {
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', 'Y');
        $this->db->where('posisi', '0');
        $this->db->limit('3');
        return $this->db->get('slide')->result_array();
    }
}