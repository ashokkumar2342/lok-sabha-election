<table class="table" id="dataTables"> 
  <thead> 
    <tr>
      <th>PC Code</th>
      <th>AC Code</th>
      <th>AC Name</th>
      <th>ARO Name</th>
      <th>Action</th>
       
    </tr> 
  </thead>
  <tbody>
  
    @foreach ($acdetails as $acdetail)
     <tr>
      <td>{{ $acdetail->pcdetails->pc_code or ''}}</td>
      <td>{{ $acdetail->ac_code}}</td>
      <td>{{ $acdetail->ac_name}}</td>
      <td>{{ $acdetail->aro_name}}</td>
      <td>
        <a {{-- href="{{ route('candidate.edit') }}" --}} onclick="callPopupLarge(this,'{{ route('ac.details.edit',$acdetail->id) }}')" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      
       <a href="#" success-popup="true" button-click="btn_ac_show" onclick="if (confirm('Are you sure?')) {callAjax(this,'{{ route('ac.details.delete',$acdetail->id) }}')}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
       
    </tr>
    @endforeach
    
  </tbody>
</table>