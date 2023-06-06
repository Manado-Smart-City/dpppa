 <section class="content">
<!-- Order Form -->
<div class="col-xs-12">  
  <div  class="sky-form">
    <div class="box">
      <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
     
        <h1 class="pull-left ">Edit Data Pegawai</h1>
        <ul class="pull-left breadcrumb">
          <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Edit Data Pegawai</li>
        </ul>
    </div>
    <!--=== End Breadcrumbs ===-->
         <?php 
              echo form_open_multipart('Lorpo/edit_pegawai') ; ?>

            <fieldset>
              <div class="row">
                <input type='hidden' name='id' value="<?php echo $rows['id_pejabat']?>">
                <section class="col col-8">
                  <label class="label">Nama Pegawai&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="nama_pejabat" id="nama_pejabat" value="<?php echo $rows['nama_pejabat']?>" required >
                  </label>
                   
                </section>
                  <section class="col col-4">
                    <label class="label">Jenis Kelamin&nbsp;<i>*</i></label>
                    <label class="input">
                       <select name="jenis_kelamin" class="form-control select2">
                           <option <?php if($rows['jenis_kelamin']=='Laki - Laki'){ echo "selected"; } ?>  value ='Laki - Laki' > Laki - Laki</option>
                           <option <?php if($rows['jenis_kelamin']=='Perempuan'){ echo "selected"; } ?> value ='Perempuan' > Perempuan</option>
                           <option <?php if($rows['jenis_kelamin']=='Waria'){ echo "selected"; } ?> value ='Waria' > Waria</option>
                                                      
                        </select>
                    </label>

                </section>
       
              </div>
                <div class="row">
                <section class="col col-8">
                  <label class="label">Jabatan&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="jabatan" id="jabatan" value="<?php echo $rows['jabatan']?>" required >
                  </label>
                   
                </section>
                  <section class="col col-4">
                  <label class="label">Pendidikan Terakhir&nbsp;<i>*</i></label>
                <label class="input">
                   
                    <input type="text" name="pendidikan" id="pendidikan" value="<?php echo $rows['pend_terakhir']?>" required >
                  </label>
              
                </section>
       
              </div>


              <div class="row">
                <section class="col col-8">
                 <label class="label">NIP&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="nip" id="nip" value="<?php echo $rows['nip']?>" required >
                  </label>
   
                </section>

                <section class="col col-4">
                 <label class="label">TMT Pangkat&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tmtpangkat" class ="datepicker" id="#example1" value="<?php echo $rows['tmt_pangkat']?>" required>
                  </label>
                  </section>

              </div>
                <div class="row">
                <section class="col col-8">
                  <label class="label">Agama&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <select name="agama" class="form-control select2">
                        <option <?php if($rows['agama']=='Kristen Protestan'){ echo "selected"; } ?> value ='Kristen Protestan' > Kristen Protestan</option>
                        <option <?php if($rows['agama']=='Islam'){ echo "selected"; } ?> value ='Islam' > Islam</option>
                        <option <?php if($rows['agama']=='Hindu'){ echo "selected"; } ?> value ='Hindu' > Hindu</option>
                        <option <?php if($rows['agama']=='Budha'){ echo "selected"; } ?> value ='Budha' > Budha</option>
                        <option <?php if($rows['agama']=='Konghucu'){ echo "selected"; } ?> value ='Konghucu' > Konghucu</option>
                        <option <?php if($rows['agama']=='Katolik'){ echo "selected"; } ?> value ='Katolik' > Katolik</option>                               
                     </select>
                  </label>
                   
                </section>
                  <section class="col col-4">
                  <label class="label">TMT Jabatan&nbsp;<i>*</i></label>
                 <label class="input">
                  <i class="icon-append fa fa-calendar"></i>
                   <input type="text" name="tmtjabatan" class ="datepicker" id="#example1" value="<?php echo $rows['tmt_jabatan']?>">
                  </label>
              
                </section>
              
              </div>
                <div class="row">
                <section class="col col-8">
                  <label class="label">TTL&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                     <input type="text" name="ttl" id="ttl" value="<?php echo $rows['ttl']?>" required >
                  </label>
                   
                </section>
                  <section class="col col-4">
                      
                    <label class="label">Pangkat Golongan&nbsp;<i>*</i></label>
                  <label class="input">
                      <input type="text" name="pangkat" id="pangkat" value="<?php echo $rows['pangkat_gol']?>" required>
                    </label>
                  
 
                </section>

              </div>
              <div class="row">
                  <section class="col col-8">
                     <label class="label">Gambar&nbsp;<i>*</i></label>
                     <label for="file" class="input input-file">
                     <div class="button"><input type="file" name="gambar" multiple onchange="this.parentNode.nextSibling.value = this.value">Pilih Gambar</div><input type="text" name="gambar" value="<?php echo $rows['foto']?>">
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