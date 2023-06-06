<!-- Start Single Blog Page -->
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="blog-section">
                <!-- Start Single Post Area -->
                <div class="blog-post gallery-post">
                    <!-- Start Single Post (Gallery Slider) -->
                    <div class="post-head">
                        <a title="This is an image title" href="<?php echo base_url() ?>asset/foto_berita/<?php echo $gbr ?>" data-lightbox-gallery="gallery1">
                            <img alt="" src="<?php echo base_url() ?>asset/foto_berita/<?php echo $gbr ?>">
                        </a>
                        <label style="font-size:14px;font-style:italic;color:#000"><?php echo $deskripsi;?></label>
                        <!-- Start Single Post Content -->
                        <div class="post-content">
                            <div class="post-type">
                                <?php if($kategori=="Pengumuman"){ echo "<i class='fa fa-file'></i>";}else{
                                    echo "<i class='fa fa-rss'></i>";
                                };?>
                            </div>

                            <h3><?php echo $judul ?></h3>
                            <ul class="post-meta">
                                <li>Kategori: <b> <?php echo $kategori  ?> </b></li>
                                <li>Oleh: <b> <?php echo $sumber; ?> </b></li>
                               
                                <li>Tanggal: <b><?php  $tgl_posting = tgl_indo($tgl);  echo $tgl_posting; ?></b>
                                </li>

                                <li>Views: <b><?php echo $dibaca;?></b></li>

                            </ul>

                            <p><?php echo $isi_berita ?></p>
     
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-4 col-sm-4">                  
            <div class="sidebar right-sidebar">         
                <!-- Search Widget -->
                <div class="widget widget-search">
                    <form method="post" action="<?php echo base_url();?>search">
                        <input type="search" name="cari" placeholder="Enter Keywords..." required/>
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

 