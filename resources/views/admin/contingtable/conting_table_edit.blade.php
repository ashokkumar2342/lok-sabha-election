 <div class="modal-dialog modal-lg" style="width:90%"> 
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header"> 
     	  <h4 class="modal-title">Conting Table Edit</h4>
       <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
     

     </div>
     <div class="modal-body"> 
       <form class="add_form" action="{{ route('conting.table.update',$countingtables->id) }}" method="post" button-click="btn_conting_table_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3 form-group">
                <label>PC Code</label>
                <select name="pc_code" class="form-control">
                  <option selected="" disabled="">Select PC Code</option>
                  @foreach ($pcdetails as $pcdetail)
                   <option value="{{ $pcdetail->id}}" {{ $pcdetail->id==$countingtables->pc_code?'selected':'' }}>{{ $pcdetail->pc_code}}</option>
                     
                  @endforeach 
                </select>
              </div>
              <div class="col-lg-3 form-group">
                <label>AC Code</label>
                <select name="ac_code" class="form-control">
                  <option selected="" disabled="">Select AC Code</option>
                  @foreach ($acdetails as $acdetail)
                  <option value="{{ $acdetail->id}}" {{ $acdetail->id==$countingtables->ac_code?'selected':'' }}>{{ $acdetail->ac_code}}</option> 
                  @endforeach 
                </select> 
              </div>
              <div class="col-lg-3 form-group">
                <label>Table No</label>
                <input type="text" class="form-control" value="{{ $countingtables->table_no }}" name="table_no"> 
              </div> 
              <div class="col-lg-12 text-center form-group">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
     </div>
   </div>  	
</div>
     	