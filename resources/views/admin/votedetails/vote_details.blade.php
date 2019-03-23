 
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
  @php
    $data=Session::get('data'); 
  @endphp
  <!-- /.login-logo -->
  <div class="card">  
    <div class="card-body login-card-body">
      <div class="row text-center">
       
        {{-- <div class="col-6">
          <input type="submit" value="Admin Login" class="btn btn-success" > 
        </div> --}}
        <div class="col-12">
          <form class="form-horizontal" method="get" action="{{ route('create.vote.details') }}">
              <input type="hidden" name="pc_code" id="pc_code" value="{{ $data['pc_code'] }}">  
              <input type="hidden" name="ac_code" id="ac_code" value="{{ $data['ac_code'] }}">  
              <input type="hidden" name="table_no" id="table_no" value="{{ $data['table_no'] }}"> 
             <input type="submit" value="User Login" class="btn btn-success">  
          </form> 
         </div> 
      </div> 
    </div>  
  </div>
  <div class="card">
    <div class="card-body login-card-body">
     
      @if (Session::get('user')==1)
      <div  class="text-center">
        
         <a href="{{ route('admin.logout.vote.details') }}" class="btn btn-danger" title="">Logout</a>
      </div>
      @else
          <p class="login-box-msg">Admin Sign in to start your session</p>
      @endif 
       @if (Session::get('user')!=1)             
      <form class="form-horizontal" method="POST" action="{{ route('admin.login.vote.details') }}">
                        {{ csrf_field() }}
        <div class="input-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> 
          <div class="input-group-append">
              <span class="fa fa-envelope input-group-text"></span>
          </div>
          @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
           <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
          <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In </button>
          </div>
          <!-- /.col -->
        </div>
      </form> 
       @endif 
    </div>
    <!-- /.login-card-body -->
  </div>
  @if (Session::get('user')==1) 
  <div class="card">
    <div class="card-body login-card-body"> 
      <form class="form-horizontal" method="post" id="form_vote_login" action="{{ route('user.session.set') }}">
         {{ csrf_field() }}     
        <div class="input-group mb-3">
           
          <select name="pc_code" id="admin_pc_code" class="form-control" onchange="callAjax(this,'{{ url('search-ac') }}','select_ac_div')">

             <option selected="" disabled="">Select PC Code</option>  
            @foreach ($pcdetails as $pcdetail)
                <option value="{{ $pcdetail->id }}">{{ $pcdetail->pc_code }}</option>
            @endforeach 
          </select> 
          </div>
           <div class="input-group mb-3" id="select_ac_div"> 
          <select name="ac_code" id="admin_ac_code" class="form-control" > 
             <option selected="" disabled="">Select AC Code</option> 
             
          </select> 
          </div> 
          <div class="input-group mb-3" id="table_select"> 
          <select name="table_no" id="admin_table_no" class="form-control" > 
             <option selected="" disabled="">Select Table No</option> 
             
          </select> 
          </div> 
        <div class="row"> 
          <div class="col-12 text-center">
            <input type="submit" value="Save" id="submit" class="btn btn-success" >
           
          </div>
          <!-- /.col -->
        </div>
      </form> 
       
    </div>  
  </div>
  @endif 
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
{{-- <script>
 $('#form_vote_login').on('submit', function (e) { 
         e.preventDefault(); 
           const users = {
             pc_code: $('#admin_pc_code').val(),
             ac_code: $('#admin_ac_code').val(),
             table_no: $('#admin_table_no').val(),
         }
         window.localStorage.setItem('user', JSON.stringify(users)); 
         location.reload();
     });
  
var data =JSON.parse(window.localStorage.getItem('user')); 
$.each(data, function(index, val) {
   $('#'+index).val(val)
});
 
if ( $('#pc_code').val() != null && $('#ac_code').val() != null && $('#table_no').val() != null) {
   
}
</script> --}}
@if(Session::has('message')) 
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
</body>
</html>

