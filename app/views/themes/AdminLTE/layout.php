
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Profil Pemetaan Orang Asli - Majlis Agama Islam & Adat Istiadat Melayu Kelantan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo base_url();?>assets/images/logomaik.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/build/font/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/build/font/ionicons.min.css">
  <!-- jvectormap
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
  <?php echo $this->template->stylesheet; ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url();?>assets/images/Logo-Majlis-Agama-Islam-Adat-Istiadat-Melayu-Kelantan.png" width="30"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
	  <img src="<?php echo base_url();?>assets/images/Logo-Majlis-Agama-Islam-Adat-Istiadat-Melayu-Kelantan.png"  width="20%">
	  
	  </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <?php $this->load->view('themes/AdminLTE/navbar'); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/backend/images/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst(get_cookie('_userFName'));?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php 
          $daerah = $this->blapps_lib->getData("u_location","ek_admin","u_id",get_cookie('_userID'));
          echo $this->blapps_lib->getData("daerah_name","pro_daerah","daerah_id",$daerah) ?></a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php $this->load->view('themes/AdminLTE/usermenu'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<?php if($this->session->flashdata('success_message')):?>
    <div class="clearfix"></div>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong><?php echo $this->session->flashdata('success_message')?></strong>
      </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error_message')):?>
    <div class="clearfix"></div>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong><?php echo $this->session->flashdata('error_message')?></strong>
      </div>
    <?php endif; ?>
    <?php echo $this->template->content; ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="https://mybahagia.my">Hak Ehwal Agama Islam Negeri Kelantan</a>.</strong> Hak Cipta Terpelihara.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <?php $this->load->view('themes/AdminLTE/actionhistory'); ?>

      </div>
      <!-- /.tab-pane -->

      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/backend/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/backend/dist/js/app.min.js"></script>
<!-- Sparkline
<script src="<?php echo base_url();?>assets/backend/plugins/sparkline/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0
<script src="<?php echo base_url();?>assets/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>assets/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/backend/dist/js/demo.js"></script>
<?php echo $this->template->javascript; ?>
<script type="text/javascript">
	
	<?php echo $this->template->jquery; ?>
	
</script>
</body>
</html>
