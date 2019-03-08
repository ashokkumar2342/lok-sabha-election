     <form action="{{ route('store.vote.details',$countingTableBoothMap->id) }}" class="add_form" method="post" accept-charset="utf-8">
      {{ csrf_field() }}  
     
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
            
              @foreach ($candidatedetails as $candidatedetail)
               <tr>
                <td>
                  <input type="hidden" name="candidate_id[]" value="{{ $candidatedetail->id }}"  class="form-control input-lg">
                  <input type="number" name="vote_polled[]"  class="form-control input-lg">
                </td> 
                <td>{{ $candidatedetail->serial_number}}</td>
                <td>{{ $candidatedetail->candidate_name}}</td>
                <td>{{ $candidatedetail->party_name}}</td>
               
                
              </tr>
              @endforeach 
            </tbody>
          </table>
          <div class="text-center">
            <input type="submit" value="Save" class="btn btn-success">
          </div>
    </form> 