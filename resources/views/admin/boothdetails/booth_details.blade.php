@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Booth Details</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <form class="add_form" action="{{ route('booth.store') }}" method="post" button-click="btn_booth_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>PC Code</label>
                <select name="pc_code" class="form-control">
                  <option selected="" disabled="">Select PC Code</option>
                  @foreach ($pcdetails as $pcdetail)
                     <option value="{{ $pcdetail->id}}">{{ $pcdetail->pc_code}}</option>
                  @endforeach 
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>AC Code</label>
                 <select name="ac_code" class="form-control">
                  <option selected="" disabled="">Select AC Code</option>
                  @foreach ($acdetails as $acdetail)
                     <option value="{{ $acdetail->id}}">{{ $acdetail->ac_code}}</option>
                  @endforeach 
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Booth No</label>
                <input type="text" class="form-control"  name="booth_no"> 
              </div>
               <div class="col-lg-4 form-group">
                <label>Booth Name</label>
                <input type="text" class="form-control"  name="booth_name"> 
              </div>   
               <div class="col-lg-4 form-group">
                <label>Booth Location</label>
                <input type="text" class="form-control"  name="booth_location"> 
              </div> 
              <div class="col-lg-4 form-group">
                <label>Total Vote Pooled</label>
                <input type="number" class="form-control"  name="total_booth_pooled"> 
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
        <button type="button" class="hidden" hidden id="btn_booth_show" data-excel="dataTables"  onclick="callAjax(this,'{{ route('booth.details.show') }}','booth_details_table')">Show</button>
      <div class="card"> 
        <div class="card-body" id="booth_details_table">
          
        </div>
        <!-- /.card-body --> 
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
@push('scripts')
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript">
  $(window).on( "load", function() { 
    $('#btn_booth_show').click();
   }) 
</script>
@endpush