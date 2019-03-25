<option selected="" disabled="">Select AC Code</option> 
@foreach ($acdetails as $acdetail)
    <option value="{{ $acdetail->id }}">{{ $acdetail->ac_code }}</option>
@endforeach 
    