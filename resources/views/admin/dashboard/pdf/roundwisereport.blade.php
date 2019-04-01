<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
	.tg  {border-collapse:collapse;border-spacing:0;}
	.tg td{font-family:Arial, sans-serif;font-size:14px;padding:7px 4px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
	.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:7px 4px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
	.tg .tg-88nc{font-weight:bold;border-color:inherit;text-align:center}
	.tg .tg-srvh{font-weight:bold;font-size:14px;background-color:#333333;color:#ffffff;border-color:inherit;text-align:center}
	.tg .tg-kiyi{font-weight:bold;border-color:inherit;text-align:left}
	.tg .tg-0juo{font-size:16px;background-color:#333333;color:#ffffff;border-color:inherit;text-align:center}
	.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:center}
	.tg .tg-tyyz{font-size:20px;background-color:#ffffff;border-color:inherit;text-align:center}
	.tg .tg-w6fb{font-weight:bold;font-size:15px;border-color:inherit;text-align:center}
	.tg .tg-21r5{font-weight:bold;border-color:inherit;text-align:right}
	.tg .tg-quj4{border-color:inherit;text-align:right}
	.tg .tg-xldj{border-color:inherit;text-align:left}
	.tg .tg-6ic8{font-weight:bold;border-color:inherit;text-align:right;vertical-align:top}
	.tg .tg-7btt{font-weight:bold;border-color:inherit;text-align:center;vertical-align:top}
	.tg .tg-fymr{font-weight:bold;border-color:inherit;text-align:left;vertical-align:top}
	.tg .tg-73a0{font-size:12px;border-color:inherit;text-align:left;vertical-align:top}
	.tg .tg-f4iu{font-size:12px;border-color:inherit;text-align:center;vertical-align:top}
	.tg .tg-0pky{border-color:inherit;text-align:center;vertical-align:top}
	</style>
	<table class="tg">
	  <tr>
	    <th class="tg-srvh" colspan="2">To be sent to CEO only by FAX from Counting&nbsp;&nbsp;Centre&nbsp;&nbsp;</th>
	    <th class="tg-tyyz" colspan="2">             &nbsp;&nbsp;&nbsp;General Lok Sabha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           <br>        Elections -2019            <br></th>
	    <th class="tg-0juo" colspan="2">Counting Proforma<br>CEO-CRO1    </th>
	  </tr>
	  <tr>
	    <td class="tg-w6fb" colspan="6">Round-Wise Position Of Assembly Constituency</td>
	  </tr>
	  <tr>
	    <td class="tg-21r5" colspan="2">District</td>
	    <td class="tg-kiyi">JHAJJAR</td>
	    <td class="tg-kiyi">NO.&amp; Name of AC</td>
	    <td class="tg-kiyi" colspan="2">65 BADLI</td>
	  </tr>
	  <tr>
	    <td class="tg-quj4" colspan="2"><span style="font-weight:bold">Counting Centre Id &amp; Name</span></td>
	    <td class="tg-kiyi" colspan="4">Kisan Sadan veterinar hospitas capmsus ,west Bye road </td>
	  </tr>
	  <tr>
	    <td class="tg-21r5" colspan="2">Round No.</td>
	    <td class="tg-xldj">{{ $round_no }}</td>
	    <td class="tg-21r5">Round Type</td>
	    <td class="tg-88nc" colspan="2">12th</td>
	  </tr>
	  <tr>
	    <td class="tg-6ic8" colspan="2">Date</td>
	    <td class="tg-7btt">19-12-2019</td>
	    <td class="tg-6ic8">Time</td>
	    <td class="tg-7btt" colspan="2">12:30 PM</td>
	  </tr>
	  <tr style="height: 10px">
	    <td class="tg-fymr" rowspan="2">Sr.<br>No.</td>
	    <td class="tg-fymr" colspan="2" rowspan="2">Candidate's Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td class="tg-7btt" rowspan="2">Party</td>
	    <td class="tg-7btt" colspan="2">Votes In favour</td>
	  </tr>
	  <tr>
	    <td class="tg-73a0">in this Round</td>
	    <td class="tg-f4iu">Comulated till this<br>Round</td>
	  </tr>
	  
	  @foreach ($candidateVotes as $candidate_id=>$candidateVote) 
	  @php
	  	$candidatedetail=App\CandidateDetails::find($candidate_id);
	  	
	  	 
	  @endphp
	  <tr>
	    <td class="tg-0pky">{{ $candidatedetail->serial_number }}</td>
	    <td class="tg-0pky" colspan="2">{{  $candidatedetail->candidate_name }}</td>
	    <td class="tg-c3ow" style="width: 200px">  {{  $candidatedetail->party_name }}</td>
	    <td class="tg-c3ow">{{ $candidateVote }}</td>
	    <td class="tg-c3ow">{{ $upToCandidateVotes[$candidate_id] }}</td>
	  </tr>
	 @endforeach
	  <tr>
	    <td class="tg-c3ow" colspan="4">Total Votes Counted</td>
	    <td class="tg-0pky">{{ $total }}</td>
	    <td class="tg-0pky">{{ $upTototal }}</td>
	  </tr>
	  <tr>
	    <td class="tg-c3ow" colspan="4">Lead Margin</td>
	    <td class="tg-0pky">{{ $leadMargin }}</td>
	    <td class="tg-0pky">{{ $UpToLeadMargin }}</td>
	  </tr>
	  <tr>
	    <td class="tg-0pky" colspan="6"></td>
	  </tr>
	  <tr>
	    <td class="tg-0pky" colspan="3">RO Signature</td>
	    <td class="tg-0pky" colspan="3">Observer's Signature</td>
	  </tr>
	  <tr>
	    <td class="tg-0pky" colspan="3">RO Stamp</td>
	    <td class="tg-0pky" colspan="3">Observer's ECI Code</td>
	  </tr>
	</table>
</body>
</html>