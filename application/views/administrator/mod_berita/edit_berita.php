 <section class="content">
<!-- Order Form -->
 <div class="col-xs-12">  
    <div  class="sky-form">
          <!--=== Breadcrumbs ===-->
           <div class="breadcrumbs">
     
        <h1 class="pull-left">Edit Berita</h1>
        <ul class="pull-right breadcrumb">
          <li><a href="<?php echo base_url(); ?>lorpo/home">Beranda Dasbor</a></li>
          <li class="active">Edit Berita</li>
        </ul>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
           <?php  
              echo form_open_multipart('lorpo/edit_listberita'); ?>
            <fieldset>
              <div class="row">
                <section class="col col-8">
                   <input type='hidden' name='id' value="<?php echo $rows['id_berita']?>">
                   <input type='hidden' name='dibaca' value="<?php echo $rows['dibaca']?>">
                  <label class="label">Judul&nbsp;<i>*</i>
                  </label>
                  <label class="input">
                  <input type="text" id="judul" name ="judul" value="<?php echo $rows['judul']?>" class="form-control" autocomplete="off" onkeyup="createslug()">
                  </label>
                  <i style="font-size: 13px">Permalink : http://<?php echo getDomain();?>/slug/<span id="slg"><?php echo $rows['slug'] ?></span></i>
                
                  <input type ="hidden" id="slug" name ="seo" class="form-control" placeholder="Judul SEO" autocomplete="off" readonly="On" required>
                </section>

                <section class="col col-4">
               
                  <label class="label">Tanggal Tayang&nbsp;<i>*</i></label>
                 <label class="input">
                    <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tgl" value="<?php echo $rows['tanggal']?>" class ="datepicker" id="#example1">
                  </label>
              
                </section>
         
              
              </div>

              <div class="row">
                <section class="col col-8">
                <label class="label">Konten&nbsp;<i>*</i></label>
              <textarea id='mymce' class='form-control' name='isi_berita'><?php echo $rows['isi_berita']?></textarea> 
                </section>

                <section class="col col-4">    
                  <label class="label">Ada Gambar Terpilih
                <p><i style='color:#dd4b39' >
                 Jika gambar tidak diganti, tidak perlu memilih pilihan di bawah ini.*</i></p></label>
                  <label class="label">Gambar&nbsp;<i>*</i></label>
                  <label for="file" class="input input-file">
                  <div class="button"><input type="file" name="gambar" multiple onchange="this.parentNode.nextSibling.value = this.value">Pilih Gambar</div><input type="text" name="gambar" value=" <?php echo $rows['gambar']?>">
                </label>
                   <label class="label">
                  <?php if ($rows['gambar'] != ''){ echo "<i style='color:#dd4b39' >Lihat Gambar Saat ini : </i><a  target='_BLANK' href='".base_url()."asset/foto_berita/$rows[gambar]'>$rows[gambar]</a>"; }?>
                  </label>
                </section>

                  <section class="col col-4">
                  <label class="label">Deskripsi Gambar&nbsp;<i>*</i></label>  
                 <label class="textarea"> 
                  <textarea id="picture_description" class="form-control mceNoEditor" name="keterangan_gambar" rows="3"><?php echo $rows['keterangan_gambar']?></textarea>
                </label>
                  </section>
                
                 <section class="col col-4">
                  <label class="label">Kategori&nbsp;<i>*</i></label>
                  <div class="box-category">
                      <?php $kategori = $rows['id_kategori'] ?>
                    <label class="checkbox"><input type="checkbox" name="kategori" value="Berita" <?php if($kategori =='Berita'){echo"checked"; } ?> ><i></i>Berita</label>
                     
                    <label class="checkbox"><input type="checkbox" name="kategori" value="Pengumuman" <?php if($kategori =='Pengumuman'){echo"checked"; } ?> ><i></i>Pengumuman</label> 
                    
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
            <div class="message">
              <i class="rounded-x fa fa-check"></i>
             
            </div>
         
          </form>
      </div>    
</div>
<div class="margin-bottom-40"></div>
 </section>        