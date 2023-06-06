 <section class="content">
    <div class="col-xs-12"> 
        <div  class="sky-form"> 
            <div class="box">

                <!--=== Breadcrumbs ===-->
                <div class="breadcrumbs">
                 
                    <h1 class="pull-left ">Bukti Tayang</h1>
                    <ul class="pull-left breadcrumb">
                      <li><a href="<?php echo base_url(); ?>Lorpo/home">Beranda Dasbor</a></li>
                      <li class="active">Download Bukti Tayang</li>
                    </ul>

                </div>
                <!--=== End Breadcrumbs ===-->
               
                <div class="box-body">
                        <fieldset>
                             <?php 
                      
                       echo form_open_multipart('lorpo/bukti_tayang');
                       
                        if (isset($_POST['tgl_mulai'])OR isset($POST['tgl_selesai'])){
                         $tgl_mulai = strip_tags($_POST['tgl_mulai']);
                         $tgl_selesai = strip_tags($_POST['tgl_selesai']);
                        }else{
                         $tgl_mulai = '';
                         $tgl_selesai = '';
                         }
                        ?>
                          <div class="row">
                            <section class="col col-4">
                              <label class="label" style="margin-left:-14px">Tanggal Mulai&nbsp;<i>*</i>
                              </label>
                              <label class="input" style="margin-left:-14px">
                                <input type="text" name="tgl_mulai" id="#example" class="datepicker" value="<?php echo $tgl_mulai;?>" required >
                              </label>
                              
                             
                            </section>
                              <section class="col col-4">
                              <label class="label">Tanggal Selesai&nbsp;<i>*</i></label>
                            <label class="input">
                                  <input type="text" name="tgl_selesai" class="form-control pull-right" id="datepicker" required value="<?php echo $tgl_selesai;?>">
                                
                            </label>
                            </section>
                             <section class="col col-4">
                                 <button style="margin-top:32px;float:left" type='submit' name='submit' class='btn btn-info'><i class ="fa fa-filter" ></i>&nbsp;Filter</button>
                            </form>
                            
                            <form action="<?php echo base_url() ?>ctk_bukti_tayang" method="post" name="form" target="_blank">
                                <input type="hidden" name="tglmulai" value="<?php  if( ! empty($record)){ echo $tgl_mulai;}?>">
                                <input type="hidden" name="tglselesai" value="<?php  if( ! empty($record)){ echo $tgl_selesai;}?>">
                                      
                                  <button style="margin-top:32px;margin-left:10px;" type='submit' name='cetak' class='btn btn-success'><i class ="fa fa-download" ></i>&nbsp;Download</button>
                                  
                            </form>
                            </section>
                        </div>
                          

                        </fieldset>
                        
                        <?php if (! empty($record)){?>
                            
                                <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    
                                    <th style='width:20px'>No</th>
                                    <th>Judul Berita</th>
                                    <th style='width:120px'>Tanggal</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php $no= 1; 
                                   foreach ($record as $row) {
                                       $tgl = tgl_indo($row->tanggal);
                                    echo" 
                                    <tr><td>$no</td>
                                    <td>$row->judul</td>
                                    <td>$tgl</td>
                                    </tr>
                                    ";
                                     $no ++; } ?>
                                </tbody>
                                </table>
                        
                       <?php  } ?>
                        
                </div>
            
            </div>
        </div>
    </div>
           
</section>  