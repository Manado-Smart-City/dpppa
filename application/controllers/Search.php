<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index(){

		if (isset($_POST['submit'])) {
			$data['ringkasan'] = $this->db->escape_str($this->input->post('cari'));
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
	$injeksi = preg_match("/^[a-zA-Z]*$/", $data['ringkasan']);
    if(!$injeksi){
    Redirect('');
        }else{
		$this->load->model('M_berita');
		$this->load->library('pagination');
		$this->db->like('judul', $data['ringkasan']);
        $this->db->from('berita');
		// pagination limit
		$config['base_url'] = base_url().'search/index/page/';
		$config['total_rows'] = $this->db->count_all_results();
		
		$config['per_page']="5";
		$config['uri_segment']=4;
		$config['num_links']=5;
		$this->pagination->initialize($config);

		$data['ListBerita'] = $this->M_berita->ambildata($config['per_page'],$this->uri->segment(4),$data['ringkasan']);
		$this->load->vars($data);
		$dat = array(
			'title'=>'Search | &nbsp;'.$data['ringkasan'] ,				
			'content'=> 'web/search_view');
		$this->load->view('web/index', $dat);
        }
	}
}
	
	
