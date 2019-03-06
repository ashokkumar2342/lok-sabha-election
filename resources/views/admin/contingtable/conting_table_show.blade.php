<table class="table" id="dataTables"> 
  <thead> 
    <tr>
      <th>PC Code</th>
      <th>AC Code</th>
      <th>Table No</th> 
      <th>Action</th>
    </tr> 
  </thead>
  <tbody> 
    @foreach ($countingtables as $countingtable)
     <tr>
      <td>{{ $countingtable->pcdetails->pc_code or ''}}</td>
      <td>{{ $countingtable->acdetails->ac_code or ''}}</td>
      <td>{{ $countingtable->table_no}}</td> 
      <td> <a onclick="callPopupLarge(this,'{{ route('conting.table.edit',$countingtable->id) }}')" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      
       <a href="#" success-popup="true" button-click="btn_conting_table_show" onclick="if (confirm('Are you sure?')) {callAjax(this,'{{ route('conting.table.delete',$countingtable->id) }}')}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
     </td>
    </tr>
    @endforeach
    
  </tbody>
</table>