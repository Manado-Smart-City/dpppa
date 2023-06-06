  <?php
  $d_tmtpangkat = tgl_indo($tmtpangkat); 
  $d_tmtjabatan = tgl_indo($tmtjabatan); 
  ?>
 
    <!-- Start Service Page -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="section-title">Detail Pegawai</h3>
            <div class="default-page">
                <div class="row">
                    <div class="col-md-4">
                       <div class="entry-border clearfix">
                           <div class="featured-post">
                               <a href="#"> <img class="media-object" style="width:300px;height:400px " src="<?php echo base_url(); ?>asset/foto_pegawai/<?php echo $foto;?>" alt="image"></a>
                           </div>
                           
                       </div>
                    </div>
                    
                    <div class="col-md-8">
                        <h3><?php echo $nama;?></h3>
                       
                        <div class="project-details">

                              <table class="ver-zebra2"><colgroup><col class="oce-first"></colgroup>
                            <tbody>
                              
                                <tr>
                                    <td>Jabatan</td>  <td> :  <?php echo $jabatan;?></td>
                                </tr>
                                <tr>
                                    <td width="200">NIP</td> <td width="500">:   <?php echo $nip;?></td> 
                                </tr>
                                <tr>
                                    <td>Agama</td>  <td> : <?php echo $agama;?> </td>
                                </tr>
                                <tr> 
                                    <td>Tempat, Tanggal/Lahir</td>  <td width="500">:   <?php echo $ttl;?></td>  
                                </tr>
                                <tr> 
                                    <td>Jenis Kelamin</td> <td width="500">:  <?php echo $jeniskelamin;?></td>  
                                </tr>
                                <tr>
                                    <td>Pangkat/Golongan</td>  <td width="500">:   <?php echo $pangkat;?>   </td>  
                                </tr>
                                <tr>
                                    <td>Pendidikan Terakhir</td>  <td> :  <?php echo $pendidikan;?></td>
                                </tr>   
                                <tr>
                                    <td>TMT Pangkat</td>  <td> :  <?php echo $d_tmtpangkat;?></td>
                                </tr>    
                                <tr>
                                    <td>TMT Jabatan</td>  <td> :  <?php echo $d_tmtjabatan;?></td>
                                </tr>                          
                            </tbody>
                        </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Page -->
        