<table class="table" id="dataTables"> 
  <thead> 
    <tr>
      <th>PC Code</th>
      <th>AC Code</th>
      <th>Booth No</th>
      <th>Booth Name</th>
      <th>Booth Location</th>
      <th>Total Vote Polled</th>
       
    </tr> 
  </thead>
  <tbody>
 
 
    @foreach ($boothdetails as $boothdetail)
     <tr>
      <td>
      	<input type="hidden" name="boothdetail_id[]" value="{{ $boothdetail->id }}">
      	{{ $boothdetail->pcdetails->pc_code or ''}}
      </td>
      <td>{{ $boothdetail->acdetails->ac_code or ''}}</td>
      <td>{{ $boothdetail->booth_no}}</td>
      <td>{{ $boothdetail->booth_name}}</td>
      <td>{{ $boothdetail->booth_location}}</td>
      <td><input type="text" name="total_vote_polled[]" value="{{ $boothdetail->total_vote_polled}}"></td>
       
    </tr>
    @endforeach
    <tr>
    	<td colspan="6" class="text-center">
    		
    <input type="submit" value="Save" class="btn btn-success">
    	</td>
    </tr>
     
  </tbody>
</table>