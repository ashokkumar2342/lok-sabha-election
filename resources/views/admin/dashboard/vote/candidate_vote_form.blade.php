     <div class="card-header">
      Round No :  <strong>{{ $countingTableBoothMap->round_no }}</strong>, 
      Booth Name : <strong>{{ $boothDetail->booth_name }}</strong> , 
      Booth No : <strong>{{ $boothDetail->booth_no }}</strong>, 
      Total Votes : <strong>{{ $boothDetail->total_vote_polled }}</strong>     
       <div class="card-tools">
         
       </div>
     </div>
     <div class="card-body" >
      <form action="{{ route('store.vote.details',$countingTableBoothMap->id) }}" id="form_vote_details"  method="post">
       {{ csrf_field() }}         
      <input type="hidden" name="total_vote_polled" id="total_vote_polled" value="{{ $boothDetail->total_vote_polled }}">     
       <table class="table table-responsive"> 
             <thead> 
               <tr>
                 
                 <th>Serial Number</th>
                 <th>Candidate Name</th>
                 <th>Party Name</th>
                 <th>Votes</th> 
               </tr> 
             </thead>
             <tbody>
              @php
                $sumTotalVots =0;
                $candidates ='';
              @endphp
               @foreach ($candidatedetails as $candidatedetail)
                @php
                if ($countingTableBoothMap->status==1) {
                  $voteDetail=App\VoteDetails::where(['pc_code'=>$countingTableBoothMap->pc_code,'ac_code'=>$countingTableBoothMap->ac_code,'booth_no'=>$countingTableBoothMap->booth_no,'table_no'=>$countingTableBoothMap->table_no,'round_no'=>$countingTableBoothMap->round_no,'candidate_id'=>$candidatedetail->id])->first();
                  $sumTotalVots +=$voteDetail->vote_polled;
                  $candidates =$voteDetail->vote_polled;
                }
                   
                @endphp
                <tr>
                
                 <td>{{ $candidatedetail->serial_number}}</td>
                 <td>{{ $candidatedetail->candidate_name}}</td>
                 <td>{{ $candidatedetail->party_name}}</td>
                  <td>
                   <input type="hidden" name="candidate_id[]" value="{{ $candidatedetail->id }}"  class="form-control input-lg" required>
                   <input type="number" name="vote_polled[]" id="candidate_{{ $candidatedetail->id }}"  class="form-control input-lg candidate_vote" value="{{ $candidates }}" required>
                 </td> 
                
                 
               </tr>
               @endforeach 
               <tr>
                 <td>
                 </td>
                 <td>

                 </td>
                 <td></td>
                 <td>
                   Total :
                   <input type="number"   class="condidate_total_vote" value="{{ $sumTotalVots }}"  disabled>
                   <input type="hidden" name="total" class="condidate_total_vote">
                 </td>
               </tr>
             </tbody>
           </table>
           <div class="text-center" style="padding-bottom: 200px">
            @if ($countingTableBoothMap->status==0)
               <input type="submit" value="Save" id="btn_save_vote" class="btn btn-success" onclick="this.disabled=true;this.form.submit();" style="display: none">
            @endif
            
           </div>
     </form> 
     </div>

