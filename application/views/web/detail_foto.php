<!-- Start Service Page -->
    <div class="row">
        <div class="col-md-12">
            <div class="welcome-text">
                <h3 class="section-title">Galeri <b><?php echo "$rows[jdl_album]"; ?></b> </h3>
                <p><?php echo $rows['keterangan']?> </p>
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
                    foreach ($detailalbum->result_array() as $h) { ?>
                    <div class="col-md-3 col-sm-3">
                        <div class="project">
                                <?php echo "
                                    <a  href='".base_url()."asset/img_galeri/$h[gbr_gallery]' data-lightbox='galeri'title='$h[jdl_gallery]'>
                                    <img  src='".base_url()."asset/img_galeri/$h[gbr_gallery]' alt='$h[jdl_gallery]' class='img-responsive' /></a>";
                                        ?>
                            <div class="project-details">
                                <ul>
                                    <li><strong><b><?php echo "$h[jdl_gallery]"; ?></b></strong> </li>
                                    <li><?php echo substr($rows['keterangan'], 0, 40) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                       
                </div>
                <!--<center>
                            <div class="pagination">
                                <a href="#">&laquo;</a>
                                <a href="#" class="active" >1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#">&raquo;</a>
                            </div>-->
                            
                        <!--</center>-->
                <p align ="center">KEMBALI KE <a href="<?php echo base_url('Albums'); ?>"> ALBUM</a> </p>
            </div>
        </div>
    </div>
    <!-- End Featured Project Section -->
