 
  <div class="modal-dialog modal-lg" style="width:90%"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
      	  <h4 class="modal-title">Candidate Details Edit</h4>
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      

      </div>
      <div class="modal-body">
      	 <form class="add_form" button-click="btn_candidate_show,btn_close" action="{{ route('candidate.update',$candidatedetail->id) }}" method="post">  
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-6 form-group">
                <label>Serial Number</label>
                <input type="text" class="form-control"  value="{{ $candidatedetail->serial_number}}" name="serial_number"> 
              </div>
              <div class="col-lg-6 form-group">
                <label>Candidate Name</label>
                <input type="text" class="form-control"  value="{{ $candidatedetail->candidate_name}}" name="candidate_name"> 
              </div>
              <div class="col-lg-6 form-group">
                <label>Party Name</label>
                <input type="text" class="form-control"  value="{{ $candidatedetail->party_name}}" name="party_name"> 
              </div>
              <div class="col-lg-6 form-group">
                <label>Party Symbol</label>
                <input type="text" class="form-control"   value="{{ $candidatedetail->party_symbol}}" name="party_symbol"> 
              </div>
              <div class="col-lg-12 form-group">
                <label>Remarks</label>
                <textarea type="text" rows="1" class="form-control"  name="remarks">{{ $candidatedetail->remarks}}</textarea> 
              </div>
              <div class="col-lg-12 text-center form-group">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
      </div>
    </div>  	
 </div>
      	