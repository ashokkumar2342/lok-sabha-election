 <div class="modal-dialog modal-lg" style="width:90%"> 
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header"> 
     	  <h4 class="modal-title">Booth Details Edit</h4>
       <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
     

     </div>
     <div class="modal-body"> 
       <form class="add_form" action="{{ route('booth.details.update',$boothdetail->id) }}" method="post" button-click="btn_booth_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>PC Code</label>
                <input type="text" class="form-control" maxlength="100" name="pc_code"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>AC Code</label>
                <input type="text" class="form-control" maxlength="" name="ac_code"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Booth No</label>
                <input type="text" class="form-control" maxlength="" name="booth_no"> 
              </div>
               <div class="col-lg-4 form-group">
                <label>Booth Name</label>
                <input type="text" class="form-control" maxlength="" name="booth_name"> 
              </div>   
               <div class="col-lg-4 form-group">
                <label>Booth Location</label>
                <input type="text" class="form-control" maxlength="" name="booth_location"> 
              </div> 
              <div class="col-lg-4 form-group">
                <label>Total Booth Pooled</label>
                <input type="text" class="form-control" maxlength="" name="total_booth_pooled"> 
              </div> 
              <div class="col-lg-12 text-center form-group">
                <input type="submit" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
     </div>
   </div>  	
</div>
     	