
 <!-- Start Blog Page -->
    <div class="row">
        <div class="col-md-12 ">
            <div class="blog-section">
                    <h3 class="section-title">Database Pegawai</h3>
                      <table id="example1" class="table table-bordered table-striped"> 
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pejabat</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Pangkat/Golongan</th>
                                <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $no=1;
                            foreach($listpejabat as $listpejabat) { 
                               ?>
                            <tr>
                                <td><?php echo $no?></td>
                                <td><?php echo $listpejabat['nama_pejabat'];?></td>
                                <td><?php echo $listpejabat['nip'];?></td>
                                <td><?php echo $listpejabat['jabatan'];?></td>
                                <td><?php echo $listpejabat['pangkat_gol'];?></td>
                                <td><a href="<?php echo base_url(); ?>database/pegawai_detail/<?php echo $listpejabat['slug']?>">Detail</a></td>
                            </tr>
                            <?php $no++; } ?>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
 
    <script>
  
      $(function () { 
        $("#example1").DataTable();
      
      });
    </script>