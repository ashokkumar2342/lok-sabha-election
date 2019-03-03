<table class="table" id="dataTables"> 
  <thead> 
    <tr>
      <th>PC Code</th>
      <th>PC Name</th>
      <th>RO Name</th> 
      <th>Action</th> 
    </tr> 
  </thead>
  <tbody>
  
    @foreach ($pcdetails as $pcdetail)
     <tr>
      <td>{{ $pcdetail->pc_code}}</td>
      <td>{{ $pcdetail->pc_name}}</td>
      <td>{{ $pcdetail->ro_name}}</td> 
      <td> <a {{-- href="{{ route('candidate.edit') }}" --}} onclick="callPopupLarge(this,'{{ route('pc.details.edit',$pcdetail->id) }}')" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      
       <a href="#" success-popup="true" button-click="btn_pc_show" onclick="if (confirm('Are you sure?')) {callAjax(this,'{{ route('pc.details.delete',$pcdetail->id) }}')}"   title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td> 
    </tr>
    @endforeach
    
  </tbody>
</table>