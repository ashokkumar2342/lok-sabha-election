@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>AC Details</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <form class="add_form" action="{{ route('ac.store') }}" method="post" button-click="btn_ac_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3 form-group">
                <label>PC Code</label>
                <select name="pc_code" class="form-control">
                  <option selected="" disabled="">Select PC Code</option>
                  @foreach ($pcdetails as $pcdetail)
                     <option value="{{ $pcdetail->id}}">{{ $pcdetail->pc_code}}</option>
                  @endforeach 
                </select>
              </div>
              <div class="col-lg-3 form-group">
                <label>AC Code</label>
                <input type="text" class="form-control" maxlength="" name="ac_code"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>AC Name</label>
                <input type="text" class="form-control" maxlength="" name="ac_name"> 
              </div> 
               <div class="col-lg-3 form-group">
                <label>ARO Name</label>
                <input type="text" class="form-control" maxlength="" name="aro_name"> 
              </div> 
              <div class="col-lg-12 form-group">
                <label>Counting Centre Id & Name</label>
                <input type="text" class="form-control" maxlength="" name="counting_centre_name"> 
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
        <button type="button" class="hidden" hidden id="btn_ac_show" data-table="dataTables"  onclick="callAjax(this,'{{ route('ac.details.show') }}','ac_details_table')">Show</button>

      <div class="card"> 
        <div class="card-body" id="ac_details_table">
           
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
    $('#btn_ac_show').click();
   }) 
</script>
@endpush