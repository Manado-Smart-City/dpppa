<section class="content">
  <div  class="sky-form"> 

<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
              
                <div class='breadcrumbs'>
                 
                    <h1 class='pull-left '>Tambah Manajemen User</h1>
                    <ul class='pull-left breadcrumb'>
                      <li><a href='<?php echo base_url(); ?>Lorpo/home'>Beranda Dasbor</a></li>
                      <li class='active'>Semua Data User</li>
                    </ul>
              
                </div>

              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('lorpo/tambah_manajemenuser',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='a' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Password</th>                 <td><input type='password' class='form-control' name='b' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>             <td><input type='text' class='form-control' name='c' required></td></tr>
                    <tr><th scope='row'>Alamat Email</th>             <td><input type='email' class='form-control' name='d' required></td></tr>
                    <tr><th scope='row'>No Telepon</th>               <td><input type='number' class='form-control' name='e' required></td></tr>
                    <tr><th scope='row'>Upload Foto</th>              <td><input type='file' class='form-control' name='f'></td></tr>
                    <tr><th scope='row'>Level</th><td><input type='radio' name='g' value='admin' checked> Administrator  
                    
                  </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'><i class ='fa fa-check' ></i>Submit</button>
                    <a button type='reset' onclick='self.history.back()' class='btn btn-danger pull-right'>
                    <i class ='fa fa-times' ></i>Batal</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();?>
          </div>
</section>