<?php
	/*
    @Copyright Dinas Kominfo Kota
    @Class Name : Home(Front)
	*/
	
include_once(APPPATH."third_party/PhpWord/Autoloader.php");

use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\PhpWord;

Autoloader::register();
Settings::loadConfig();

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctk_bukti_tayang extends CI_Controller {
	function __construct(){
		parent::__construct();
		
	if($this->session->userdata('logged_in') !== TRUE){
      redirect(base_url('lorpo'));
    }
	}
		
	public function index() {
	 $tglmulai = $this->input->post('tglmulai'); 
	 $tglselesai = $this->input->post('tglselesai'); 
           if ($tglmulai =='' OR $tglselesai == '' ){
             redirect(base_url('lorpo/bukti_tayang'));
           }else{
                $record = $this->model_app->filter_bukti_tayang($tglmulai,$tglselesai);
                
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$phpWord->getCompatibility()->setOoxmlVersion(14);
		$phpWord->getCompatibility()->setOoxmlVersion(15);

		$targetFile = "./asset/foto_berita/";
		$filename = 'Bukti_Tayang.docx';
		
		foreach ($record as $row){
		    $tgl_posting = tgl_indo($row->tanggal);
		    $isi_berita =(strip_tags($row->isi_berita)); 
            $isi = substr($isi_berita,0,250); 
            $isi = substr($isi_berita,0,strrpos($isi," "));
		    $section = $phpWord->addSection();
		    
		     $section->addText('Tanggal Tayang'.'   '. ':'.' '.$tgl_posting, array('name'=> 'calibri','size' => 11),array('align' => 'left', 'spaceAfter' => 10));
		     
		    $section->addText('Judul'.'                     '. ':'.' ' .$row->judul, array('name'=> 'calibri','size' => 11),array('align' => 'left', 'spaceAfter' => 10));
		    
		    $section->addText('Link Url'.'                 '. ':'.' ' .'http://'.getDomain().'/listberita/detail/'.$row->slug, array('name'=> 'calibri','size' => 11),array('align' => 'left', 'spaceAfter' => 10));
		    
		    $section->addTextBreak(1);
		    if(!empty($row->gambar)){
		        $section->addImage($targetFile.$row->gambar, array('align' => 'center','width'=>600, 'height'=>400));
		        
		    }
		    
		    if($row->id_kategori == 'Berita'){
		      $icon = 'berita_icon.jpg';
		        
		    }else{
		      $icon = 'icon_pengumuman.jpg';
		    }
		    
		    $rows = 10;
            $cols = 5;
            $table = $section->addTable();
            $table->addRow();
            $table->addCell()->addImage($targetFile.$icon, array('align' => 'left','width'=>36, 'height'=>36));
            $table->addCell(10000)->addText($row->judul, array('name'=> 'calibri','size' => 16),array('bold'=>true,'align' => 'left', 'spaceAfter' => 5));
            
		    
		    $section->addText('Ketegori'.' '.':'.' '.$row->id_kategori . '|'. ' '.'Oleh'.' '.':'.' '.$row->username . '|'. ' '.'Tanggal'.' '.':'.' '.$tgl_posting . '|'. ' '.'Views'.' '.':'.' '.$row->dibaca . ' ', array('name'=> 'calibri','size' => 10,'color'=>575656,'marginLeft'=>100),array('align' => 'left', 'lineHeight' => 1.0));
		    
		    
		    $section->addText($isi . '...', array('name'=> 'calibri','size' => 10,'color'=>575656),array('align' => 'both', 'lineHeight' => 1.0),array('aligment'=>'justify'));
		    
		    
            
		   
		}
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		ob_clean();//untuk mengatasi word found unreadable content
		$objWriter->save($filename);
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filename));
		flush();
		readfile($filename);
		unlink($filename); // deletes the temporary file
		exit;
  
               
        }
           
	}

}