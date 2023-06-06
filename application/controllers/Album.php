<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('Model_galeri');
	}
	
	public function index() {
		//$jumlah= $this->model_utama->view_where('gallery',array('id_album' => $row['id_album']))->num_rows();
		$jumlah= $this->model_utama->view('gallery')->num_rows();
		$config['base_url'] = base_url().'album/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] =10; 	
			if ($this->uri->segment('3')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('3');
			}
		$data['title'] = "Album Galeri";
		//$data['description'] = description();
		//$data['keywords'] = keywords();
			if (is_numeric($dari)) {
				//$data['row'] = $this->model_utama->view_join_one('gallery','album','id_album',array('gallery.id_album' => $row['id_album']),'id_gallery','DESC',$dari,$config['per_page']);
				$data['row'] = $this->model_app->view_ordering_limit('gallery','id_gallery','DESC',$dari,$config['per_page']);
			}else{
				redirect('home');
			}
		$this->pagination->initialize($config);
			$dat = array(
			'content'=> 'web/galeri_view');
		$this->load->view('web/webview', $data + $dat);
		//$this->template->load(template().'/template',template().'/album',$data);

	}

	public function detail(){
		$query = $this->model_utama->view_where('album',array('slug' => $this->uri->segment(3)));
		if ($query->num_rows()<=0){
			redirect('home');
		}else{
			$row = $query->row_array();
			$jumlah= $this->model_utama->view_where('gallery',array('id_album' => $row['id_album']))->num_rows();
			$config['base_url'] = base_url().'album/detail/'.$this->uri->segment(3);
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 3;
			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}
			$data['title'] = "Album $row[jdl_album]";
			$data['judul'] = "$row[jdl_album]";
			$data['rows'] = $row;
			if (is_numeric($dari)){
				$data['detailalbum'] = $this->model_utama->view_join_one('gallery','album','id_album',array('gallery.id_album' => $row['id_album']),'id_gallery','DESC',$dari,$config['per_page']);
			}else{
				redirect('Home');
			}
			$this->pagination->initialize($config);
			$dat = array(
			'content'=> 'web/galeri_detail_view');
			$this->load->view('web/webview', $dat + $data);
		}
	}	

}