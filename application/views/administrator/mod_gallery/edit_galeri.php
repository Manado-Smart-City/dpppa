 <section class="content">
<!-- Order Form -->
 <div class="col-xs-12">  
    <div  class="sky-form">
          <!--=== Breadcrumbs ===-->
           <div class="breadcrumbs">
     
        <h1 class="pull-left">Edit Gallery</h1>
        <ul class="pull-right breadcrumb">
          <li><a href="<?php echo base_url(); ?>lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Edit Galeri</li>
        </ul>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
           <?php  
              echo form_open_multipart('lorpo/edit_gallery'); ?>
            <fieldset>
              <div class="row">
                <input type="hidden" name="id" value="<?php echo $rows['id_gallery']?>">
                <input type='hidden' name='dibaca' value="<?php echo $rows['dibaca']?>">

                 <section class="col-md-12">
                  <label class="label">Judul&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="judul" id="judul" value="<?php echo $rows['jdl_gallery']?>" required>
                  </label>
                </section>
   
              </div>

              <div class="row">
                <section class="col-md-12">

                <label class="label">Keterangan&nbsp;<i>*</i></label>
                <textarea id="picture_description" class="form-control mceNoEditor" name="ketgambar" rows="5" ><?php echo $rows['keterangan']?></textarea>
                 
                </section>

               
              </div>


              <div class="row">
               <section class="col-md-8">   
                  <label class="label">Gambar&nbsp;<i>*</i></label>
                  <label for="file" class="input input-file">
                  <div class="button"><input type="file" name="gambar" multiple onchange="this.parentNode.nextSibling.value = this.value">Pilih Gambar</div><input type="text" name="gambar" value=" <?php echo $rows['gbr_gallery']?>" readonly>
                </label>
              
                </section>
                <section class="col-md-4">   
                  <label class="label">Tanggal&nbsp;<i>*</i></label>
                  <label for="file" class="input input-file">
                  <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tgl" class ="datepicker" id="#example1" value=" <?php echo $rows['tanggal']?>" required>
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
            <div class="message">
              <i class="rounded-x fa fa-check"></i>
             
            </div>
         
          </form>
      </div>    
</div>
          <div class="margin-bottom-40"></div>
      </section> 