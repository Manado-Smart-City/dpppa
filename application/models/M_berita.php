<?php
class M_berita extends CI_Model {

    function show_home() {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by ('tanggal', 'DESC');
       $this->db->limit('6');
       return $this->db->get()->result_array();
        
    }


    function get_data($where) {
        $this->db->where($where);
        $res = $this->db->get('berita');
        return $res->result_array();
    }

    function all_berita() {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_kategori','berita');
        $this->db->order_by ('tanggal', 'DESC');  
       return $this->db->get()->result_array();
        
    }

    function page($number, $offset) {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->where('status', 'Y');
        $this->db->where('id_kategori', 'berita');
        $res = $this->db->get('berita', $number, $offset);
        return $res->result_array();
    }

    function all_pengumuman() {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_kategori','pengumuman');
        $this->db->order_by ('tanggal', 'DESC');  
       return $this->db->get()->result_array();
        
    }
    
    function all_kla() {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_kategori','kla');
        $this->db->order_by ('tanggal', 'DESC');  
       return $this->db->get()->result_array();
        
    }

    function page_pengumuman($number, $offset) {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->where('status', 'Y');
        $this->db->where('id_kategori', 'pengumuman');
        $res = $this->db->get('berita', $number, $offset);
        return $res->result_array();
    }
    
     function page_kla($number, $offset) {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->where('status', 'Y');
        $this->db->where('id_kategori', 'kla');
        $res = $this->db->get('berita', $number, $offset);
        return $res->result_array();
    }

    function ambildata($perPage, $uri, $ringkasan) {
        $this->db->select('*');
        $this->db->where('status', 'Y');
       
        $this->db->from('berita');
        if (!empty($ringkasan)) {
            $this->db->like('judul', $ringkasan);
        }
        $this->db->order_by('tanggal','DESC');
        $this->db->where('status', 'Y');
        
        $getData = $this->db->get('', $perPage, $uri);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }



}