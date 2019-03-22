
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lok Sabha Election</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
 {{--  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('dist/css/toastr.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
  <!-- Google Font: Source Sans Pro -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
  <style type="text/css" media="screen"> 
     .breadcrumb-item+.breadcrumb-item::before {
         display: inline-block;
         padding-right: .1rem;
         color: #6c757d;
         content: "";
     };
  </style>
</head>
<body class="sidebar-mini sidebar-collapse" id="body_id" style="height: auto;">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        {{-- <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> --}}
      </li>
      
    </ul> 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       
      <li class="nav-item">
        <a class="nav-link"   href="{{ route('login.vote.details') }}">
          <i class="fa fa fa-sign-out"></i>
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

   <!-- Sidebar -->
    <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
        

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                    Dashboard
                     
                  </p>
                </a>
              
               
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div id="div_btn_booth_no">
      @if ($activeBoothNo !=null)
         <button type="button" hidden id="btn_booth_no" button-click="booth_no{{ $activeBoothNo->id }}" onclick="callAjax(this,'{{ route('vote.details.boothno.show',[$request->pc_code,$request->ac_code,$request->table_no]) }}','div_booth_no')">Show</button>
         @else
         <button type="button" hidden id="btn_booth_no" button-click="booth_no_finish" onclick="callAjax(this,'{{ route('vote.details.boothno.show',[$request->pc_code,$request->ac_code,$request->table_no]) }}','div_booth_no')">Show</button>
      @endif

      
    </div>
    
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12" id="div_booth_no">  
            
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content"> 
      <!-- Default box -->
      <div class="card" id="candidate_details_form">
        
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
   {{--  <strong>Copyright &copy; {{ date('Y') }} <a href="#"></a>.</strong> All rights
    reserved. --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


  

<div id="ModalLargeId" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog  modal-lg" id="ModalLargeContentId" style="width:90%">

  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modallevel3">Open 2 Modal</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    

  </div>
</div>

<div id="ModalSmId" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog  modal-sm" id="ModalSmContentId">

  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modallevel3">Open 2 Modal</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    

  </div>
</div>

<div id="ModalMdId" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog  modal-md" id="ModalMdContentId">

  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modallevel3">Open 2 Modal</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    

  </div>
</div>


<div id="success-popup" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog  modal-small">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Success</h4>
      </div>
      <div class="modal-body">
    <div class="alert alert-success fade in alert-dismissible" >
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Success!</strong> 
      <p id="success-popup-content-id">This alert box indicates a successful or positive action.</p>
    </div>
      </div>
    </div>
  </div>
</div>
<div id="Modallevel2" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog" id="Modallevel2ContentId" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modallevel3">Open 2 Modal</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="Modallevel3" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog" id="Modallevel3ContentId" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
 <script src="{{ asset('dist/js/common.js?ver=1') }}"></script>
  <script src="{{ asset('dist/js/customscript.js?ver=1') }}"></script>
  <script src="{{ asset('dist/js/toastr.min.js?ver=1') }}"></script>
<script>
  $(function () {
    $('#btn_booth_no').click();
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })

</script>
<script> 
 $(document).on("keyup", ".candidate_vote", function() {
     var sum = 0;
     $(".candidate_vote").each(function(){
         sum += +$(this).val();
     });
    $(".condidate_total_vote").val(sum); 
    var totalVotes= $(".condidate_total_vote").val(); 
    var total_vote_polled= $("#total_vote_polled").val(); 
    
     if(totalVotes==total_vote_polled){
         $('#btn_save_vote').show(400); 
     }else{
         $('#btn_save_vote').hide(400);
     } 

 }); 
</script>
@if(Session::has('message')) 
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
</body>
</html>
