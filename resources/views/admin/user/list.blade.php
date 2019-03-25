@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Details</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <form class="add_form" action="{{ route('user.store') }}" method="post" button-click="btn_user_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3 form-group">
                <label>Name</label>
                <input type="text" class="form-control" maxlength="100" name="name"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Email</label>
                <input type="email" class="form-control" maxlength="" name="email"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Password</label>
                <input type="password" class="form-control" maxlength="" name="password"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Role</label>
                <select name="role" class="form-control" id="role" onclick="showHide()" required="">
                  <option selected="" disabled="">Select Role</option> 
                  <option value="1">Admin</option>
                  <option value="2">ARO</option>
                  option
                </select>
              </div>

              <div class="col-lg-6 form-group"> 
               <select name="pc_code" id="pc_code" class="form-control" onchange="callAjax(this,'{{ route('search.ac2') }}','ac_code')">

                  <option selected="" disabled="">Select PC Code</option>  
                 @foreach ($pcdetails as $pcdetail)
                     <option value="{{ $pcdetail->id }}">{{ $pcdetail->pc_code }}</option>
                 @endforeach 
               </select> 
              </div>
              <div class="col-lg-6 form-group">             
                 <select name="ac_code" class="form-control" id="ac_code"> 
                  <option selected="" disabled="">Select AC Code</option> 
                  
               </select> 
              </div> 
              <div class="col-lg-12 text-center form-group">
                <input type="submit" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
        </div>
        <!-- /.card-body --> 
      </div>
      <!-- /.card -->
       <!-- Default box -->
      <button type="button" class="hidden" hidden id="btn_user_show" data-table="dataTables"  onclick="callAjax(this,'{{ route('user.show') }}','user_table')">Show</button>
      <div class="card"> 
        <div class="card-body" id="user_table">
          
        </div>
        <!-- /.card-body --> 
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
@push('scripts')
<script type="text/javascript">
  $(window).on( "load", function() { 
    $('#btn_user_show').click();
   }) 

 function showHide(){
  if ($('#role').val()==1) {
    $('#pc_code').hide();
    $('#ac_code').hide();
  }else{
    $('#pc_code').show();
    $('#ac_code').show();
  }
 }
</script>
@endpush