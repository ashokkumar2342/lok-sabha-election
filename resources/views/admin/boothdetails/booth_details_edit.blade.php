 <div class="modal-dialog modal-lg" style="width:90%"> 
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header"> 
     	  <h4 class="modal-title">Booth Details Edit</h4>
       <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
     

     </div>
     <div class="modal-body"> 
       <form class="add_form" action="{{ route('booth.details.update',$boothdetail->id) }}" method="post" button-click="btn_booth_show,btn_close">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>PC Code</label> 
                <select name="pc_code" class="form-control"> 
                  @foreach ($pcdetails as $pcdetail)
                     <option value="{{ $pcdetail->id}}" {{ $pcdetail->id==$boothdetail->pc_code?'selected':'' }}>{{ $pcdetail->pc_code}}</option>
                  @endforeach 
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>AC Code</label>
                 <select name="pc_code" class="form-control"> 
                  @foreach ($acdetails as $acdetail)
                     <option value="{{ $acdetail->id}}" {{ $acdetail->id==$boothdetail->ac_code?'selected':'' }}>{{ $acdetail->ac_code}}</option>
                  @endforeach 
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Booth No</label>
                <input type="text" class="form-control" value="{{ $boothdetail->booth_no }}" name="booth_no"> 
              </div>
               <div class="col-lg-4 form-group">
                <label>Booth Name</label>
                <input type="text" class="form-control" value="{{ $boothdetail->booth_name }}" name="booth_name"> 
              </div>   
               <div class="col-lg-4 form-group">
                <label>Booth Location</label>
                <input type="text" class="form-control" value="{{ $boothdetail->booth_location }}" name="booth_location"> 
              </div> 
              <div class="col-lg-4 form-group">
                <label>Total Vote Pooled</label>
                <input type="text" class="form-control" value="{{ $boothdetail->total_vote_pooled }}" name="total_booth_pooled"> 
              </div> 
              <div class="col-lg-12 text-center form-group">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
     </div>
   </div>  	
</div>
     	