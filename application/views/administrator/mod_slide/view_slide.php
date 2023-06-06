         <section class="content">
            <div class="col-xs-12">  
               <div  class="sky-form"> 
              <div class="box">

                  <!--=== Breadcrumbs ===-->
                <div class="breadcrumbs">
                 
                    <h1 class="pull-left ">Slider</h1>
                    <ul class="pull-left breadcrumb">
                      <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
                      <li class="active">Semua Slide</li>
                    </ul>

                <div class="box-header">
                 
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>Lorpo/tambah_slide'><i class ="fa fa-plus" ></i>&nbsp;Tambah Baru</a>
                </div><!-- /.box-header -->
                </div>
                <!--=== End Breadcrumbs ===-->
              
                <div class="box-body">
                <?php
                foreach ($record as $row){
                  if ($row['status']=='Y'){ $status = '<span style="color:#fff">Aktif</span>'; }else{ $status = '<span style="color:red">Tidak Aktif</span>'; }
                  ?>
                <div class="col-md-4">
                <div class="card">
                 <img class="img-responsive" src="<?php echo base_url();?>asset/img_slide/<?php echo $row['slide'] ?>">
                 <div class="blok">
                  <?php
                  if ($row['status']=='Y'){ 
                    echo"

                  <a data-toggle='tooltip' data-placement='top' class='btn btn-success btn-xs' title='Nonktifkan' href='".base_url()."Lorpo/publish_slide/$row[id]/$row[status]'><span class='glyphicon glyphicon-ok'></span>&nbsp;$status</a>";
                   }else{
                   echo"
                   <a data-toggle='tooltip' data-placement='top'  title='Aktifkan' href='".base_url()."Lorpo/publish_slide/$row[id]/$row[status]'><span class='glyphicon glyphicon-unchecked'></span>&nbsp;$status</a>";
                 }
                   ?>
                   <?php
                   echo"

                  <a data-toggle='tooltip' data-placement='top' class='btn btn-danger btn-xs' title='Delete Slide' href='".base_url()."Lorpo/delete_slide/$row[id]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span>&nbsp;Hapus</a>";?>
                    <a data-toggle='tooltip' data-placement='top' title='Posisi Slide' href="<?php echo base_url();?>Lorpo/slide_posisi/<?php echo $row['id']?>/<?php echo $row['posisi'] ?>"><?php if($row['posisi']=='1'){ echo "&nbsp;&nbsp;&nbsp;Slide Depan";}else { echo "&nbsp;&nbsp;&nbsp;Slide Berikutnya";}?></a>
                 </div>
                 </div>
                </div>
                <?php } ?>

              </div>
              </div>
               </section>  