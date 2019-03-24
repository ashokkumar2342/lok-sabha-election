<option selected="" disabled="">Select Booth No</option> 
@foreach ($boothdetails as $boothdetail)
    <option value="{{ $boothdetails->id }}">{{ $boothdetails->booth_no }}</option>
@endforeach 
    