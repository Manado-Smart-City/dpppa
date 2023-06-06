 <section class="content">
            <div class="col-xs-12"> 
              <div  class="sky-form"> 
              <div class="box">

                <!--=== Breadcrumbs ===-->
                <div class="breadcrumbs">
                 
                    <h1 class="pull-left ">Semua Berita</h1>
                    <ul class="pull-left breadcrumb">
                      <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
                      <li class="active">Semua Berita</li>
                    </ul>

                <div class="box-header">
                 
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>Lorpo/tambah_listberita'><i class ="fa fa-plus" ></i>&nbsp;Tambah Baru</a>
                </div><!-- /.box-header -->
                </div>
                <!--=== End Breadcrumbs ===-->
                <form action="<?php echo base_url('Lorpo/delete_multiple_post'); ?>" method="post">
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th style='width:20px'>No</th>
                        <th>Judul Berita | Link</th>
                       
                        <th>Status</th>
                        <th style='width:75px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $tgl_posting = tgl_indo($row['tanggal']);
                    if ($row['status']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }
                    echo "<tr>
                        <td><center>
                          <label class='custom-control custom-checkbox'>
                            <input type='checkbox' name='msg[]' id='check' value='$row[id_berita];'  class='custom-control-input'>
                              <span class='custom-control-indicator'></span>
                          </label>
                          </center>
                          </td>
                              <td>$no</td>
                              <td>
                              ";
                              if ($row['id_kategori']=="Berita") {
                                   echo"
                                   $row[judul] <br>
                                    <i><a style= color:#3c8dbc; href='".base_url()."listberita/detail/$row[slug]' target='_Blank'> ";?>
                                      http://<?php echo getDomain();?>
                                      <?php echo"/listberita/detail/$row[slug]</i></a>
                                    <br><small class='label1  pull-left bg-aqua'>
                                    <i class='fa fa-rss'>&nbsp;$row[id_kategori]</i>
                                     &nbsp;&nbsp;&nbsp;&nbsp;";
                                     
                                }else if($row['id_kategori']=="KLA"){
                                    echo"
                                    $row[judul] <br>
                                     <i><a style= color:#3c8dbc; href='".base_url()."kla/detail/$row[slug]' target='_Blank'> ";?>
                                       http://<?php echo getDomain();?>
                                       <?php echo"/kla/detail/$row[slug]</i></a>
                                     <br><small class='label1  pull-left bg-aqua'>
                                     <i class='fa fa-file'>&nbsp;$row[id_kategori]</i>
                                      &nbsp;&nbsp;&nbsp;&nbsp;";
                                
                                  }else{
                                    echo"
                                    $row[judul] <br>
                                     <i><a style= color:#3c8dbc; href='".base_url()."pengumuman/detail/$row[slug]' target='_Blank'> ";?>
                                       http://<?php echo getDomain();?>
                                       <?php echo"/pengumuman/detail/$row[slug]</i></a>
                                     <br><small class='label1  pull-left bg-aqua'>
                                     <i class='fa fa-file'>&nbsp;$row[id_kategori]</i>
                                      &nbsp;&nbsp;&nbsp;&nbsp;";
                                  }
                                  
                              echo"
                              <i class='fa fa-user'>&nbsp;$row[username]</i>
                               &nbsp;&nbsp;&nbsp;&nbsp;
                              <i class='fa fa-calendar'>&nbsp; $tgl_posting </i>&nbsp;&nbsp;&nbsp;&nbsp;
                              <i class='fa fa-eye' aria-hidden='true'>&nbsp;$row[dibaca] &nbsp;Kali Dilihat</i>
                             </<small>
                              </td>
                               
                              <td>$status</td>
                              <td><center>
                                <a class='btn btn-primary btn-xs' title='Published' href='".base_url()."Lorpo/publish_listberita/$row[id_berita]/$row[status]'><span class='glyphicon glyphicon-ok'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."Lorpo/edit_listberita/$row[id_berita]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."Lorpo/delete_berita/$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
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
                            <td colspan="4">
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