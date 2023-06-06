<!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ADMINISTRATOR</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
            <div class="blok-header">
              <ul class="nav navbar-nav">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class ="fa fa-plus" ></i>&nbsp;Baru <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url(); ?>lorpo/tambah_listberita">Berita</a></li> 
                         <!-- <li><a href="<?php echo base_url(); ?>lorpo/tambah_album">Album</a></li>--> 
                          <li><a href="<?php echo base_url();?>Lorpo/tambah_gallery">Galeri</a></li>
                          <?php if($this->session->level=='admin'){?>
                          <li><a href="<?php echo base_url();?>Lorpo/tambah_manajemenuser">Pengguna</a>
                            <?php } ?>
                          </li>
                        </ul>
                  </li>
            </ul>
            
          </div>
          <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
              
              <li class="dropdown messages-menu">
                <a href="<?php echo base_url(); ?>Lorpo/bukti_tayang">
                  <i class ="fa fa-download" ></i>
                  </i>Bukti Tayang
                </a>
            </li>
          
            <li class="dropdown messages-menu">
                <a href="<?php echo base_url(); ?>Lorpo/logout">
                  <i class ="fa fa-cog " ></i>
                  </i>Logout
                </a>
            </li>

            <li>
                <a target='_BLANK' href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-new-window"></i></a>
            </li>
        </ul>
        </div>
    </nav>