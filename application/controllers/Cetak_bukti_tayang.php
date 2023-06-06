<?php
	/*
    @Copyright Dinas Kominfo Kota
    @Class Name : Home(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_bukti_tayang extends CI_Controller {
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
                
                
               $pdf = new FPDF('P','mm','A4');
               $pdf->setTopMargin(15);
               $pdf->setLeftMargin(2);
               $pdf->setRightMargin(6);
               $pdf->SetAutoPageBreak(true, 2);
               
                // membuat halaman baru
               $pdf->AddPage();
               // setting jenis font yang akan digunakan
               $pdf->SetFont('Arial','B',11);
               
               
              foreach ($record as $row){
               $pdf->Cell(20,12,'',0,0,'L');
               $pdf->Cell(35,12,'Tanggal Tayang',0,0,'L');
               $pdf->Cell(3,12,':',0,0,'L');
               
               $pdf->SetFont('Arial','',11);
               $pdf->Cell(130,12,$row->tanggal,0,1,'L');
               
               $cellWidth=130;
               $cellHeight=4;
               
                if($pdf->GetStringWidth($row->judul) < $cellWidth){
                   $line=1;
                 }else{
                  $textLength=strlen($row->judul);
                  $errMargin=2;
                  $startChar=0;
                  $maxChar=0;
                  $textArray=array();
                  $tmpString="";
                  while($startChar < $textLength){
                    while($pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) && ($startChar+$maxChar) < $textLength){
                        $maxChar++;
                        $tmpString=substr($row->judul,$startChar,$maxChar);
                      }
                      $startChar=$startChar+$maxChar;
                      array_push($textArray,$tmpString);
                      $maxChar=0;
                      $tmpString='';
                  }
                  $line=count($textArray);
                 }
               $pdf->SetFont('Arial','B',11);
               $pdf->Cell(20,12,'',0,0,'L');
               $pdf->Cell(35,12,'Judul Berita',0,0,'L');
               $pdf->Cell(3,12,':',0,0,'L');
               $xPos=$pdf->GetX();
               $yPos=$pdf->GetY();  
               
               $pdf->SetFont('Arial','',11);
               $pdf->Multicell($cellWidth,$cellHeight,$row->judul,0,'B');
               $pdf->SetXY($xPos + $cellWidth, $yPos);
               $pdf->Cell(5,12,'',0,1,'L');
               
               
               if($pdf->GetStringWidth($row->slug) < $cellWidth){
                   $line=1;
                 }else{
                  $textLength=strlen($row->slug);
                  $errMargin=2;
                  $startChar=0;
                  $maxChar=0;
                  $textArray=array();
                  $tmpString="";
                  while($startChar < $textLength){
                    while($pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) && ($startChar+$maxChar) < $textLength){
                        $maxChar++;
                        $tmpString=substr($row->slug,$startChar,$maxChar);
                      }
                      $startChar=$startChar+$maxChar;
                      array_push($textArray,$tmpString);
                      $maxChar=0;
                      $tmpString='';
                  }
                  $line=count($textArray);
                 }
               $pdf->SetFont('Arial','B',11);
               $pdf->Cell(20,12,'',0,0,'L');
               $pdf->Cell(35,12,'Link Url',0,0,'L');
               $pdf->Cell(3,12,':',0,0,'L');
               $pdf->SetFont('Arial','',11);
               $pdf->SetFont('Arial','I',11);
               $pdf->Multicell($cellWidth,$cellHeight,'http://'.getDomain().'/listberita/detail/'.$row->slug,0,'B');
               $pdf->SetXY($xPos + $cellWidth, $yPos);
               $pdf->Cell(5,12,'',0,1,'L');
               
               $pdf->Cell(20,12,'',0,1,'L');
              
               //$pdf->Image('asset/foto_berita/$row->gambar',0,0
               $pdf->SetFont('Arial','B',11);
              }
               
            $pdf->Output('D','Bukti Tayang.pdf');
               
           }
           
	}

}