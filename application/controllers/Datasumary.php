<?php
	/*
    @Copyright PPID
    @Class Name : Home(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasumary extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('m_sumary');
		
	}
	
	// Main Page Home
	public function index() {
		$jumlah_data = $this->m_sumary->all_datasumary();
		//$jumlah_data = $this->m_berita->all_berita();
		$jumlah_data = count($jumlah_data);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Datasumary/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		//mulai
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo &laquo';
        $config['last_link'] = '&raquo &raquo';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#" color: white;">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		//end
		$this->pagination->initialize($config);
        $info = $this->m_sumary->page_datasumary($config['per_page'],$from);

		$data = array(
			'title'=>'Datasumary',
			'info' => $info,
			'jumlah' => $jumlah_data,
			'content'	=> 'web/datasummary');
		$this->load->view('web/index',$data);
	}

		function det_info($id) {
		$data = $this->m_sumary->get_datasumary($id);
		$data = array (
			'title'		=> 'Detail Info Publik',
			'id' => $id,
			'judul' => $data[0]['judul'],
			'tgl' => $data[0]['tanggal'],
			'file' => $data[0]['file'],
			'kategori' => $data[0]['kategori'],
			'isi_informasi' => $data[0]['isi_informasi'],

			'content'		=> 'web/detail_informasi');
	
		$this->load->view('web/index', $data);
	}
	
}