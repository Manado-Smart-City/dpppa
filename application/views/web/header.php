   <!-- Start Header Section -->
    <div class="header-section">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <div class="logo-img">
                     <a href="#">  <img src="<?php echo base_url('assets/front/images/dpppa_logo.png');?>" class="img-responsive"  alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->
   
    <!-- Start Navigation Section -->
    <div class="navigation">
        
        <div class="navbar navbar-default navbar-top">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>     
            </div>
            <div class="navbar-collapse collapse">
                <!-- Start Navigation List -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url();?>">BERANDA</a>
                    </li>
                    <li>
                        <a href="#">PROFIL</a>
                        <ul class="dropdown">
                            <li>
                                <a href="<?php echo base_url();?>site/visi_misi">Visi dan Misi</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>site/struktur">Struktur Organisasi</a>
                            </li>
                            <li>
                               <!-- <a href="#">Dasar Hukum</a>-->
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#">PUBLIKASI</a>
                        <ul class="dropdown">
                            <li>
                                <a href="<?php echo base_url();?>listberita">Berita</a>
                            </li>
                             <li>
                                <a href="<?php echo base_url();?>kla">Informasi KLA</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>pengumuman">Pengumuman</a>
                            </li>

                        </ul>
                    </li>

                     <li>
                        <a href="#">PROGRAM & LAYANAN</a>
                        <ul class="dropdown">
                           <li>
                                <a href="<?php echo base_url();?>site/program_kla">KLA</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>site/pug">Pengarusutamaan Gender</a>
                            </li>

                          

                            <li>
                                <a href="<?php echo base_url();?>site/layanan_ptpa">P2TP2A</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                     <li>
                        <a href="#">DATABASE</a>
                        <ul class="dropdown">
                            <li>
                                <a href="<?php echo base_url();?>database/pegawai">Kepegawaian</a>
                            </li>
                            

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>galeri">GALERI</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('kontak');?>">KONTAK</a>
                    </li>
                </ul>
                <!-- End Navigation List -->
            </div>
        </div>
        
    </div>
    <!-- End Navigation Section -->