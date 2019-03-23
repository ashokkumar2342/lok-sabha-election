<select name="ac_code" class="form-control" id="ac_code" onchange="callAjax(this,'{{ url('search-table') }}'+'?pc_code='+$('#pc_code').val(),'table_select')" required=""> 
             <option selected="" disabled="">Select AC Code</option> 
            @foreach ($acdetails as $acdetail)
                <option value="{{ $acdetail->id }}">{{ $acdetail->ac_code }}</option>
            @endforeach 
          </select> 