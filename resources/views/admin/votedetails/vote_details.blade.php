 
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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('dist/css/toastr.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Lok Sabha Election </b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body"> 
      <form class="form-horizontal" method="get" action="{{ route('create.vote.details') }}">
              
        <div class="input-group mb-3">
           
          <select name="pc_code" class="form-control" >

             <option selected="" disabled="">Select PC Code</option>  
            @foreach ($pcdetails as $pcdetail)
                <option value="{{ $pcdetail->id }}">{{ $pcdetail->pc_code }}</option>
            @endforeach 
          </select> 
          </div>
           <div class="input-group mb-3"> 
          <select name="ac_code" class="form-control" > 
             <option selected="" disabled="">Select AC Code</option> 
            @foreach ($acdetails as $acdetail)
                <option value="{{ $acdetail->id }}">{{ $acdetail->ac_code }}</option>
            @endforeach 
          </select> 
          </div> 
          <div class="input-group mb-3"> 
          <select name="table_no" class="form-control" > 
             <option selected="" disabled="">Select Table No</option> 
            @foreach ($countingtables as $countingtable)
                <option value="{{ $countingtable->id }}">{{ $countingtable->table_no }}</option>
            @endforeach 
          </select> 
          </div> 
        <div class="row"> 
          <div class="col-12 text-center">
            <input type="submit" value="Show" class="btn btn-success" >
           
          </div>
          <!-- /.col -->
        </div>
      </form> 
       
    </div>  
  </div>
 </div>
 
  




<!-- /.login-box -->

<!-- jQuery -->
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
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>

