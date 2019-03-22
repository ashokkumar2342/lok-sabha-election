<select name="table_no" id="admin_table_no" class="form-control" > 
 <option selected="" disabled="">Select Table No</option> 
@foreach ($countingtables as $countingtable)
    <option value="{{ $countingtable->table_no }}">{{ $countingtable->table_no }}</option>
@endforeach 
</select> 