<?php
	/*
    @Copyright Dinas Kominfo Kota
    @Class Name : Home(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
		
	public function visi_misi() {
		$data= array(	'title'		=> 'Visi Dan Misi',									
						'content'	=> 'web/visimisi_view');
		$this->load->view('web/index',$data);		
	}
	public function tupoksi() {
		$data= array(	'title'		=> 'Tupoksi',									
						'content'	=> 'web/tupoksi_view');
		$this->load->view('web/index',$data);		
	}
	public function kontak() {
		$data= array(	'title'		=> 'Kontak',									
						'content'	=> 'web/kontak');
		$this->load->view('web/index',$data);		
	}

	public function struktur() {
		$data= array(	'title'		=> 'Struktur Organisasi',									
						'content'	=> 'web/struktur_view');
		$this->load->view('web/index',$data);		
	}

	public function layanan_ptpa() {
		$data= array(	'title'		=> 'Pelayanan Terpadu',									
						'content'	=> 'web/ptpa_view');
		$this->load->view('web/index',$data);		
	}

	public function program_kla() {
		$data= array(	'title'		=> 'Kota Layak Anak',									
						'content'	=> 'web/kla_view');
		$this->load->view('web/index',$data);		
	}
	public function pug() {
		$data= array(	'title'		=> 'Pengarusutamaan Gender',									
						'content'	=> 'web/pug_view');
		$this->load->view('web/index',$data);		
	}

	public function konsep_gender() {
		$data= array(	'title'		=> 'Konsep Gender',									
						'content'	=> 'web/konsep_gender_view');
		$this->load->view('web/index',$data);		
	}  	
}