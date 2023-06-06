 <section class="content">
<!-- Order Form -->
<div class="col-xs-12">  
  <div  class="sky-form">
 <div class="box">
      <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
     
        <h1 class="pull-left">Tambah Baner</h1>
        <ul class="pull-right breadcrumb">
          <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Tambah Baner</li>
        </ul>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
         <?php 
             echo form_open_multipart('Lorpo/tambah_baner') ; ?>

            <fieldset>
              <div class="row">
              <section class="col col-4">
              <div class="bloks">
              <div class="bloks-aktif">
              <a style="color:red;"> <label class="label">Sesuaikan Ukuran Baner Dengan Ukuran Tersebut:</label>
               <label class="label">Ukuran Baner = 450 x 765</label>
               <label class="label">Max Upload Baner = 2M </label>
               </a>
               </div> 
              </div>

                </section>
                 <section class="col col-4">
                 
                <label class="label">Baner&nbsp;<i>*</i></label>
                <input type="file" id="input-file-now-custom-2" name="gambar" class="dropify" data-height="400" />
              
                </section>

                 <section class="col col-4">
                  <label class="label">Status&nbsp;<i>*</i></label>
                  <div class="box-category">
                    <label class="checkbox"><input type="checkbox" name="status" value="Y" checked ><i></i>Aktif</label>
                    <label class="checkbox"><input type="checkbox" name="status" value="N"><i></i>Konsep</label> 
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