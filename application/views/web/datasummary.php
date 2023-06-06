 <div class="row">
          <div class="col-md-12 col-sm-12">
            <!-- Start Produk Hukum -->
            <div class="blog-post link-post">
                <h3 class="section-title" style="border-bottom: 1px solid;">DATA SUMMARY</h3> 
            <?php    foreach($info as $info) { ?>   
              
                    <div class="post-content">
                          
                        <div class="post-type"><i class="fa fa-file-pdf-o"></i></div>
                          
                        <h4> <a href="<?php echo base_url() ?>datasumary/det_info/<?php echo $info['id_informasi'] ?>"><?php echo $info['judul'] ?></a> </h4>


                            <ul class="post-meta">
                                <li>Status: <b> <?php echo $info['kategori'] ?> </b></li>
                               
                                <li>Filetype: <b>PDF</b></li>
                            </ul>
                         <p><?php echo substr($info['isi_informasi'], 0, 250) ?> </p>
                            
                            <a class="btn btn-primary" href="<?php echo base_url() ?>datasumary/det_info/<?php echo $info['id_informasi'] ?>">Selengkapnya ></a>
                      
                            
                          
                    </div>
                      <?php } ?>  
                     <ul class="pagination nobottommargin">
                            <li><?php  
                            echo $this->pagination->create_links();?>   
                        </li>
                        </ul>
                   
                               
            </div>
        </div>
        
    </div> 