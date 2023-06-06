        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <?php $usr = $this->model_app->view_where('users', array('username'=> $this->session->username))->row_array();
                  if (trim($usr['foto'])==''){ $foto = 'blank.png'; }else{ $foto = $usr['foto']; } ?>
            <img src="<?php echo base_url(); ?>/asset/foto_user/<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <?php echo "<p>$usr[nama_lengkap]</p>"; ?>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li><a href="<?php echo base_url(); ?>Lorpo/home"><i class="fa fa-home"></i> <span>Beranda Dasbor</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>Berita</span></a>
              <ul class="treeview-menu">
              <?php
                $cek=$this->model_app->umenu_akses("listberita",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."Lorpo/listberita'></i> Semua Berita</a></li>";
                }

                $cek=$this->model_app->umenu_akses("addberita",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."Lorpo/tambah_listberita'>Tambah Baru</a></li>";
                }

              ?>
              </ul>
            </li>
              <li class="treeview">
              <a href="#"><i class="fa fa-picture-o"></i> <span>Galery</span></a>
              <ul class="treeview-menu">
              <?php
                $cek=$this->model_app->umenu_akses("gallery",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."Lorpo/gallery'> Semua Foto</a></li>";
                }
                $cek=$this->model_app->umenu_akses("addgallery",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."Lorpo/tambah_gallery'>Tambah Baru</a></li>";
                }
                
              ?>
              </ul>
            </li>
             <li>
               <?php
                $cek=$this->model_app->umenu_akses("slide",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."Lorpo/slide'><i class='fa fa-sliders'></i>  <span>Slide</span></a></li>";
                }?>
             </li>

             <li>
              <?php
               $cek=$this->model_app->umenu_akses("baner",$this->session->id_session);
               if($cek==1 OR $this->session->level=='admin'){
                 echo "<li><a href='".base_url()."Lorpo/baner'><i class='fa fa-clone'></i>  <span>Baner</span></a></li>";
               }?> 
             </li>

               <li class="treeview">
               <a href="#"><i class="fa fa-user"></i> <span>Data Kepegawaian</span></a>
               <ul class="treeview-menu">
               <?php
                 $cek=$this->model_app->umenu_akses("kepegawaian",$this->session->id_session);
                 if($cek==1 OR $this->session->level=='admin'){
                   echo "<li><a href='".base_url()."Lorpo/kepegawaian'> Semua Data</a></li>";
                 }
                 $cek=$this->model_app->umenu_akses("addkepegawaian",$this->session->id_session);
                 if($cek==1 OR $this->session->level=='admin'){
                   echo "<li><a href='".base_url()."Lorpo/tambah_pegawai'>Tambah Baru</a></li>";
                 }
                 
               ?>
               </ul>
             </li>

            <li class="treeview">
              <a href="#" ><i class="fa fa-users"></i> <span>Pengguna</span></a>
              <ul class="treeview-menu">
              <?php
               
                $cek=$this->model_app->umenu_akses("pengguna",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."lorpo/manajemenuser'> Semua Pengguna</a></li>";
                }

                $cek=$this->model_app->umenu_akses("addpengguna",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."lorpo/tambah_manajemenuser'> Tambah Baru</a></li>";  
                }

                 ?>
            </ul>
          </li>
            

          </ul>
        </section>