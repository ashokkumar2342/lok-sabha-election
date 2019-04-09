   <div class="row"> 
     <!-- fix for small devices only -->
     <div class="clearfix hidden-md-up"></div>
     @php
      $className ='';
       $key ='';
       $leadMargin ='';
       $printHide='';
     @endphp
    
    @foreach ($candidateVotes as $candidate_id=>$usertotalVote)
    @php
      $key +=1;
      if ($key==1){
       $leadMargin +=$usertotalVote;
       $printHide+=$usertotalVote;
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
     <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
       @if ($printHide!=0)
          <span style="float:right;">
           <a target="blank" href="{{ route('round.report.download',[$pc_code,$ac_code,$round_no]) }}" class="btn btn-success .d-none .d-sm-block">
             <i class="fa fa-print"></i> Print
           </a>
         </span>
       @endif
     
       
     </div>
     <!-- /.col -->
   </div>
   <div class="col-lg-12 text-left">
    <h5> <span>Lead Margin : <strong>{{  $leadMargin }}</strong> </span></h5>
   </div>
 </div>

 <div class="row mb-12">    
 <div class="col-lg-12" id="div_table_no">
   @include('admin.dashboard.aro.table_no')
 </div>           
 <div class="col-lg-12" id="candidate_details_form">
   
 </div>
    
 </div> 
 