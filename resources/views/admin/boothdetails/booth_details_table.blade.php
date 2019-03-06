<table class="table" id="dataTables"> 
  <thead> 
    <tr>
      <th>PC Code</th>
      <th>AC Code</th>
      <th>Booth No</th>
      <th>Booth Name</th>
      <th>Booth Location</th>
      <th>Total Booth Pooled</th>
      <th>Action</th>
    </tr> 
  </thead>
  <tbody>
  
    @foreach ($boothdetails as $boothdetail)
     <tr>
      <td>{{ $boothdetail->pcdetails->pc_code or ''}}</td>
      <td>{{ $boothdetail->acdetails->ac_code or ''}}</td>
      <td>{{ $boothdetail->booth_no}}</td>
      <td>{{ $boothdetail->booth_name}}</td>
      <td>{{ $boothdetail->booth_location}}</td>
      <td>{{ $boothdetail->total_booth_pooled}}</td>
      <td> <a onclick="callPopupLarge(this,'{{ route('booth.details.edit',$boothdetail->id) }}')" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      
       <a href="#" success-popup="true" button-click="btn_booth_show" onclick="if (confirm('Are you sure?')) {callAjax(this,'{{ route('booth.details.delete',$boothdetail->id) }}')}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
     </td>
    </tr>
    @endforeach
    
  </tbody>
</table>