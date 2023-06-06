 <section class="content">
<!-- Order Form -->
<div class="col-xs-12">  
  <div  class="sky-form">
    <div class="box">

      <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
     
        <h1 class="pull-left ">Tambah Berita</h1>
        <ul class="pull-left breadcrumb">
          <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Tambah Berita</li>
        </ul>
    </div>
    <!--=== End Breadcrumbs ===-->
         <?php 
              echo form_open_multipart('Lorpo/tambah_listberita') ; ?>

            <fieldset>
              <div class="row">
                <section class="col col-8">
                  <label class="label">Judul&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                    <input type="text" name="judul" id="judul" required onkeyup="createslug()">
                  </label>
                   <input type ="hidden" id="slug" name ="seo" class="form-control" placeholder="Judul SEO" autocomplete="off" readonly="On" required>
                   <i style="font-size: 13px">Permalink : http://<?php echo getDomain();?>/slug/<span id="slg"></span></i>
                </section>
                  <section class="col col-4">
                  <label class="label">Tanggal Tayang&nbsp;<i>*</i></label>
                <label class="input">
                    <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tgl" class ="datepicker" id="#example1" required>
                  </label>
              
                </section>
       
              </div>

              <div class="row">
                <section class="col col-8">
                 
                <label class="label">Konten&nbsp;<i>*</i></label>
                  <textarea style='height:500px' id='mymce'  name='isi_berita' ></textarea>
              
                </section>
                 <section class="col col-4">   
                  <label class="label">Gambar&nbsp;<i>*</i></label>
                  <label for="file" class="input input-file">
                  <div class="button"><input type="file" name="gambar" multiple onchange="this.parentNode.nextSibling.value = this.value">Pilih Gambar</div><input type="text" name="gambar">
                </label>
                  
              
                </section>

                <section class="col col-4">
                  <label class="label">Deskripsi Gambar&nbsp;<i>*</i></label>                         
                 <label class="textarea"> 
                 <textarea id="picture_description" class="form-control mceNoEditor" name="keterangan_gambar" rows="3"></textarea>
                </label>
                  
                  </section>
                
                 <section class="col col-4">
                  <label class="label">Kategori&nbsp;<i>*</i></label>
                  <div class="box-category">
                    <label class="checkbox"><input type="checkbox" name="kategori" value="Berita" checked ><i></i>Berita</label>
                   
                    <label class="checkbox"><input type="checkbox" name="kategori" value="Pengumuman"><i></i>Pengumuman</label>
                    
                     <label class="checkbox"><input type="checkbox" name="kategori" value="KLA"><i></i>KLA</label>
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
           <!-- <div class="message">
              <i class="rounded-x fa fa-check"></i>
            </div>-->
      
          </form>
          <!-- End Order Form -->
  </div>
</div>
</div>

 </section>    