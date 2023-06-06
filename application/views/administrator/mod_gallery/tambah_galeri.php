 <section class="content">
<!-- Order Form -->
<div class="col-xs-12">  
  <div  class="sky-form">
    <div class="box">

      <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
     
        <h1 class="pull-left">Tambah Foto</h1>
        <ul class="pull-right breadcrumb">
          <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Tambah Foto</li>
        </ul>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
         <?php 
              echo form_open_multipart('Lorpo/tambah_gallery') ; ?>

            <fieldset>
              <div class="row">
               


                 <section class="col-md-12">
                  <label class="label">Judul&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="judul" id="judul" required>
                  </label>
                </section>
               

              </div>

              <div class="row">
                <section class="col-md-12">
                 
                <label class="label">Keterangan&nbsp;<i>*</i></label>
                <textarea id="picture_description" class="form-control mceNoEditor" name="ketgambar" rows="5" ></textarea>
              
                </section>
                
               

              </div>

              <div class="row">
               <section class="col-md-8">   
                  <label class="label">Gambar&nbsp;<i>*</i></label>
                  <label for="file" class="input input-file">
                  <div class="button"><input type="file" name="gambar" multiple onchange="this.parentNode.nextSibling.value = this.value">Pilih Gambar</div><input type="text" name="gambar" readonly>
                </label>
 
                </section>
                <section class="col-md-4">   
                  <label class="label">Tanggal&nbsp;<i>*</i></label>
                  <label for="file" class="input input-file">
                  <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tgl" class ="datepicker" id="#example1" required>
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