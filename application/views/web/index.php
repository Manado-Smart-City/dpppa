<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

    <!-- Basic -->
    <title><?php echo $title?></title>

    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url('asset/images/favicon.png');?>" rel="shortcut icon"/>
    <!-- Page Description and Author -->
    <meta name="description" content="BPPPA- Pemerintah Kota Manado">
    <meta name="author" content="iThemesLab">

    <!-- Bootstrap CSS  -->
    <link href="<?php echo base_url();?>assets/front/css/bootstrap.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo base_url();?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
 
     <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.css">
  
    <!-- Font Awesome CSS -->
    <link href="<?php echo base_url();?>assets/front/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Owl Carousel CSS -->
    <link href="<?php echo base_url();?>assets/front/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/front/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/front/css/owl.transitions.css" rel="stylesheet" type="text/css">
    
    <!-- Light Box CSS -->
    <link href="<?php echo base_url();?>assets/front/css/lightbox.css" rel="stylesheet" type="text/css">

    <!-- Construction CSS Styles  -->
    <link href="<?php echo base_url();?>assets/front/css/style.css" rel="stylesheet" type="text/css">
    
    <!-- Default Color -->
    <link href="<?php echo base_url();?>assets/front/css/colors/light-red.css" rel="stylesheet" type="text/css">

   

    <!-- Responsive CSS Style -->
   
     <link href="<?php echo base_url();?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- Css3 Transitions Styles  -->

     <link href="<?php echo base_url();?>assets/front/css/animate.css" rel="stylesheet" type="text/css">

     <!-- Theme style -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/AdminLTE.min.css">

     <script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
 
     
</head>	
<body>
    
  <div class="container">

<!--include header-->
	<?php include('header.php');?>
<!--include header-->


<?php
	if($content) {
	$this->load->view($content);
}?>
<!-- content -->

<!-- footer -->
	<?php include('footer.php');
    $this->model_utama->kunjungan(); 
    ?>
<!-- //footer -->
</div><!-- /.container -->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Construction JS File -->
    <script src="<?php echo base_url();?>assets/front/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/lightbox.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/jsjquery.appear.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.fitvids.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/superfish.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/supersubs.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/styleswitcher.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/front/js/script.js" type="text/javascript"></script>   

     <!-- DataTables -->
      <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
    
      $(function () { 
        $("#example1").DataTable();
        
      });
    </script>

</body>


</html>
