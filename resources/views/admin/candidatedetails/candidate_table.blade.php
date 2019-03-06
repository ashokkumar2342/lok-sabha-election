<table class="table" id="dataTables"> 
  <thead> 
    <tr>
      <th>Serial Number</th>
      <th>Candidate Name</th>
      <th>Party Name</th>
      <th>Party Symbol</th>
      <th>Remarks</th>
      <th>Action</th>
    </tr> 
  </thead>
  <tbody>
  
    @foreach ($candidatedetails as $candidatedetail)
     <tr>
      <td>{{ $candidatedetail->serial_number}}</td>
      <td>{{ $candidatedetail->candidate_name}}</td>
      <td>{{ $candidatedetail->party_name}}</td>
      <td>{{ $candidatedetail->party_symbol}}</td>
      <td>{{ $candidatedetail->remarks}}</td>
      <td> 
       <a {{-- href="{{ route('candidate.edit') }}" --}} onclick="callPopupLarge(this,'{{ route('candidate.edit',$candidatedetail->id) }}')" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      
       <a href="#" success-popup="true" button-click="btn_candidate_show" onclick="if (confirm('Are you sure?')) {callAjax(this,'{{ route('candidate.delete',$candidatedetail->id) }}')}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
      </td>
     
    </tr>
    @endforeach
    
  </tbody>
</table>