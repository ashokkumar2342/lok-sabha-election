     <div class="card-header">
      Round No :  <strong>{{ $countingTableBoothMap->round_no }}</strong>, 
      Booth Name : <strong>{{ $boothDetail->booth_name }}</strong> , 
      Booth No : <strong>{{ $boothDetail->booth_no }}</strong>, 
      Total Votes : <strong>{{ $boothDetail->total_vote_polled }}</strong>
       <div class="card-tools">
         
       </div>
     </div>
     <div class="card-body" >
      <form action="{{ route('store.vote.details',$countingTableBoothMap->id) }}" class="add_form" method="post" accept-charset="utf-8" button-click="btn_booth_no">
       {{ csrf_field() }}  
      <input type="hidden" name="total_vote_polled" value="{{ $boothDetail->total_vote_polled }}">
       <table class="table table-responsive"> 
             <thead> 
               <tr>
                 <th>Votes</th>
                 <th>Serial Number</th>
                 <th>Candidate Name</th>
                 <th>Party Name</th> 
               </tr> 
             </thead>
             <tbody>
              @php
                $sumTotalVots =0;
                $condidates ='';
              @endphp
               @foreach ($candidatedetails as $candidatedetail)
                @php
                if ($countingTableBoothMap->status==1) {
                  $voteDetail=App\VoteDetails::where(['pc_code'=>$countingTableBoothMap->pc_code,'ac_code'=>$countingTableBoothMap->ac_code,'booth_no'=>$countingTableBoothMap->booth_no,'table_no'=>$countingTableBoothMap->table_no,'round_no'=>$countingTableBoothMap->round_no,'candidate_id'=>$candidatedetail->id])->first();
                  $sumTotalVots +=$voteDetail->vote_polled;
                  $condidates =$voteDetail->vote_polled;
                }
                   
                @endphp
                <tr>
                 <td>
                   <input type="hidden" name="candidate_id[]" value="{{ $candidatedetail->id }}"  class="form-control input-lg">
                   <input type="number" name="vote_polled[]" id="candidate_{{ $candidatedetail->id }}"  class="form-control input-lg candidate_vote" value="{{ $condidates }}">
                 </td> 
                 <td>{{ $candidatedetail->serial_number}}</td>
                 <td>{{ $candidatedetail->candidate_name}}</td>
                 <td>{{ $candidatedetail->party_name}}</td>
                
                 
               </tr>
               @endforeach 
               <tr>
                 <td>Total :
                   <input type="number"   class="condidate_total_vote" value="{{ $sumTotalVots }}"  disabled>
                   <input type="hidden" name="total" class="condidate_total_vote">
                 </td>
                 <td>

                 </td>
                 <td></td>
                 <td></td>
               </tr>
             </tbody>
           </table>
           <div class="text-center">
            @if ($countingTableBoothMap->status==0)
               <input type="submit" value="Save" id="btn_save_vote" class="btn btn-success">
            @endif
            
           </div>
     </form> 
     </div>

