 
  <div class="modal-dialog modal-lg" style="width:90%"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
      	  <h4 class="modal-title">User Details Edit</h4>
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      

      </div>
      <div class="modal-body">
      	 <form class="add_form" button-click="btn_user_show,btn_close" action="{{ route('user.update',$user->id) }}" method="post">  
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>Name</label>
                <input type="text" class="form-control"  value="{{ $user->name}}" name="name"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Email</label>
                <input type="text" class="form-control"  value="{{ $user->email}}" name="email"> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Password</label>
                <input type="password" class="form-control"   name="password"> 
              </div>
               
              <div class="col-lg-12 text-center form-group">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
              
            </div>
             
             
          </form>
      </div>
    </div>  	
 </div>
      	