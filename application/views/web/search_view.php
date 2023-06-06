<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
                                
            <!-- Start Blog Page -->
              <div class="row">
                  <div class="col-md-8 ">
                      <div class="blog-section">
                          <?php $hasil = cetak($this->session->userdata('sess_ringkasan'));?>
                         <h3>Hasil Pencarian: <u>'<?php echo $hasil; ?>'</u></h3>
                          <!-- Start Post -->
                          <div class="blog-post image-post">
                              <!-- Post Thumb -->
                              <?php 
                                   if (count($ListBerita) > 0) {
                                   foreach($ListBerita as $row)
                                   {
                                    
                                    $tgl_posting = tgl_indo($row['tanggal']); 

                                    $isi_berita =(strip_tags($row['isi_berita'])); 
                                    $isi = substr($isi_berita,0,200); 
                                    $isi = substr($isi_berita,0,strrpos($isi," "));
                                    ?>
                                    
                              <div class="post-head">
                   
                              </div>  
                              <!-- Post Content -->
                              <div class="post-content">
                                  <div class="post-type">
                                      <?php if($row['id_kategori']=="Pengumuman"){ echo "<i class='fa fa-file'></i>";}else{
                                          echo "<i class='fa fa-rss'></i>";
                                      };?>
                                  </div>

                                  <?php if ($row['id_kategori']=="Berita") {?>

                                    <h1> <a href="<?php echo base_url();?>listberita/detail/<?php echo $row['slug'] ?>" ><?php echo $row['judul'] ?></a>
                                    </h1>

                                  <?php }else{?>

                                    <h1> <a href="<?php echo base_url();?>pengumuman/detail/<?php echo $row['slug'] ?>" ><?php echo $row['judul'] ?></a>
                                    </h1>

                                  <?php } ?>

                                       <ul class="post-meta">
                                          <li>Kategori: <b> <?php echo $row['id_kategori']; ?> </b></li>
                                           <li>Oleh: <b> <?php echo $row['username']; ?> </b></li>
                                          
                                           <li>Tanggal: <b><?php echo $tgl_posting; ?></b>
                                           </li>

                                           <li>Views: <b><?php echo $row['dibaca'];?></b></li>

                                       </ul>       
                                      
                                     <p><?php echo $isi; ?>.... </p>
                              </div>
                              <?php } ?>

                              <!-- Pagination -->
                              <ul class="pagination nobottommargin">
                                      <li><?php  
                                      echo $this->pagination->create_links();?>   
                                  </li>
                              </ul>
                              <?php } else {
                                  echo"<center><h1><i style='color:red; font-size:20px;'>Data Tidak Ditemukan</i></h1></center>";
                              }?>
                          </div>
                          <!-- End Post -->


                      </div>
                  </div>
                          <!--Sidebar-->
                  <div class="col-md-4">
                                  
                      <div class="sidebar right-sidebar">
                                  
                          <!-- Search Widget -->
                          <div class="widget widget-search">
                              <form method="post" action="<?php echo base_url();?>search">
                                  <input type="search" name="cari" placeholder="Enter Keywords..." required />
                                  <button class="search-btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
                              </form>
                          </div>

                          
                          <!-- Popular Posts widget -->
                          <div class="widget widget-popular-posts">
                                <?php include('sidebar.php');?>
                          </div>
                                  
                       
                      </div>
                  </div>
                  <!--End sidebar-->
              </div>

  

        