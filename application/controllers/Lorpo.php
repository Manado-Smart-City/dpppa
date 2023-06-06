<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lorpo extends CI_Controller {
	function index(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->model_app->cek_login($username,$password,'users');
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){

                
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level'],
                                   'id_session'=>$row['id_session'],
                                   'logged_in'=> TRUE));

				redirect('Lorpo/home');
			}else{
				$data['title'] = 'Username atau Password salah!';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			$data['title'] = 'Administrator &rsaquo; Log In';
			$this->load->view('administrator/view_login',$data);
		}
	}

    function reset_password(){
        if (isset($_POST['submit'])){
            $usr = $this->model_app->edit('users', array('id_session' => $this->input->post('id_session')));
            if ($usr->num_rows()>=1){
                if ($this->input->post('a')==$this->input->post('b')){
                    $data = array('password'=>hash("sha512", md5($this->input->post('a'))));
                    $where = array('id_session' => $this->input->post('id_session'));
                    $this->model_app->update('users', $data, $where);

                    $row = $usr->row_array();
                    $this->session->set_userdata('upload_image_file_manager',true);
                    $this->session->set_userdata(array('username'=>$row['username'],
                                       'level'=>$row['level'],
                                       'id_session'=>$row['id_session']));
                    redirect('administrator/home');
                }else{
                    $data['title'] = 'Password Tidak sama!';
                    $this->load->view('administrator/view_reset',$data);
                }
            }else{
                $data['title'] = 'Terjadi Kesalahan!';
                $this->load->view('administrator/view_reset',$data);
            }
        }else{
            $this->session->set_userdata(array('id_session'=>$this->uri->segment(3)));
            $data['title'] = 'Reset Password';
            $this->load->view('administrator/view_reset',$data);
        }
    }

    function lupapassword(){
        if (isset($_POST['lupa'])){
            $email = strip_tags($this->input->post('email'));
            $cekemail = $this->model_app->edit('users', array('email' => $email))->num_rows();
            if ($cekemail <= 0){
                $data['title'] = 'Alamat email tidak ditemukan';
                $this->load->view('administrator/view_login',$data);
            }else{
                $iden = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
                $usr = $this->model_app->edit('users', array('email' => $email))->row_array();
                $this->load->library('email');

                $tgl = date("d-m-Y H:i:s");
                $subject      = 'Lupa Password ...';
                $message      = "<html><body>
                                    <table style='margin-left:25px'>
                                        <tr><td>Halo $usr[nama_lengkap],<br>
                                        Seseorang baru saja meminta untuk mengatur ulang kata sandi Anda di <span style='color:red'>$iden[url]</span>.<br>
                                        Klik di sini untuk mengganti kata sandi Anda.<br>
                                        Atau Anda dapat copas (Copy Paste) url dibawah ini ke address Bar Browser anda :<br>
                                        <a href='".base_url()."administrator/reset_password/$usr[id_session]'>".base_url()."administrator/reset_password/$usr[id_session]</a><br><br>

                                        Tidak meminta penggantian ini?<br>
                                        Jika Anda tidak meminta kata sandi baru, segera beri tahu kami.<br>
                                        Email. $iden[email], No Telp. $iden[no_telp]</td></tr>
                                    </table>
                                </body></html> \n";
                
                $this->email->from($iden['email'], $iden['nama_website']);
                $this->email->to($usr['email']);
                $this->email->cc('');
                $this->email->bcc('');

                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->set_mailtype("html");
                $this->email->send();
                
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $data['title'] = 'Password terkirim ke '.$usr['email'];
                $this->load->view('administrator/view_login',$data);
            }
        }else{
            redirect('Lorpo');
        }
    }

	function home(){
        if ($this->session->level=='admin' OR $this->session->level=='user' ){
          $data['record'] = $this->model_app->view_ordering('berita','dibaca','DESC', $this->db->limit('4'));
		  $this->template->load('administrator/template','administrator/view_home_admin',$data);
        }else{
          redirect('home');
        }
	}

	function listberita(){
		cek_session_akses('listberita',$this->session->id_session);
        if ($this->session->level=='admin'  OR $this->session->level=='user'){
            $data['record'] = $this->model_app->view_ordering('berita','tanggal','DESC');
        }else{
            redirect('home'); 
        }

		$this->template->load('administrator/template','administrator/mod_berita/view_berita',$data);
	}



function tambah_listberita(){
      cek_session_akses('addberita',$this->session->id_session);
      if ($this->session->level=='admin'  OR $this->session->level=='user'){
      if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_berita/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            
            $config['source_image'] = 'asset/foto_berita/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '26';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
           
            if ($hasil['file_name']==''){
                        
                     $data = array('id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('judul')),

                                    'isi_berita'=>$this->input->post('isi_berita'),
                                    'keterangan_gambar'=>$this->input->post('keterangan_gambar'),
                                    'tanggal'=>$this->input->post('tgl'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>'0',
                                    
                                    'slug'=>seo_title($this->input->post('judul')),
                                    'status'=>'Y');
            }else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('judul')),
            
                                    'isi_berita'=>$this->input->post('isi_berita'),
                                    'keterangan_gambar'=>$this->input->post('keterangan_gambar'),
                                   'tanggal'=>$this->input->post('tgl'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    
                                    'slug'=>seo_title($this->input->post('judul')),
                                    'status'=>'Y');
            }
            $this->model_app->insert('berita',$data);
                  redirect('Lorpo/listberita');
            }else{
           
                $this->template->load('administrator/template','administrator/mod_berita/berita');
            }
      }else{
         redirect('home');
      }
    }


	function edit_listberita(){
		cek_session_akses('editberita',$this->session->id_session);
        if ($this->session->level=='admin'  OR $this->session->level=='user'){
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_berita/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'asset/foto_berita/'.$hasil['file_name'];
            $config['wm_text'] = '#';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '26';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
          
            if ($hasil['file_name']==''){
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('judul')),
                                    'isi_berita'=>$this->input->post('isi_berita'),
                                    'keterangan_gambar'=>$this->input->post('keterangan_gambar'),
                                    
                                    'tanggal'=>$this->input->post('tgl'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>$this->input->post('dibaca'),
                                  
                                    'slug'=>seo_title($this->input->post('judul')),
                                    'status'=>'Y');
            }else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('judul')), 
                                 
                                    'isi_berita'=>$this->input->post('isi_berita'),
                                    'keterangan_gambar'=>$this->input->post('keterangan_gambar'),
                                   
                                    'tanggal'=> $this->input->post('tgl'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>$this->input->post('dibaca'),
                                   
                                    'slug'=>seo_title($this->input->post('judul')),
                                    'status'=>'Y');
            }
            $where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('berita', $data, $where);
			redirect('Lorpo/listberita');
		}else{
			//$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
            //$record = $this->model_app->view_ordering('kategori','id_kategori','DESC');
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('berita', array('id_berita' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            }
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_berita/edit_berita',$data);
		}
	}else{
         redirect('home');
        }
    }

	function publish_listberita(){

		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
        $where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('berita', $data, $where);
		redirect('lorpo/listberita');
	}

    function delete_berita($id){
        $this->model_app->delete_berita($id);
        redirect('lorpo/listberita');
    }
    
    
    function bukti_tayang(){
		cek_session_akses('listberita',$this->session->id_session);
        if ($this->session->level=='admin'  OR $this->session->level=='user'){
            if (isset($_POST['submit'])){
                
                 $tanggal_mulai = $this->input->post('tgl_mulai'); 
                 $tanggal_selesai = $this->input->post('tgl_selesai'); 
                 
                 if($tanggal_mulai=="" OR $tanggal_selesai == ""){
                     redirect(lorpo/bukti_tayang);
                 }else{
                     
                    $data['record']= $this->model_app->filter_bukti_tayang($tanggal_mulai,$tanggal_selesai);
                    
                    $this->template->load('administrator/template','administrator/mod_bukti_tayang/view_bukti_tayang',$data);
                     
                 }
                
            }else{
                
                $this->template->load('administrator/template','administrator/mod_bukti_tayang/view_bukti_tayang');
                
            }
            
        }else{
            redirect(base_url('home')); 
        }
        
    }

	
    // Controller Modul Gallery

    function gallery(){

        cek_session_akses('gallery',$this->session->id_session);
        if ($this->session->level=='admin'  OR $this->session->level=='user'){
            $data['record'] = $this->model_app->view_ordering('gallery','id_gallery','DESC');
        }else{
            redirect('home');
        }
        $this->template->load('administrator/template','administrator/mod_gallery/view_gallery',$data);

    }

    function tambah_gallery(){
        cek_session_akses('addgallery',$this->session->id_session);
        if ($this->session->level=='admin'  OR $this->session->level=='user'){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_galeri/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
            $config['max_size'] = '3000'; //maksimum besar file 3M
           
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array(
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('judul'),
                            'gallery_seo'=>seo_title($this->input->post('judul')),
                            'tanggal'=>$this->input->post('tgl'),
                            'dibaca'=>'0',
                            'keterangan'=>$this->input->post('ketgambar'));
            }else{
                $data = array(
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('judul'),
                            'gallery_seo'=>seo_title($this->input->post('judul')),
                            'tanggal'=>$this->input->post('tgl'),
                            'keterangan'=>$this->input->post('ketgambar'),
                            'dibaca'=>'0',
                            'gbr_gallery'=>$hasil['file_name']);
            }
            $this->model_app->insert('gallery',$data);  
            redirect('lorpo/gallery');
        }else{
            $data['record'] = $this->model_app->view_ordering('album','id_album','DESC');
            $this->template->load('administrator/template','administrator/mod_gallery/tambah_galeri',$data);
        }
    }else{
         redirect('home');
        }
    }

    function edit_gallery(){
        cek_session_akses('editgallery',$this->session->id_session);
        if ($this->session->level=='admin'  OR $this->session->level=='user'){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_galeri/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
           $config['max_size'] = '3072'; //maksimum besar file 3M
             $config['max_width']  = '5000'; //lebar maksimum 5000 px
             $config['max_height']  = '5000'; //tinggi maksimu 5000 px
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array(
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('judul'),
                            'gallery_seo'=>seo_title($this->input->post('judul')),
                            'tanggal'=>$this->input->post('tgl'),
                            'dibaca'=>$this->input->post('dibaca'),
                            'keterangan'=>$this->input->post('ketgambar'));
            }else{
                $data = array(
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('judul'),
                            'tanggal'=>$this->input->post('tgl'),
                            'dibaca'=>$this->input->post('dibaca'),
                            'gallery_seo'=>seo_title($this->input->post('judul')),
                            'keterangan'=>$this->input->post('ketgambar'),
                            'gbr_gallery'=>$hasil['file_name']);
            }
            $where = array('id_gallery' => $this->input->post('id'));
            $this->model_app->update('gallery', $data, $where);
            redirect('lorpo/gallery');
        }else{
            //$record = $this->model_app->view_ordering('album','id_album','DESC');
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('gallery', array('id_gallery' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('gallery', array('id_gallery' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_gallery/edit_galeri',$data);
        }
    }else{
         redirect('home');
     }
    }

    function delete_gallery1(){
        cek_session_akses('gallery',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_gallery' => $this->uri->segment(3));
        }else{
            $id = array('id_gallery' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('gallery',$id);
        redirect('lorpo/gallery');
    }

    function delete_gallery($id){
        $this->model_app->delete_gallery($id);
        redirect('lorpo/gallery');
    }


    function slide(){
        cek_session_akses('slide',$this->session->id_session);
          if ($this->session->level=='admin'  OR $this->session->level=='user'){
            $data['record'] = $this->model_app->view_ordering('slide','id','DESC');
        }else{
           redirect('home');
        }

        $this->template->load('administrator/template','administrator/mod_slide/view_slide',$data);
    }

    function tambah_slide(){
        cek_session_akses('addslide',$this->session->id_session);
        if ($this->session->level=='admin'  OR $this->session->level=='user'){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_slide/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
            $config['max_size'] = '2000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
            // echo "<div class='alert alert-warning'><center>Belum Ada data</center></div>";
             redirect('lorpo/tambah_slide');
            }else{
                $data = array('posisi'=>$this->input->post('posisi'),
                              'slide'=>$hasil['file_name']);
            }
            $this->model_app->insert('slide',$data);  
            redirect('lorpo/slide');
        }else{
            $data['title']= "Tambah Slide-Administrator Dashboard";
            $this->template->load('administrator/template','administrator/mod_slide/tambah_slide',$data);
            }
        }else{
            redirect('home');
        }
    }


    function slide_posisi(){

        if ($this->uri->segment(4)=='1'){
            $data = array('posisi'=>'0');
        }else{
            $data = array('posisi'=>'1');
        }
        $where = array('id' => $this->uri->segment(3));
        $this->model_app->update('slide', $data, $where);
        redirect('lorpo/slide');
    }


    function delete_slide($id){
        $this->model_app->delete_slide($id);
        redirect('lorpo/slide');
    }


    function publish_slide(){
        if ($this->uri->segment(4)=='Y'){
            $data = array('status'=>'N');
        }else{
            $data = array('status'=>'Y');
        }
        $where = array('id' => $this->uri->segment(3));
        $this->model_app->update('slide', $data, $where);
        redirect('lorpo/slide');
    }

    function baner (){
        cek_session_akses('baner',$this->session->id_session);
         if ($this->session->level=='admin'  OR $this->session->level=='user'){
            $data['record'] = $this->model_app->view_ordering('banner','id','DESC');
        }else{
            redirect('home');
        }

        $this->template->load('administrator/template','administrator/mod_baner/view_baner',$data);
    }

    function tambah_baner(){
        cek_session_akses('addbaner',$this->session->id_session);
         if ($this->session->level=='admin'  OR $this->session->level=='user'){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_baner/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
            $config['max_size'] = '2000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
            
             redirect('lorpo/tambah_baner');
            }else{
                $data = array('status'=>$this->input->post('status'),
                              'gambar'=>$hasil['file_name']);
            }
            $this->model_app->insert('banner',$data);  
            redirect('lorpo/baner');
        }else{
            $data['title']= "Tambah Slide-Administrator Dashboard";
            $this->template->load('administrator/template','administrator/mod_baner/tambah_baner',$data);
            }
        }else{
            redirect('home');
        }
    }

    function publish_baner(){
        if ($this->uri->segment(4)=='Y'){
            $data = array('status'=>'N');
        }else{
            $data = array('status'=>'Y');
        }
        $where = array('id' => $this->uri->segment(3));
        $this->model_app->update('banner', $data, $where);
        redirect('lorpo/baner');
    }

    function delete_baner($id){
        $this->model_app->delete_baner($id);
        redirect('lorpo/baner');
    }

    function kepegawaian(){
            cek_session_akses('kepegawaian',$this->session->id_session);
             if ($this->session->level=='admin'  OR $this->session->level=='user'){
                $data['record'] = $this->model_app->view_ordering('pejabat','id_pejabat','ASC');
            }else{
                redirect('home');
            }
          
            $this->template->load('administrator/template','administrator/mod_kepegawaian/view_pegawai',$data);
        }



    function tambah_pegawai(){
        cek_session_akses('addkepegawaian',$this->session->id_session);
         if ($this->session->level=='admin'  OR $this->session->level=='user'){    
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_pegawai/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
            $config['max_size'] = '500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();


            if ($hasil['file_name']==''){
                $data = array('nama_pejabat'=>$this->input->post('nama_pejabat'),
                              'jabatan'=>$this->input->post('jabatan'),
                              'nip'=>$this->input->post('nip'),  
                              'agama'=>$this->input->post('agama'),
                              'ttl'=>$this->input->post('ttl'),
                              'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                              'pangkat_gol'=>$this->input->post('pangkat'),
                              'pend_terakhir'=>$this->input->post('pendidikan'),
                              'tmt_pangkat'=>$this->input->post('tmtpangkat'),
                              'slug'=>seo_title($this->input->post('nip')),
                              'tmt_jabatan'=>$this->input->post('tmtjabatan'));
            }else{
               $data = array('nama_pejabat'=>$this->input->post('nama_pejabat'),
                              'jabatan'=>$this->input->post('jabatan'),
                              'nip'=>$this->input->post('nip'),
                              'agama'=>$this->input->post('agama'),
                              'ttl'=>$this->input->post('ttl'),
                              'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                              'pangkat_gol'=>$this->input->post('pangkat'),
                              'pend_terakhir'=>$this->input->post('pendidikan'),
                              'tmt_pangkat'=>$this->input->post('tmtpangkat'),
                              'slug'=>seo_title($this->input->post('nip')),
                              'tmt_jabatan'=>$this->input->post('tmtjabatan'),
                              'foto'=>$hasil['file_name']);
            }
            $this->model_app->insert('pejabat',$data);  
            redirect('lorpo/kepegawaian');
        }else{

             $data['title']= "Tambah Data Pegawai-Administrator Dashboard";
           $this->template->load('administrator/template','administrator/mod_kepegawaian/tambah_pegawai',$data);
        }
     }else{
        redirect('home');
     }
    }

    function edit_pegawai(){
            $id = $this->uri->segment(3);
            cek_session_akses('editkepegawaian',$this->session->id_session);
             if ($this->session->level=='admin'  OR $this->session->level=='user'){
            if (isset($_POST['submit'])){
                $config['upload_path'] = 'asset/foto_pegawai/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $config['max_size'] = '500'; // kb
                $this->load->library('upload', $config);
                $this->upload->do_upload('gambar');
                $hasil=$this->upload->data();
              
                if ($hasil['file_name']==''){
                       $data = array('nama_pejabat'=>$this->input->post('nama_pejabat'),
                                     'jabatan'=>$this->input->post('jabatan'),
                                     'nip'=>$this->input->post('nip'),  
                                     'agama'=>$this->input->post('agama'),
                                     'ttl'=>$this->input->post('ttl'),
                                     'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                                     'pangkat_gol'=>$this->input->post('pangkat'),
                                     'pend_terakhir'=>$this->input->post('pendidikan'),
                                     'tmt_pangkat'=>$this->input->post('tmtpangkat'),
                                     'slug'=>seo_title($this->input->post('nip')),
                                     'tmt_jabatan'=>$this->input->post('tmtjabatan'));
                }else{
                       $data = array('nama_pejabat'=>$this->input->post('nama_pejabat'),
                                      'jabatan'=>$this->input->post('jabatan'),
                                      'nip'=>$this->input->post('nip'),
                                      'agama'=>$this->input->post('agama'),
                                      'ttl'=>$this->input->post('ttl'),
                                      'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                                      'pangkat_gol'=>$this->input->post('pangkat'),
                                      'pend_terakhir'=>$this->input->post('pendidikan'),
                                      'tmt_pangkat'=>$this->input->post('tmtpangkat'),
                                      'slug'=>seo_title($this->input->post('nip')),
                                      'tmt_jabatan'=>$this->input->post('tmtjabatan'),
                                      'foto'=>$hasil['file_name']);
                }
                $where = array('id_pejabat' => $this->input->post('id'));
                $this->model_app->update('pejabat', $data, $where);
                redirect('Lorpo/kepegawaian');
            }else{
            
                if ($this->session->level=='admin'){
                     $proses = $this->model_app->edit('pejabat', array('id_pejabat' => $id))->row_array();
                }else{
                    redirect('Lorpo/home');
                }
                $data = array('rows' => $proses);
                $this->template->load('administrator/template','administrator/mod_kepegawaian/edit_pegawai',$data);
            }
        }else{
            redirect('home');
        }
    }

    function delete_pegawai($id){
            $this->model_app->delete_pegawai($id);
            redirect('lorpo/kepegawaian');
        }



	// Controller Modul User

	function manajemenuser(){
		cek_session_akses('pengguna',$this->session->id_session);
        if ($this->session->level=='admin'){
		$data['record'] = $this->model_app->view_ordering('users','username','DESC');
         }else{
        redirect('home');	
        }
        $this->template->load('administrator/template','administrator/mod_users/view_users',$data);
	}

	function tambah_manajemenuser(){
		cek_session_akses('addpengguna',$this->session->id_session);
		$id = $this->session->username;
        if ($this->session->level=='admin'){
		  if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }else{
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }
            $this->model_app->insert('users',$data);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              $sess = md5($this->input->post('a')).'-'.date('YmdHis');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$sess,
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('lorpo/edit_manajemenuser/'.$this->input->post('a'));
		}else{
            $proses = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
            $data = array('record' => $proses);
			$this->template->load('administrator/template','administrator/mod_users/view_users_tambah',$data);
		  }
        }else{
            redirect('home');
        }
	}

	function edit_manajemenuser(){
		$id = $this->uri->segment(3);
        if ($this->session->level=='admin'){
		  if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }
            if($this->session->level=='admin'){
                $where = array('username' => $this->input->post('id'));
            }elseif ($this->session->username==$this->input->post('id')){
                $where = array('username' => $this->session->username);
            }
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('lorpo/edit_manajemenuser/'.$this->input->post('id'));
		}else{
            if ($this->session->username==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
    			$this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
            }else{
                redirect('lorpo/edit_manajemenuser/'.$this->session->username);
            }
		}
	   }else{
        redirect('home');
    }
}

	function delete_manajemenuser(){
        cek_session_akses('manajemenuser',$this->session->id_session);
		$id = array('username' => $this->uri->segment(3));
        $this->model_app->delete('users',$id);
		redirect('lorpo/manajemenuser');
	}

    function delete_akses(){
        cek_session_admin();
        $id = array('id_umod' => $this->uri->segment(3));
        $this->model_app->delete('users_modul',$id);
        redirect('administrator/edit_manajemenuser/'.$this->uri->segment(4));
    }

    function delete_multiple_post() {
        $this->model_utama->remove_checked_post();
        redirect('Lorpo/listberita');
        }

    function delete_multiple_pegawai() {
        $this->model_utama->remove_checked_pegawai();
        redirect('Lorpo/kepegawaian');
        }

	// Controller Modul Modul

	function logout(){
		$this->session->sess_destroy();
		redirect('Lorpo');
	}

}
