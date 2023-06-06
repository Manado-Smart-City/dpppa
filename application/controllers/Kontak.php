<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kontak extends CI_Controller {
protected $_email;

public function __construct() {
parent::__construct();

//load library email dan form validation
$this->load->library(array('email', 'form_validation','Recaptcha'));

//load helper url
$this->load->helper('url');

//masukan alamat email kamu di sini
$this->_email = 'alexmakasighe2@gmail.com';
}

public function index() {
//load view formulir kontak
$data = array(	
			'title'=>'Kontak',
			'captcha' => $this->recaptcha->getWidget(),
            'script_captcha' => $this->recaptcha->getScriptTag(),
			'content'	=> 'web/kontak');
		$this->load->view('web/index',$data);
}

public function send() {
$this->form_validation->set_rules('name', 'Nama', 'required|min_length[4]|max_length[40]|trim', array('required' => 'Masukan nama kamu!'));
$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[12]|max_length[64]', array('required' => 'Masukan email kamu!', 'valid_email' => 'Masukan email yang valid!'));
$this->form_validation->set_rules('body', 'Pesan', 'required', array('required' => 'Masukan pesan kamu!'));
 $recaptcha = $this->input->post('g-recaptcha-response');
$response = $this->recaptcha->verifyResponse($recaptcha);
if($this->form_validation->run() === FALSE || !isset($response['success']) || $response['success'] <> true)  {
$this->index();
}
else {
$nama = $this->input->post('name');
$email = $this->input->post('email');
$tlp = $this->input->post('notlp');
$msg = $this->input->post('body');


$subject = "[$nama]";

$body = "Hai, kamu mendapatkan sebuah pesan baru dari $nama:
\n
Nama: $nama \n
Email: $email \n
Telepon: $tlp \n
Tujuan Informasi: $msg ";

$this->email->from($email, $name);
$this->email->to($this->_email);
$this->email->subject($subject);
$this->email->message($body);

if($this->email->send() === TRUE) {
$this->session->set_flashdata('msg', 'Pesan kamu berhasil terkirim. Kami akan Mengirim Konfirmasi ke Email Anda...!');
}
else {
$this->session->set_flashdata('msg', 'Terjadi kesalahan. Harap ulangi kembali');
}
redirect(base_url('kontak/index'));
}

}

}