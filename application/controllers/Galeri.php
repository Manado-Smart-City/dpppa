<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
	function __construct(){
		parent::__construct();

	}
	
	public function index() {
		$jumlah= $this->model_utama->view('gallery')->num_rows();
		$config['base_url'] = base_url().'galeri/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] =12; 	
			if ($this->uri->segment('3')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('3');
			}
		$data['title'] = "Galeri";

			if (is_numeric($dari)) {
	
				$data['row'] = $this->model_app->view_ordering_limit('gallery','id_gallery','DESC',$dari,$config['per_page']);
			}else{
				redirect('home');
			}
		$this->pagination->initialize($config);
			$dat = array(
			'content'=> 'web/galeri_view');
		$this->load->view('web/index', $data + $dat);


	}


}