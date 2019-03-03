 <div class="modal-dialog modal-lg" style="width:90%"> 
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header"> 
     	  <h4 class="modal-title">PC Details Edit</h4>
       <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
     

     </div>
     <div class="modal-body"> 
      <form class="add_form" action="{{ route('pc.details.update',$pcdetails->id) }}" method="post" button-click="btn_pc_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>PC Code</label>
                <input type="text" class="form-control" maxlength="100" name="pc_code"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>PC Name</label>
                <input type="text" class="form-control" maxlength="" name="pc_name"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>RO Name</label>
                <input type="text" class="form-control" maxlength="" name="ro_name"> 
              </div> 
              <div class="col-lg-12 text-center form-group">
                <input type="submit" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
     </div>
   </div>  	
</div>
     	