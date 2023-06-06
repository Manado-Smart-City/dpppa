<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengumuman extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		$this->load->model('M_berita');

	}

	public function index() {
		$jumlah_data = $this->M_berita->all_pengumuman();
		$jumlah_data = count($jumlah_data);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'pengumuman/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);

		$this->pagination->initialize($config);
        $pengumuman = $this->M_berita->page_pengumuman($config['per_page'],$from);
		$data = array(
			'title'=>'Pengumuman',
			'page_title'=>'Index Pengumuman',
			'data' => $pengumuman,
			'jumlah' => $jumlah_data,
			'content'=> 'web/listberita');
		$this->load->view('web/index', $data);
	}

	function detail($slug) {
		$query = $this->model_utama->view_where('berita',array('slug' => $this->uri->segment(3)));
		if ($query->num_rows()<=0){
			redirect('home');
		}else{
		$data = $this->M_berita->get_data(array('slug' => $this->uri->segment(3)));
		$data = array (
			'title'		=> 'Detail Pengumuman',
			'gbr' => $data[0]['gambar'],
			'dibaca' => $data[0]['dibaca'],
			'kategori' => $data[0]['id_kategori'],
			'deskripsi' => $data[0]['keterangan_gambar'],
			'judul' => $data[0]['judul'],
			'tgl' => $data[0]['tanggal'],
			'sumber' => $data[0]['username'],
			'isi_berita' => $data[0]['isi_berita'],
			'content'		=> 'web/detail');		
		$this->load->view('web/index', $data);
		$hasil=$this->db->query("update berita set dibaca = dibaca + 1 where slug='$slug' ");
		return $hasil;	
		}

	}
	
}