<?php
class Model_pegawai extends CI_Model {

    function list_pegawai() {
        $this->db->order_by('id_pejabat','ASC');
        return $this->db->get('pejabat')->result_array();
    }

    function get_detpegawai($slug) {
        $this->db->where('slug', $slug);
        $res = $this->db->get('pejabat');
        return $res->result_array();
    }

}