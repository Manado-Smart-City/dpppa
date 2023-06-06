<?php 
if ($this->session->level==''){
    redirect(base_url());
}else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WELCOME ADMINISTRATOR</title>
    <meta name="author" content="ppid">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
      <link href="<?php echo base_url('asset/favicon.png');?>" rel="shortcut icon"/>
   
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
    <!-- SKY FORM -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/custom-sky-forms.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/sky-forms.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/blocks.css">

    <!-- Dropify -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dropify/dist/css/dropify.min.css">

    <!-- tinymce -->
    

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/html5-editor/bootstrap-wysihtml5.css" >
    
    

    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>

    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>

    <script src="<?php echo base_url(''); ?>asset/ckeditor/ckeditor.js"></script>
    
    <style type="text/css">.checkbox-scroll { border:1px solid #ccc; width:100%; height: 114px; padding-left:8px;  overflow-y: scroll; }</style>
      <link rel="stylesheet" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/pace/pace.min.css">
    <script type="text/javascript">
    function nospaces(t){
        if(t.value.match(/\s/g)){
            alert('Maaf, Tidak Boleh Menggunakan Spasi,..');
            t.value=t.value.replace(/\s/g,'');
        }
    }
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>

      <aside class="main-sidebar">
          <?php include "menu-admin.php"; ?>
      </aside>

      <div class="content-wrapper">

        <?php if ($this->uri->segment(2)=='home'){ ?>
        <div class='alert alert-warning alert-dismissible fade in' role='alert' style='border-radius:0px; margin-bottom:0px'>
        
          <a href="#" style="margin-right:10px;color:#333; text-decoration:none;margin-left:15px;">Selamat datang di halaman administrator</a>
        </div>
      <?php } ?>
      <!--include content web-->
      <?php echo $contents; ?>
       <!-- end content web-->
      <div style='clear:both'></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>$.widget.bridge('uibutton', $.ui.button);</script>
    <script src="<?php echo base_url(); ?>asset/admin/highchart/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/highchart/data.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/highchart/exporting.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>asset/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/pace/pace.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/admin/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/dropify/dist/js/dropify.min.js"></script>
    
    
    <script src="<?php echo base_url(); ?>asset/admin/plugins/tinymce/tinymce.min.js"></script>
    


    <!--jquery check box -->
    <script>
    $(document).ready(function () {
    $('#checkt-all').change(function () {
    $("input:checkbox.custom-control-input").prop('checked',this.checked);//"custom-control-input" adalah class pada input checkbox
     //  jika ingin ada aksi setelah kita check all
     if (this.checked == true) {
      // melakukan suatu tindakan jika checked all aktif
     } else {
      // melakukan suatu tindakan jika checked all tidak aktif
     }
     });
    });
    </script>
    


    <!--javascript auto copy permalink-->
    <script>
    function createslug()
    {
        var judul = $('#judul').val();
        $('#slug').val(slugify(judul));
        document.getElementById('slg').innerHTML = document.getElementById('slug').value;

     }
 
    function slugify(text)
    {
        return text.toString().toLowerCase()
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        .replace(/^-+/, '')             // Trim - from start of text
        .replace(/-+$/, '');            // Trim - from end of text
    }
    </script>


    <script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 600,
                plugins: [
                         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                     ],
                     toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                     image_advtab: true ,
                    
                     external_filemanager_path:"<?php echo base_url('filemanager');?>/",
                     filemanager_title:"Upload File" ,
                     external_plugins: { "filemanager" : "<?php echo base_url('filemanager/plugin.min.js');?>"}

            });
        }
    });
    </script>
    
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

    <script>
    $('#rangepicker').daterangepicker();
    $('.datepicker').datepicker({autoclose: true});
      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
      
      //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    </script>

    <script>
 CKEDITOR.replace('editor1' ,{
        height: 500,
        filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder');?>'
    });
</script>


  <script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function() { Pace.restart(); });
    $('.ajax').click(function(){
        $.ajax({url: '#', success: function(result){
            $('.ajax-content').html('<hr>Ajax Request Completed !');
        }});
    });

    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).closest('.treeview').addClass('active');
  </script>
  </body>
</html>
<?php } ?>
