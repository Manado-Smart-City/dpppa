<?php 
echo $script_captcha; // javascript recaptcha 
$errors = validation_errors();
$msg = $this->session->flashdata('msg');
?>

<?= ( ($msg) ? '<div class="alert alert-info">'. $msg .'</div>' : '' ); ?>

<?php
if($errors) :
echo validation_errors('<div class="alert alert-warning">', '</div>');
endif;
?>

  <!-- Start Contact Section -->
    <div class="row">
        <div class="col-md-8">
            <div class="contact-section">
                <h3 class="section-title">Form Kontak</h3>
                <!-- Start Contact Form -->
                <div id="contact-form" class="contatct-form">
                   
                    
                    <?= form_open('kontak/send'); ?>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nama<span class="required">*</span></label>
                                
                                <?= form_input(array('name' => 'name', 'value' => set_value('name'), 'id' => 'nn', 'required' => 'required','placeholder' =>'Nama Lengkap...' )); ?>
                                
                                
                            </div>
                            <div class="col-md-4">
                                <label for="e-mail">Email<span class="required">*</span></label>
                                
                                <?= form_input(array( 'name' => 'email', 'value' => set_value('email'), 'id' => 'em', 'required' => 'required','placeholder' =>'@gmail.com...')); ?>
                                
                                
                            </div>
                            <div class="col-md-4">
                                <label for="url">No. HP</label>
                                
                                <?= form_input(array( 'name' => 'notlp', 'value' => set_value('notlp'), 'id' => 'no', 'required' => 'required','placeholder' =>'Nomor Telepon...')); ?>
                                
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="message">Deskripsi</label>
                                
                                <?= form_textarea(array('name' => 'body','id' => 'msg', 'required' => 'required','placeholder' =>'Deskripsi...', 'rows' => '10', 'cols'=>'45')); ?>
                                
       
                                <?php echo $captcha // tampilkan recaptcha ?>
                                
                                <input type="submit" name="submit" class="btn btn-primary" id="submit_btn" value="Kirim Pesan">
                            </div>
                        </div>
                        
                        
                        
                   <?= form_close(); ?>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-section">
                
                <h3 class="section-title">Informasi</h3>
                
                <!-- Some Info -->
                <p>Dinas Pemberdayaan Perempuan dan Perlindungan Anak mempunyai tugas menyelenggarakan urusan di bidang pemberdayaan perempuan dan perlindungan anak dalam pemerintahan dilingkungan Pemerintah Kota Manado </p>
                
                <!-- Info - Icons List -->
                <ul class="icons-list">
                    <li><i class="fa fa-globe">  </i> <strong>Alamat:</strong> Jl. Balaikota No.01 Tikala Ares Manado</li>
                    <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> info@yourcompany.com</li>
                    <li><i class="fa fa-mobile"></i> <strong>Nomor Telepon:</strong> +12 345 678 001</li>
                </ul>
                
                
                <h3 class="section-title">Jam Pelayanan</h3>
                
                <!-- Info - List -->
                <ul class="list-unstyled">
                    <li><strong>Senin - Jumat</strong> - 09:00 - 17:00 </li>
                    <li><strong>Sabtu - Minggu</strong> Libur</li>
                </ul>
                
            </div>
        </div>
    </div>
    <!-- End Contact Section -->