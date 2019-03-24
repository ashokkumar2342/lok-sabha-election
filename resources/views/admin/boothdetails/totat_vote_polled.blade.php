@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Total Vote Polled Update</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="card"> 
        <div class="card-body">
          <!-- Nav tabs -->
          <form class="add_form" action="{{ route('booth.store') }}" data-table="dataTables" method="post" button-click="btn_booth_show">
            {{ csrf_field() }}
            <div class="row">
            <div class="col-lg-6 form-group"> 
             <select name="pc_code" id="pc_code" class="form-control" onchange="callAjax(this,'{{ route('search.ac2') }}','ac_code')">

                <option selected="" disabled="">Select PC Code</option>  
               @foreach ($pcdetails as $pcdetail)
                   <option value="{{ $pcdetail->id }}">{{ $pcdetail->pc_code }}</option>
               @endforeach 
             </select> 
            </div>
            <div class="col-lg-6 form-group">             
               <select name="ac_code" class="form-control" id="ac_code"  onchange="callAjax(this,'{{ url('dashboard/booth-details/total-vote-table') }}'+'?pc_code='+$('#pc_code').val()+'&ac_code='+$('#ac_code').val(),'total_vote_table','callJqueryDefault')" required=""> 
                <option selected="" disabled="">Select AC Code</option> 
                
             </select> 
            </div> 
              
            </div>
             
             
          </form>

         
         
        </div>
        <!-- /.card-body --> 
      </div>
      <!-- /.card -->
       
      <div class="card"> 
         <form action="{{ route('total.vote.update') }}" class="add_form" method="post" no-reset="true">
          {{ csrf_field() }} 
        <div class="card-body" id="total_vote_table">
          
        </div>
      </form>
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
   
</script>
@endpush