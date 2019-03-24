
 <div class="modal-dialog modal-lg" style="width:90%"> 
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header"> 
     	  <h4 class="modal-title">AC Details Edit</h4>
       <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
     

     </div>
     <div class="modal-body">
     	   <form class="add_form" action="{{ route('ac.details.update',$acdetail->id) }}" method="post" button-click="btn_ac_show,btn_close">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3 form-group">
                <label>PC Code</label>
                <select name="pc_code" class="form-control"> 
                  @foreach ($pcdetails as $pcdetail)
                     <option value="{{ $pcdetail->id}}" {{ $pcdetail->id==$acdetail->pc_code?'selected':'' }}>{{ $pcdetail->pc_code}}</option>
                  @endforeach 
                </select>
                 
              </div>
              <div class="col-lg-3 form-group">
                <label>AC Code</label>
                <input type="text" class="form-control" value="{{ $acdetail->ac_code  }}" name="ac_code"> 
              </div>
              <div class="col-lg-3 form-group">
                <label>AC Name</label>
                <input type="text" class="form-control" value="{{ $acdetail->ac_name }}" name="ac_name"> 
              </div> 
               <div class="col-lg-3 form-group">
                <label>ARO Name</label>
                <input type="text" class="form-control" value="{{ $acdetail->aro_name }}" name="aro_name"> 
              </div>
               <div class="col-lg-12 form-group">
                <label>ARO Name</label>
                <input type="text" class="form-control" value="{{ $acdetail->counting_centre_name }}" name="counting_centre_name"> 
              </div> 
              <div class="col-lg-12 text-center form-group">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
     </div>
   </div>  	
</div>
     	