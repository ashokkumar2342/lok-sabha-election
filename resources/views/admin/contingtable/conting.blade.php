@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Conting Table</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <form class="add_form" action="{{ route('conting.store') }}" method="post" button-click="btn_conting_table_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3 form-group">
                <label>PC Code</label>
                 @include('include.select_pc')
              </div>
              <div class="col-lg-3 form-group">
                <label>AC Code</label>
                <select name="ac_code" class="form-control" id="select_ac_div">
                  <option selected="" disabled="">Select AC Code</option>
                   
                </select> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Table No</label>
                <input type="text" class="form-control" maxlength="" name="table_no"> 
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
        <button type="button" class="hidden" hidden id="btn_conting_table_show" data-table="dataTables"  onclick="callAjax(this,'{{ route('conting.table.show') }}','conting_table')">Show</button> 
      <div class="card"> 
        <div class="card-body" id="conting_table">
           
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
    $('#btn_conting_table_show').click();
   }) 
</script>
@endpush