 <section class="content">
<!-- Order Form -->
<div class="col-xs-12">  
  <div  class="sky-form">
    <div class="box">
      <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
     
        <h1 class="pull-left ">Tambah Data Pegawai</h1>
        <ul class="pull-left breadcrumb">
          <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Tambah Data Pegawai</li>
        </ul>
    </div>
    <!--=== End Breadcrumbs ===-->
         <?php 
              echo form_open_multipart('Lorpo/tambah_pegawai') ; ?>

            <fieldset>
              <div class="row">
                <section class="col col-8">
                  <label class="label">Nama Pegawai&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="nama_pejabat" id="nama_pejabat" required >
                  </label>
                   
                </section>
                  <section class="col col-4">
                    <label class="label">Jenis Kelamin&nbsp;<i>*</i></label>
                    <label class="input">
                       <select name="jenis_kelamin" class="form-control select2">
                           <option value ='Laki - Laki' > Laki - Laki</option>
                           <option value ='Perempuan' > Perempuan</option>
                           <option value ='Waria' > Waria</option>
                                                      
                        </select>
                    </label>

                </section>
       
              </div>
                <div class="row">
                <section class="col col-8">
                  <label class="label">Jabatan&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="jabatan" id="jabatan" required >
                  </label>
                   
                </section>
                  <section class="col col-4">
                  <label class="label">Pendidikan Terakhir&nbsp;<i>*</i></label>
                <label class="input">
                   
                    <input type="text" name="pendidikan" id="pendidikan" required >
                  </label>
              
                </section>
       
              </div>


              <div class="row">
                <section class="col col-8">
                 <label class="label">NIP&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="nip" id="nip" required >
                  </label>
   
                </section>

                <section class="col col-4">
                 <label class="label">TMT Pangkat&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tmtpangkat" class ="datepicker" id="#example1" required>
                  </label>
                  </section>

              </div>
                <div class="row">
                <section class="col col-8">
                  <label class="label">Agama&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <select name="agama" class="form-control select2">
                        <option value ='Kristen Protestan' > Kristen Protestan</option>
                        <option value ='Islam' > Islam</option>
                        <option value ='Hindu' > Hindu</option>
                        <option value ='Budha' > Budha</option>
                        <option value ='Konghucu' > Konghucu</option>
                        <option value ='Katolik' > Katolik</option>                               
                     </select>
                  </label>
                   
                </section>
                  <section class="col col-4">
                  <label class="label">TMT Jabatan&nbsp;<i>*</i></label>
                 <label class="input">
                  <i class="icon-append fa fa-calendar"></i>
                   <input type="text" name="tmtjabatan" class ="datepicker" id="#example1" >
                  </label>
              
                </section>
              
              </div>
                <div class="row">
                <section class="col col-8">
                  <label class="label">TTL&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                     <input type="text" name="ttl" id="ttl" required >
                  </label>
                   
                </section>
                  <section class="col col-4">
                      
                    <label class="label">Pangkat Golongan&nbsp;<i>*</i></label>
                  <label class="input">
                      <input type="text" name="pangkat" id="pangkat" required>
                    </label>
                  
 
                </section>

              </div>
              <div class="row">
                  <section class="col col-8">
                     <label class="label">Gambar&nbsp;<i>*</i></label>
                     <label for="file" class="input input-file">
                     <div class="button"><input type="file" name="gambar" multiple onchange="this.parentNode.nextSibling.value = this.value">Pilih Gambar</div><input type="text" name="gambar">
                   </label>              
                  </section>
                 
                
                </div>
            </fieldset>
            <footer>
              <button type='submit' name='submit' class='btn btn-info'><i class ="fa fa-check" ></i>&nbsp;Submit</button>
                    <a href='#'><button type='reset'  onclick="self.history.back()" class='btn btn-danger pull-right'>
                      <i class ="fa fa-times" ></i>&nbsp;Batal</button></a>
              <div class="progress"></div>
            </footer>
              </form>
           <!-- <div class="message">
              <i class="rounded-x fa fa-check"></i>
            </div>-->
      
          </form>
          <!-- End Order Form -->
  </div>
</div>
</div>
 </section>    