@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadidate Details</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <form class="add_form" action="{{ route('condidate.store') }}" method="post" button-click="btn_candidate_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3 form-group">
                <label>Serial Number</label>
                <input type="text" class="form-control" maxlength="100" name="serial_number"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Candidate Name</label>
                <input type="text" class="form-control" maxlength="" name="candidate_name"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Party Name</label>
                <input type="text" class="form-control" maxlength="" name="party_name"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Party Symbol</label>
                <input type="text" class="form-control" maxlength="" name="party_symbol"> 
              </div>
              <div class="col-lg-12 form-group">
                <label>Remarks</label>
                <textarea type="text" rows="1" class="form-control" maxlength="" name="remarks"></textarea> 
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
      <button type="button" class="hidden" hidden id="btn_candidate_show" data-table="dataTables"  onclick="callAjax(this,'{{ route('candidate.show') }}','candidate_table')">Show</button>
      <div class="card"> 
        <div class="card-body" id="candidate_table">
          
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
    $('#btn_candidate_show').click();
   }) 
</script>
@endpush