 <section class="content">
            <div class="col-xs-12"> 
              <div  class="sky-form"> 
              <div class="box">

                <!--=== Breadcrumbs ===-->
                <div class="breadcrumbs">
                 
                    <h1 class="pull-left ">Semua Data Pegawai</h1>
                    <ul class="pull-left breadcrumb">
                      <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
                      <li class="active">Semua Data Pegawai</li>
                    </ul>

                <div class="box-header">
                 
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>Lorpo/tambah_pegawai'><i class ="fa fa-plus" ></i>&nbsp;Tambah Baru</a>
                </div><!-- /.box-header -->
                </div>
                <!--=== End Breadcrumbs ===-->
                <form action="<?php echo base_url('Lorpo/delete_multiple_pegawai'); ?>" method="post">
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th style='width:20px'>No</th>
                        <th>Nama Pegawai</th>                                         
                        <th>Jabatan</th>                                         
                        <th>NIP</th>                                         
                        <th>Agama</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Pangkat Gol</th>                   
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $tmtpangkat = tgl_indo($row['tmt_pangkat']);
                    $tmtjabatan = tgl_indo($row['tmt_jabatan']);
                    
                    echo "<tr>
                    <td><center>
                              <label class='custom-control custom-checkbox'>
                              <input type='checkbox' name='msg[]' id='check' value='$row[id_pejabat];'  class='custom-control-input'>
                              <span class='custom-control-indicator'></span>
                              </label>
                              </center></td>
                              <td>$no</td>
                              <td>$row[nama_pejabat] </td>    
                              <td>$row[jabatan]</td>
                              <td>$row[nip]</td>
                              <td>$row[agama]</td>
                              <td>$row[ttl]</td>
                              <td>$row[jenis_kelamin]</td>
                              <td>$row[pangkat_gol]</td>
                              
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."Lorpo/edit_pegawai/$row[id_pejabat]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."Lorpo/delete_pegawai/$row[id_pejabat]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                   $no++;
                    }
                  ?>
                  </tbody>
                          <tr>
                            <td><center>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox"  id="checkt-all"  name="kategori"  class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            </label>
                            </center>
                            </td>
                            <td colspan="12">
                            <?php echo"<button type='submit' name='submit' class='btn btn-danger1' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><i class='fa fa-trash-o'></i>&nbsp;Hapus Data Terpilih</button>
                            ";?> 
                      
                            </td>
                          </tr>

                </table>
              </div>
             </form>
              </div>
              </div>
              </div>
           
               </section>  