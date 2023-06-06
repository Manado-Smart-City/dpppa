             <section class="content">
            <div class="col-xs-12">  
                <div  class="sky-form"> 
              <div class="box">
              <!--=== Breadcrumbs ===-->
                <div class="breadcrumbs">
                 
                    <h1 class="pull-left ">Galeri</h1>
                    <ul class="pull-left breadcrumb">
                      <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
                      <li class="active">Semua Gambar</li>
                    </ul>

                <div class="box-header">
                 
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>Lorpo/tambah_gallery'><i class ="fa fa-plus" ></i>&nbsp;Tambah Baru</a>
                </div><!-- /.box-header -->
                </div>
                <!--=== End Breadcrumbs ===-->
               
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th width='60px'>Foto</th>
                        <th>Judul</th>
                        <th width="200">Tanggal</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                      $tgl_posting = tgl_indo($row['tanggal']);
                    echo "<tr><td>$no</td>
                              <td><img src='".base_url()."asset/img_galeri/$row[gbr_gallery]' width='50'></td>
                              <td>$row[jdl_gallery]</td>
                              <td>$tgl_posting</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."lorpo/edit_gallery/$row[id_gallery]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."lorpo/delete_gallery/$row[id_gallery]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
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