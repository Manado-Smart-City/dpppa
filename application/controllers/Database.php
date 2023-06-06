<?php
	/*
    @Copyright Diskominfo Kota Manado
    @Class Name : Home(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Database extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('Model_pegawai');

	}

	public function pegawai() {
		
		$listpejabat = $this->Model_pegawai->list_pegawai();
	
		$data= array(	
						'title'		=> 'Badan Pemberdayaan Perempuan | Pemerintah Kota Manado',
						'listpejabat' => $listpejabat,
						'content'	=> 'web/pegawai_view');
		$this->load->view('web/index',$data);

	}

	function pegawai_detail($slug) {
	
		$data = $this->Model_pegawai->get_detpegawai($slug);

		$query = $this->model_utama->view_where('pejabat',array('slug' => $this->uri->segment(3)));
		if($query->num_rows()<=0){
			redirect('home');
		}else{
		$data = array (
			'title'		=> 'Pegawai Badan Pemberdayaan Perempuan Pemerintah Kota Manado',
			'nama' => $data[0]['nama_pejabat'],
			'jabatan' => $data[0]['jabatan'],
			'nip' => $data[0]['nip'],
			'agama' => $data[0]['agama'],
			'ttl' => $data[0]['ttl'],
			'jeniskelamin' => $data[0]['jenis_kelamin'],
			'pangkat' => $data[0]['pangkat_gol'],	
			'pendidikan' => $data[0]['pend_terakhir'],	
			'tmtpangkat' => $data[0]['tmt_pangkat'],	
			'tmtjabatan' => $data[0]['tmt_jabatan'],	
			'foto' => $data[0]['foto'],	
			'content'	=> 'web/pegawaidetail_view');
		$this->load->view('web/index',$data);
			
	}
	}
	
	
}