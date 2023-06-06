        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
               <a href="<?php echo base_url()?>lorpo/listberita "> <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Berita</span>
                   <?php $jmla = $this->model_app->view('berita')->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmla; ?></span>

                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="<?php echo base_url()?>lorpo/gallery ">  <span class="info-box-icon bg-red"><i class="fa fa-picture-o"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Galeri</span>
                    <?php $jmlb = $this->model_app->view('gallery')->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmlb; ?></span>
                </div>
              </div>
            </div>

            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="<?php echo base_url()?>lorpo/baner ">  <span class="info-box-icon bg-green"><i class="fa fa-clone"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Baner</span>
                  <?php $jmlc = $this->model_app->view('banner')->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmlc; ?></span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
               <a href="<?php echo base_url()?>lorpo/manajemenuser "> <span class="info-box-icon bg-light-blue"><i class="fa fa-users"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                   <?php $jmld = $this->model_app->view('users')->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmld; ?></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="box-title"><a style="font-size:18px"> Berita Populer</a></div>
                  <p style="font-size: 14px" >Berita Paling Banyak Dilihat</p>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php foreach ($record as $news) {
                        $tgl_posting = tgl_indo($news['tanggal'] );
                        $jdl =(strip_tags($news['judul'])); 
                        $judull = substr($jdl,0,85); 
                        $judull = substr($jdl,0,strrpos($judull," "));
                        $waktukirim = cek_terakhir($news['tanggal'].' '.$news['jam']);?>
                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url()?>asset/foto_berita/<?php echo $news['gambar']?>" alt="News Image"/>
                      </div>
                      <div class="product-info">
                        <a href="<?php echo base_url()?>listberita/detail/<?php echo $news['slug']?>" target="_blank" class="product-title"><?php echo $judull?></a>
                        <span class="product-description">
                         <?php echo $tgl_posting ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i>&nbsp; <?php echo $news['dibaca']?> &nbsp;Kali Dibaca &nbsp;<?php echo $waktukirim ?>&nbsp; Yang lalu
                        </span>
                      </div>
                    </li>
                    <?php } ?>
            
                  </ul>
                </div>
                <div class="box-footer text-center">
                  <a href="<?php echo base_url()?>lorpo/listberita" class="uppercase">Tampil Semua Berita</a>
                </div>
              </div>   
            </div>
            <div class="col-md-8">
              <div class="box">
                <?php include "grafik.php"; ?>
              </div>
            </div>
          </div>
