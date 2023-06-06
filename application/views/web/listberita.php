  <!-- Start Blog Page -->
    <div class="row">
        <div class="col-md-8 ">
            <div class="blog-section">
                <h3 class="section-title">Index <?php echo $title ;?></h3>
                <!-- Start Post -->
                <div class="blog-post image-post">
                    <!-- Post Thumb -->
                    <?php foreach($data as $berita) {
                     $tgl_posting = tgl_indo($berita['tanggal']); 
                     $isi_berita =(strip_tags($berita['isi_berita'])); 
                         $isi = substr($isi_berita,0,200); 
                          $isi = substr($isi_berita,0,strrpos($isi," "));
                          $tgl_posting = tgl_indo($berita['tanggal']);?>
                    <div class="post-head">
         
                    </div>  
                    <!-- Post Content -->
                    <div class="post-content">
                        <div class="post-type">
                            <?php if($berita['id_kategori']=="Pengumuman"){ echo "<i class='fa fa-file'></i>";}else{
                                echo "<i class='fa fa-rss'></i>";
                            };?>
                        </div>

                        <?php if ($berita['id_kategori']=="Berita") {?>

                          <h1> <a style="font-weight: 500" href="<?php echo base_url();?>listberita/detail/<?php echo $berita['slug'] ?>" ><?php echo $berita['judul'] ?></a>
                          </h1>

                        <?php }else{?>

                          <h1> <a style="font-weight: 500" href="<?php echo base_url();?>pengumuman/detail/<?php echo $berita['slug'] ?>" ><?php echo $berita['judul'] ?></a>
                          </h1>

                        <?php } ?>

                             <ul class="post-meta">
                                <li>Kategori: <b> <?php echo $berita['id_kategori']; ?> </b></li>
                                 <li>Oleh: <b> <?php echo $berita['username']; ?> </b></li>
                                
                                 <li>Tanggal: <b><?php  $tgl_posting = tgl_indo($berita['tanggal']);  echo $tgl_posting; ?></b>
                                 </li>

                                 <li>Views: <b><?php echo $berita['dibaca'];?></b></li>

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

 