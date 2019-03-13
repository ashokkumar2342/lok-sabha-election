<ol class="breadcrumb float-lg-right">
	@php
	$active=$countingTableBoothMaps->where('status',0)->first();
	$bgColor='bg-success';
	@endphp
  @foreach ($countingTableBoothMaps as $countingTableBoothMap) 
  @php
  if ($active!=null) {
  	 if ($countingTableBoothMap->id == $active->id){
  		$bgColor = 'bg-warning';
	  }elseif($countingTableBoothMap->status==1) {
	  	 $bgColor = 'bg-success';
	  }elseif($countingTableBoothMap->status==0) {
	  	 $bgColor = 'bg-danger';
	  }
  }
  
  	 
  
		
	@endphp
  <li class="breadcrumb-item"  id="booth_no{{ $countingTableBoothMap->id }}" @if ($bgColor=='bg-warning' || $bgColor=='bg-success' )
  	 onclick="callAjax(this,'{{ route('candidate.vote.details',$countingTableBoothMap->id) }}','candidate_details_form')"
  @endif ><a href="#"><span class="badge {{ $bgColor }}">{{ $countingTableBoothMap->booth_no }}</span> </a></li> 
  @endforeach 
  <li class="breadcrumb-item"  id="booth_no_finish" onclick="callAjax(this,'{{ route('candidate.vote.details.result') }}','candidate_details_form')"
   ><a href="#"><span class="badge {{ $bgColor }}"></span> </a></li> 
</ol> 