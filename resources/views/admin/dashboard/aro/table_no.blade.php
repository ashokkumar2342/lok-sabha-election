@php
$active=$countingTableBoothMaps->where('status',0)->first();
$bgColor='btn-success';
@endphp
 <h3 class="card-title"> 
  @foreach ($countingTableBoothMaps as $countingTableBoothMap)
   @php
   if ($active!=null) {
   	 if ($countingTableBoothMap->id == $active->id){
   		$bgColor = 'btn-warning';
 	  }elseif($countingTableBoothMap->status==1) {
 	  	 $bgColor = 'btn-success';
 	  }elseif($countingTableBoothMap->status==0) {
 	  	 $bgColor = 'btn-danger';
 	  }
   } 
 	@endphp
    <button type="button" class="btn {{ $bgColor }}"  id="btn_round_no" button-click="table_no"onclick="callAjax(this,'{{ route('aro.candidate.vote.details',$countingTableBoothMap->id) }}','candidate_details_form')">Table-{{ $countingTableBoothMap->table_no }}</button>
     
   
  @endforeach

</h3>

