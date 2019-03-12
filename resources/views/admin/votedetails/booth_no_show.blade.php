<ol class="breadcrumb float-lg-right">
	
  @foreach ($countingTableBoothMaps as $countingTableBoothMap) 
  @php
  if ($countingTableBoothMap->status==0){
  	$bgColor = 'bg-danger';
  }elseif($countingTableBoothMap->status==1) {
  	 $bgColor = 'bg-success';
  }
  	 
  
		
	@endphp
  <li class="breadcrumb-item" id="booth_no{{ $countingTableBoothMap->id }}" onclick="callAjax(this,'{{ route('candidate.vote.details',$countingTableBoothMap->id) }}','candidate_details_form')"><a href="#"><span class="badge {{ $bgColor }}">{{ $countingTableBoothMap->booth_no }}</span> </a></li> 
  @endforeach 
</ol> 