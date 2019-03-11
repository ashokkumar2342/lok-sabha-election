<ol class="breadcrumb float-lg-right">
  @foreach ($countingTableBoothMaps as $countingTableBoothMap)
  <small>{{ $countingTableBoothMap->round_no }}</small>
  <li class="breadcrumb-item" id="booth_no{{ $countingTableBoothMap->id }}" onclick="callAjax(this,'{{ route('candidate.vote.details',$countingTableBoothMap->id) }}','candidate_details_form')"><a href="#"><span class="badge bg-danger">{{ $countingTableBoothMap->booth_no }}</span> </a></li> 
  @endforeach 
</ol> 