          <section class="content"> 
            <div class="col-xs-12">  
              <div  class="sky-form"> 
              <div class="box">

                <!--=== Breadcrumbs ===-->
                <div class="breadcrumbs">
                 
                    <h1 class="pull-left ">Manajemen User</h1>
                    <ul class="pull-left breadcrumb">
                      <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
                      <li class="active">Semua User</li>
                    </ul>

                <div class="box-header">
                 
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>Lorpo/tambah_manajemenuser'><i class ="fa fa-plus" ></i>&nbsp;Tambah Baru</a>
                </div><!-- /.box-header -->
                </div>
                <!--=== End Breadcrumbs ===-->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Blokir</th>
                        <th>Level</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    if ($row['foto'] == ''){ $foto ='blank.png'; }else{ $foto = $row['foto']; }
                    echo "<tr><td>$no</td>
                              <td>$row[username]</td>
                              <td>$row[nama_lengkap]</td>
                              <td>$row[email]</td>
                              <td><img style='border:1px solid #cecece' width='40px' class='img-circle' src='".base_url()."asset/foto_user/$foto'></td>
                              <td>$row[blokir]</td>
                              <td>$row[level]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."Lorpo/edit_manajemenuser/$row[username]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."Lorpo/delete_manajemenuser/$row[username]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              </div>
              </section>