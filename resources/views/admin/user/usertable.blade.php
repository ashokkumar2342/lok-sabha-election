<table class="table" id="dataTables"> 
  <thead> 
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>PC Code</th>
      <th>AC Code</th>
      <th>Action</th>
    </tr> 
  </thead>
  <tbody>
  
    @foreach ($users as $user)
     <tr>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
      <td>{{ $user->role==1?'admin':'ARO'}}</td>
       <td>{{ $user->pcdetails->pc_code or ''}}</td>
      <td>{{ $user->acdetails->ac_code or ''}}</td>
     
       
      <td> 
       <a {{-- href="{{ route('candidate.edit') }}" --}} onclick="callPopupLarge(this,'{{ route('user.edit',$user->id) }}')" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      
       <a href="#" success-popup="true" button-click="btn_user_show" onclick="if (confirm('Are you sure?')) {callAjax(this,'{{ route('user.delete',$user->id) }}')}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
      </td>
     
    </tr>
    @endforeach
    
  </tbody>
</table>