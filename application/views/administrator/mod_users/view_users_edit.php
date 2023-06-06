<section class="content">
<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>

              <div class='breadcrumbs'>
               
                  <h1 class='pull-left '>Edit Data $rows[level]</h1>
                  <ul class='pull-left breadcrumb'>
                    <li><a href='<?php echo base_url(); ?>Lorpo/home'>Beranda Dasbor</a></li>
                    <li class='active'>Edit Data $rows[level]</li>
                  </ul>
              
              </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('lorpo/edit_manajemenuser',$attributes); 
              if ($rows['foto']==''){ $foto = 'users.gif'; }else{ $foto = $rows['foto']; }
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[username]'>
                    <input type='hidden' name='ids' value='$rows[id_session]'>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='a' value='$rows[username]'></td></tr>
                    <tr><th scope='row'>Password</th>                 <td><input type='password' class='form-control' name='b' onkeyup=\"nospaces(this)\"></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>             <td><input type='text' class='form-control' name='c' value='$rows[nama_lengkap]'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>                    <td><input type='email' class='form-control' name='d' value='$rows[email]'></td></tr>
                    <tr><th scope='row'>No Telepon</th>                  <td><input type='number' class='form-control' name='e' value='$rows[no_telp]'></td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                     <td><input type='file' class='form-control' name='f'><hr style='margin:5px'>";
                                                                                 if ($rows['foto'] != ''){ echo "<i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_user/$rows[foto]'>$rows[foto]</a>"; } echo "</td></tr></td></tr>";
                    if ($this->session->level == 'admin'){
                      echo "<tr><th scope='row'>Blokir</th>                   <td>"; if ($rows['blokir']=='Y'){ echo "<input type='radio' name='h' value='Y' checked> Ya &nbsp; <input type='radio' name='h' value='N'> Tidak"; }else{ echo "<input type='radio' name='h' value='Y'> Ya &nbsp; <input type='radio' name='h' value='N' checked> Tidak"; } echo "</td></tr> ";

                    }
                  echo "</tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'><i class ='fa fa-check' ></i>Sumbit</button>
                    <a button type='reset' onclick='self.history.back()' class='btn btn-danger pull-right'>
                    <i class ='fa fa-times' ></i>Batal</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();?>
</section>