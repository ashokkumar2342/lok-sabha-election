@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PC Details</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <form class="add_form" action="{{ route('pc.store') }}" method="post" button-click="btn_pc_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>PC Code</label>
                <input type="text" class="form-control" maxlength="100" name="pc_code"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>PC Name</label>
                <input type="text" class="form-control" maxlength="" name="pc_name"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>RO Name</label>
                <input type="text" class="form-control" maxlength="" name="ro_name"> 
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
        <button type="button" class="hidden" hidden id="btn_pc_show" data-table="dataTables"  onclick="callAjax(this,'{{ route('pc.details.show') }}','pc_details_table')">Show</button>
      <div class="card"> 
        <div class="card-body" id="pc_details_table">
           
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
    $('#btn_pc_show').click();
   }) 
</script>
@endpush