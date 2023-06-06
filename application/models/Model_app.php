<?php 
class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_ordering_limit1($table,$order,$ordering,$baris){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($baris);
        return $this->db->get($table)->result_array();
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
    }

    function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik  GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function hits(){
        return $this->db->query("SELECT SUM(hits) as total FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY tanggal");//jumlah hits hari ini
    }

    function hits_dan_pengunjung(){
     return $this->db->query("SELECT count(*) as jumlah, SUM(hits) as hitss, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function info_publik($idinfo) {
        $this->db->where('id_kategori', $idinfo);
        return $this->db->get('kategori')->result_array();
    }
    
    
    //function filter_bukti_tayang($table, $tanggal_mulai, $tanggal_selesai,$order, $ordering){
    //$this->db->order_by($order,$ordering);
   // $this->db->where('tahun',$tahun);
   // return $this->db->get_where($table, array('tanggal' => $tanggal_mulai//,'between','tanggal'=>$tanggal_selesai ))->result();
   // }
   
   function filter_bukti_tayang($tanggal_mulai,$tanggal_selesai){
         return $this->db->query("SELECT * FROM berita  WHERE tanggal between '$tanggal_mulai' AND '$tanggal_selesai' ORDER BY tanggal ASC")->result();
   }


    function delete_berita($id){
     $this->db->where('id_berita',$id);
     $query = $this->db->get('berita');
     $row = $query->row();
     unlink("./asset/foto_berita/$row->gambar");
     $this->db->delete('berita', array('id_berita' => $id));
    }

    function delete_slide($id){
     $this->db->where('id',$id);
     $query = $this->db->get('slide');
     $row = $query->row();
     unlink("./asset/img_slide/$row->slide");
     $this->db->delete('slide', array('id' => $id));
    }

    function delete_baner($id){
     $this->db->where('id',$id);
     $query = $this->db->get('banner');
     $row = $query->row();
     unlink("./asset/foto_baner/$row->gambar");
     $this->db->delete('banner', array('id' => $id));
    }

    function delete_gallery($id){
     $this->db->where('id_gallery',$id);
     $query = $this->db->get('gallery');
     $row = $query->row();
     unlink("./asset/img_galeri/$row->gbr_gallery");
     $this->db->delete('gallery', array('id_gallery' => $id));
    }

    function delete_pegawai($id){
     $this->db->where('id_pejabat',$id);
     $query = $this->db->get('pejabat');
     $row = $query->row();
     unlink("./asset/foto_pegawai/$row->foto");
     $this->db->delete('pejabat', array('id_pejabat' => $id));
    }
}