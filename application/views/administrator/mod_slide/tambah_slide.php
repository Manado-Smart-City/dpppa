 <section class="content">
<!-- Order Form -->
<div class="col-xs-12">  
  <div  class="sky-form">
 <div class="box">

    <div class="breadcrumbs">
     
        <h1 class="pull-left">Tambah Slide</h1>
        <ul class="pull-right breadcrumb">
          <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Tambah Slide</li>
        </ul>
    </div>
   
         <?php 
             echo form_open_multipart('Lorpo/tambah_slide') ; ?>

            <fieldset>
              <div class="row">
                <section class="col col-8">
                 
                <label class="label">Slide&nbsp;<i>*</i> (Ukuran Slide = 2560 x 1000 ) (Max Upload Slide = 2M )</label>
                <input type="file" id="input-file-now-custom-2" name="gambar" class="dropify" data-height="200" />
              
                </section>

                 <section class="col col-4">
                  <label class="label">Slide Posisi&nbsp;<i>*</i></label>
                  <div class="box-category">
                    <label class="checkbox"><input type="checkbox" name="posisi" value="1" checked ><i></i>Depan</label>
                    <label class="checkbox"><input type="checkbox" name="posisi" value="0"><i></i>Belakang</label> 
                  </div>
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

  </div>
</div>
</div>
 </section>    