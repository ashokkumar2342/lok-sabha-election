<div class="card"> 
  <div class="card-body">
    <!-- Nav tabs -->
     <form class="add_form" action="{{ route('booth.store') }}" data-table="dataTables" method="post" button-click="btn_booth_show">
         {{ csrf_field() }}
         <div class="row">
         <div class="col-lg-6 form-group"> 
          <select name="pc_code" id="pc_code" class="form-control" onchange="callAjax(this,'{{ route('search.ac2') }}','ac_code')">

             <option selected="" disabled="">Select PC Code</option>  
            @foreach ($pcdetails as $pcdetail)
                <option value="{{ $pcdetail->id }}">{{ $pcdetail->pc_code }}</option>
            @endforeach 
          </select> 
         </div>
         <div class="col-lg-6 form-group">             
            <select name="ac_code" class="form-control" id="ac_code"  onchange="callAjax(this,'{{ url('dashboard/vote-detail/result') }}'+'?pc_code='+$('#pc_code').val()+'&ac_code='+$('#ac_code').val(),'vote_details_result','callJqueryDefault')" required=""> 
             <option selected="" disabled="">Select AC Code</option> 
             
          </select> 
         </div> 
           
         </div>
          
          
       </form>
  </div>
  <!-- /.card-body --> 
</div>
<!-- /.card -->
<div class="card">  
  <div class="card-body" id="vote_details_result">
    
  </div> 
  <!-- /.card-body --> 
</div>
<!-- /.card -->
