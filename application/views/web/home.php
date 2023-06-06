 <?php include('slider.php');?>

   <div class="row">
          <div class="col-md-8 col-sm-8">
            <!-- Start Produk Hukum -->
            <div class="blog-post link-post">
                <div class="topbox_post">
                     <h3 class="section-title" style="border-bottom: 1px solid;">POSTINGAN TERBARU</h3>
                </div> 
            <?php    foreach($berita as $berita) { 
                $isi_berita =(strip_tags($berita['isi_berita'])); 
                    $isi = substr($isi_berita,0,200); 
                     $isi = substr($isi_berita,0,strrpos($isi," "));
                     $tgl_posting = tgl_indo($berita['tanggal']); ?>   
 
                    <div class="post-content">
                          
                        <div class="post-type">
                            <?php if($berita['id_kategori']=="Pengumuman"){ echo "<i class='fa fa-file'></i>";}else{
                                echo "<i class='fa fa-rss'></i>";
                            };?>
                        </div>

                        <?php if ($berita['id_kategori']=="Berita") {?>

                          <h4> <a href="<?php echo base_url();?>listberita/detail/<?php echo $berita['slug'] ?>" ><?php echo $berita['judul'] ?></a>
                          </h4>

                        <?php }else{?>

                          <h4> <a href="<?php echo base_url();?>pengumuman/detail/<?php echo $berita['slug'] ?>" ><?php echo $berita['judul'] ?></a>
                          </h4>

                        <?php } ?>
                            <ul class="post-meta">
                                <li>Kategori: <b> <?php echo $berita['id_kategori']; ?> </b></li>
                               
                                <li>Tanggal: <b><?php echo $tgl_posting; ?></b></li>

                                <li>Views: <b><?php echo $berita['dibaca'];?></b></li>

                            </ul>
                            <p><?php echo $isi; ?>.... </p>
                            
                    </div>
                      <?php } ?>               
            </div>
        </div>
          <div class="col-md-4 col-sm-4">                 
                <div class="sidebar right-sidebar">
                    <!--include sidebar-->
                    <?php include('sidebar.php');?>

            </div>
        </div>
    </div>    
    <!-- Start Clients Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="clients-section">
                <h3 class="section-title">PPID Pembantu</h3>
                <div id="clients">
                    <div><img src="<?php echo base_url('assets/front/images/bag-humas.png');?>" class="img-responsive"  alt="" /></div> 
                     <div><img src="<?php echo base_url('assets/front/images/bag-hukum.png');?>" class="img-responsive"  alt="" /></div>
                    <div><img src="<?php echo base_url('assets/front/images/dis-kominfo.png');?>" class="img-responsive"  alt="" /></div>
                    <div><img src="<?php echo base_url('assets/front/images/dis-capil.png');?>" class="img-responsive"  alt="" /></div>
                    <div><img src="<?php echo base_url('assets/front/images/bag-umum.png');?>" class="img-responsive"  alt="" /></div>
                    <div><img src="<?php echo base_url('assets/front/images/dis-persip.png');?>" class="img-responsive"  alt="" /></div>
                    <div><img src="<?php echo base_url('assets/front/images/bag-protokol.png');?>" class="img-responsive"  alt="" /></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Section -->
   <!-- awal untuk modal dialog -->
<!-- Modal -->
<div class="modal fade" id="dialog-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="fa fa-file-pdf-o"></span>&nbsp;Data Summary</h4>
      </div>
      <div class="modal-body" id="MyModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>  Tutup</button>
        </div>
    </div>
  </div>
</div>
<!-- akhir kode modal dialog -->
    <script>
    $(document).ready(function() {
        // ketika tombol detail ditekan
        $('.print_kartu').on("click", function(){
        // ambil nilai id dari link print
        var no_daftar= this.id;
        $("#MyModalBody").html('<iframe src="<?php echo base_url();?>pdf/kartu/'+no_daftar+'" frameborder="no" width="570" height="400"></iframe>');
        }); 
    });
    
    </script>      