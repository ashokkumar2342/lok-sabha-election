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


      @if (Auth::user()->role==1)
         
      <div class="card"> 
        <div class="card-body">
          <!-- Nav tabs -->
        
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
         
        </div>
        <!-- /.card-body --> 
      </div>
      @endif
      <!-- /.card -->

        @if (Auth::user()->role==2)
            @php
               $user=Auth::user();
               $pccode=$user->pc_code;
               $accode=$user->ac_code;

            @endphp
               <button type="button" hidden="" id="btn_total_vote_polled"  onclick="callAjax(this,'{{ url('dashboard/booth-details/total-vote-table') }}'+'?pc_code='+{{  $pccode }}+'&ac_code='+{{ $accode }},'total_vote_table')" >Show</button>
        @endif
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
<script type="text/javascript">
  $('#btn_total_vote_polled').click();
   
</script>
@endpush