 <!-- Start Service Page -->
    <div class="row">
        <div class="col-md-12">
            <div class="welcome-text">
                <h3 class="section-title">Album </h3>
                <p>Album Gambar Badan Pemberdayaan Perempuan dan Perlindungan Anak </p>
            </div>
        </div>
    </div>
    <!-- End Service Page -->   
    <!-- Start Featured Project Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="running-project">
                <div class="row">
                        <?php 
                            $no = $this->uri->segment(3)+1;
                            foreach ($album->result_array() as $h) {    
                            $total_foto = $this->model_utama->view_where('gallery',array('id_album' => $h['id_album']))->num_rows();
                            ?>
                    <div class="col-md-3 col-sm-3">
                        <div class="project">
                          <?php  echo " 
                             <a href='".base_url()."albums/detail/$h[album_seo]'>";
                                if ($h['gbr_album'] ==''){
                                echo "<a href='".base_url()."albums/detail/$h[album_seo]'><img  src='".base_url()."asset/img_album/no-image.jpg' alt='no-image.jpg' class='img-responsive'/></a>";
                                }else{
                                    echo "<a href='".base_url()."albums/detail/$h[album_seo]'><img  src='".base_url()."asset/img_album/$h[gbr_album]' alt='$h[gbr_album]' class='img-responsive'/></a>";
                                    echo "</a>"
                                ?>
                                 <div class='project-details'>
                                    <ul> 
                                          
                                 <?php echo" <li><strong><a href='".base_url()."albums/detail/$h[album_seo]'>$h[jdl_album]</a></strong></li>";
                                   ?>
                                    <span class='meta'>
                                    <li><a href= "<?php echo base_url()?>albums/detail/<?php echo $h['album_seo']?>"><span class='icon-text'></span>&nbsp;<?php echo $h['jam']?> ,<?php echo tgl_indo($h['tgl_posting']) ?> <span style='font-size:14px; color:#fff'></span></a></li>
                                    </span>
                                   </ul>  
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>

                       <center>
                          <ul class="pagination nobottommargin">
                            <li><?php  
                            echo $this->pagination->create_links();?>   
                        </li>
                         </ul>
                        </center>
                </div>
            </div>
        </div>
    </div>
    <!-- End Featured Project Section -->