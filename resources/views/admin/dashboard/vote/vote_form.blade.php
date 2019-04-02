@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
               
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
          <div class="row">
            <div class="col-lg-4">
               <select name="booth_no" id="booth_no" class="form-control" onchange="callAjax(this,'{{ url('dashboard/vote/aro-vote-candidate-show',[$pc_code,$ac_code]) }}'+'?booth_no='+$('#booth_no').val(),'candidate_cote_form')">
                <option value="">Select Booth No</option>
                @foreach ($countingTableBoothMaps as $countingTableBoothMap) 
                <option value="{{ $countingTableBoothMap->booth_no }}">{{ $countingTableBoothMap->booth_no }}</option>
                @endforeach 
               </select>
            </div> 
          </div>
          <div id="candidate_cote_form">
             
           </div> 
        </div>
      

    </section>
    <!-- /.content -->


@endsection
@push('scripts')
<script> 
 $(document).on("keyup", ".candidate_vote", function() {
     var sum = 0;
     $(".candidate_vote").each(function(){
         sum += +$(this).val();
     });
    $(".condidate_total_vote").val(sum); 
    var totalVotes= $(".condidate_total_vote").val(); 
    var total_vote_polled= $("#total_vote_polled").val(); 
    
     if(totalVotes==total_vote_polled){
         $('#btn_save_vote').show(400); 
     }else{
         $('#btn_save_vote').hide(400);
     } 

 }); 
</script>
@endpush