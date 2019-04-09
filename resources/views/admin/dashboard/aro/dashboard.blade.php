<div class="card">

  <div class="row"> 
    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>
    @php
      $className =''; 
      $key ='';
      $leadMargin ='';
    @endphp
   
   @foreach ($candidateVotes as $candidate_id=>$usertotalVote)
   @php
     $key +=1;
     if ($key==1){
      $leadMargin +=$usertotalVote;
      $className='bg-success';
     }
      if ($key==2){
      $leadMargin -=$usertotalVote;
      $className='bg-warning';
     }
     if(2 < $key){
      $className='bg-danger';
     }

     $candidatedetail=App\CandidateDetails::find($candidate_id);
   
   @endphp
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon {{ $className }} elevation-1"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">{{ $candidatedetail->candidate_name }}</span>
               <span class="info-box-text">{{ $candidatedetail->party_name }}</span>
               <span class="info-box-number">{{ $usertotalVote }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
         @if ($key== 3)
           @break
         @endif
     @endforeach
    
  </div>
  <div class="col-lg-12 text-left">
   <h5> <span>Lead Margin : <strong>{{  $leadMargin }}</strong> </span></h5>
  </div>
</div>
<div class="card">
        <div class="card-header">
          <h3 class="card-title"> 
            @foreach ($roundNumbers as $round)  
              @php
                $className = '';
                if ($arrayRoudCompleteTableNoStaus[$round->round_no]==1) {
                  $className = 'btn-success';
                }elseif (0 < $roundtableTotalStatusCount[$round->round_no]) {
                  $className = 'btn-warning';
                }else{
                  $className = 'btn-danger';
                }
              @endphp
              <button type="button" class="btn {{ $className }}"  id="btn_round_no" button-click="table_no" onclick="callAjax(this,'{{ route('vote.details.roud.wise.details',[$pc_code,$ac_code,$round->round_no]) }}','round_wise_details')">Round-{{ $round->round_no }}</button>
               
             
            @endforeach
 
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body" id="round_wise_details">
         

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         <!-- Main content -->
         <section class="content"> 
           <!-- Default box -->
           <div class="card" >
             
             <!-- /.card-body -->
             
             <!-- /.card-footer-->
           </div>
           <!-- /.card -->

         </section>
         <!-- /.content -->
        </div>
        <!-- /.card-footer-->
      </div>