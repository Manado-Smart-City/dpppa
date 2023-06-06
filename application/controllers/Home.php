<?php
	/*
    @Copyright diskominfo manado
    @Class Name : Home(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();

		
		$this->load->model('m_berita');
	}
	
	// Main Page Home
	public function index() {

		$query = $this->m_berita->show_home();
		
		$data= array(
						'title'		=> 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',		
						'berita'	=> $query,
						'content'	=> 'web/home');
		
		$this->load->view('web/index',$data);
	}

}