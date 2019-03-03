
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lok Sabha Election</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
   <!-- Ionicons -->
   <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
   <link rel="stylesheet" href="{{ asset('dist/css/toastr.min.css')}}">
   <!-- iCheck --> 
   <!-- Date Picker -->
   <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css')}}">
   <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css')}}"> 

   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
   <!-- bootstrap wysihtml5 - text editor -->
 
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet)}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   @stack('links')
</head>
<body class="hold-transition sidebar-mini" id="body_id">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      
    </ul> 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa fa-sign-out""></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Lok Sabha Election</span>
    </a>

   @include('sidebar.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('contant')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-alpha
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>


<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
 <script src="{{ asset('dist/js/common.js?ver=1') }}"></script>
  <script src="{{ asset('dist/js/customscript.js?ver=1') }}"></script>
  <script src="{{ asset('dist/js/toastr.min.js?ver=1') }}"></script>
  @stack('scripts')

 <script>
  $(function () {
    $('#dataTables').DataTable()
     
  })
</script>
@include('include.model')
</body>
</html>
