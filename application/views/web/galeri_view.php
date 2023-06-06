  <!-- Start Blog Page -->
    <div class="row">
        <div class="col-md-12 ">
             <h3 class="section-title">Galeri Foto</h3>
            <div class="project-section project-3-col">
           
                <!-- Start Portfolio items -->
                    <ul id="portfolio-list" data-animated="fadeIn">
                    <?php foreach($row->result_array() as $data) { 
                     $tgl_posting = tgl_indo($data['tanggal']); ?> 
                        <li>
                            <a href="<?php echo base_url() ?>asset/img_galeri/<?php echo $data['gbr_gallery']; ?>" data-lightbox="project-5" ><img src="<?php echo base_url() ?>asset/img_galeri/<?php echo $data['gbr_gallery']; ?>" class="img-responsive" alt="" title="<?php echo $data['jdl_gallery'];?>"/>
                            </a>                                      
                        </li>

                         <?php } ?>
                    
                    </ul>
                   
               
            </div>
            <div class="blog-pagination clearfix">
                <ul class="flat-pagination  float-left clearfix">
                          <li><?php  
                            echo $this->pagination->create_links();?> 
                          </li>
                        </ul>
                
            </div><!-- /.blog-pagination --> 
        </div>

    </div>

 