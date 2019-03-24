@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Conting Table Booth Map</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <form class="add_form" action="{{ route('conting.table.booth.map.store') }}" method="post" button-click="btn_conting_table_booth_map_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>PC Code</label>
                 @include('include.select_pc')
              </div>
              <div class="col-lg-4 form-group">
                <label>AC Code</label>
                <select name="ac_code" class="form-control" id="select_ac_div">
                  <option selected="" disabled="">Select AC Code</option>
                   
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Total Table No</label>
                 <select name="table_no" class="form-control">
                  <option selected="" disabled="">Select Table No</option>
                  @foreach ($countingtables as $countingtable)
                     <option value="{{ $countingtable->id}}">{{ $countingtable->table_no}}</option>
                  @endforeach 
                </select> 
              </div> 
              <div class="col-lg-4 form-group">
                <label>Booth No</label>
                 <select name="booth_no" class="form-control">
                  <option selected="" disabled="">Select Booth No</option>
                  @foreach ($boothdetails as $boothdetail)
                     <option value="{{ $boothdetail->id}}">{{ $boothdetail->booth_no}}</option>
                  @endforeach 
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Round No</label>
                <input type="text" name="round_no" class="form-control"> 
               </div> 
              <div class="col-lg-12 text-center form-group">
                <input type="submit"  class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
        </div>
        <!-- /.card-body --> 
      </div>
      <!-- /.card -->
       <!-- Default box -->
        <button type="button" class="hidden" hidden id="btn_conting_table_booth_map_show" data-table="dataTables"  onclick="callAjax(this,'{{ route('conting.table.booth.map.show') }}','conting_table_booth_map')">Show</button> 
      <div class="card"> 
        <div class="card-body" id="conting_table_booth_map">
           
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
    $('#btn_conting_table_booth_map_show').click();
   }) 
</script>
@endpush