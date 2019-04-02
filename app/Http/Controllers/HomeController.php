<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\BoothDetails;
use App\CandidateDetails;
use App\CountingTable;
use App\CountingTableBoothMap;
use App\VoteDetails;
use Auth;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $user = Auth::user();
        $pc_code =$user->pc_code;
        $ac_code =$user->ac_code;
        $candidatedetails = CandidateDetails::all();
        $candidateVotes = array();
        foreach ($candidatedetails as $key => $candidate) {
          $candidateVotes[$candidate->id]= VoteDetails::where('pc_code',$pc_code)
                                           ->where('ac_code',$ac_code)                               
                                           ->where('candidate_id',$candidate->id)                               
                                           ->sum('vote_polled');
        }
       $candidateVotes= array_sort($candidateVotes);
       $candidateVotes=  array_reverse($candidateVotes,true);
      
         $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$pc_code)
                                  ->where('ac_code',$ac_code) 
                                  ->orderBy('round_no','asc')->get();
        $roundNumbers=CountingTableBoothMap::where('pc_code',$pc_code)
                                  ->where('ac_code',$ac_code)
                                  ->distinct('round_no')
                                  ->orderBy('round_no','asc')->get(['round_no']);                          
        $countigTables = CountingTable::where('pc_code',$pc_code)->where('ac_code',$ac_code)->get();

       $countingTableMinStatus=CountingTableBoothMap::where('pc_code',$pc_code)
                                          ->where('ac_code',$ac_code)
                                          ->where('status',1)
                                          ->get();

      
        $activeBoothNo = $countingTableBoothMaps->where('status',0)->first();
        return view('admin.dashboard.index',compact('pc_code','ac_code','activeBoothNo','roundNumbers','candidateVotes','candidatedetails'));
    }

    public function roudWiseDetails($pc_code,$ac_code,$round_no){
       $candidatedetails = CandidateDetails::all();
       $candidateVotes = array();
       foreach ($candidatedetails as $key => $candidate) {
         $candidateVotes[$candidate->id]= VoteDetails::where('pc_code',$pc_code)
                                          ->where('ac_code',$ac_code)                               
                                          ->where('round_no',$round_no)                               
                                          ->where('candidate_id',$candidate->id)                               
                                          ->sum('vote_polled');
       }
      $candidateVotes= array_sort($candidateVotes);
      $candidateVotes=  array_reverse($candidateVotes,true);
     $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$pc_code)
                                  ->where('ac_code',$ac_code)                                    
                                  ->where('round_no',$round_no) 
                                  ->get();
      return  view('admin.dashboard.aro.roudWiseDetails',compact('countingTableBoothMaps','pc_code','ac_code','round_no','candidateVotes'))->render();                            
    }
   //candidateDetails
  public function candidateDetails($countingTableBoothMap_id)
   {
     $candidatedetails = CandidateDetails::all();  
     $countingTableBoothMap=CountingTableBoothMap::find($countingTableBoothMap_id);
     $boothDetail=BoothDetails::where(['pc_code'=>$countingTableBoothMap->pc_code,'ac_code'=>$countingTableBoothMap->ac_code,'booth_no'=>$countingTableBoothMap->booth_no])->first();
    

       return view('admin.dashboard.aro.candidate_table_form',compact('countingTableBoothMap','candidatedetails','boothDetail'));
   }

    //download
    public function roundReportDownload($pc_code,$ac_code,$round_no){

          $candidatedetails = CandidateDetails::all();
          $voteDetails=VoteDetails::where('pc_code',$pc_code)
                                               ->where('ac_code',$ac_code)                               
                                               ->where('round_no',$round_no)  
                                               ->first();
        $acDetails = ACDetails::find($ac_code);
          $candidateVotes = array();
          $total = '';
          foreach ($candidatedetails as $key => $candidate) {
            $votes=VoteDetails::where('pc_code',$pc_code)
                                             ->where('ac_code',$ac_code)                               
                                             ->where('round_no',$round_no)                               
                                             ->where('candidate_id',$candidate->id)                            
                                             ->sum('vote_polled');
            $total+=$votes;
            $candidateVotes[$candidate->id]= $votes;
          }

        $candidateVotesSort= array_sort($candidateVotes);
        $candidateVotesReverse=  array_reverse($candidateVotesSort,true);
        $maxVotes='';
        $SecoundMaxVotes='';
        $keyNo ='';
       
        foreach ($candidateVotesReverse as $vote) {
           $keyNo +=1;          
           if ($keyNo==1){
            $maxVotes+=$vote;
           }
            if ($keyNo==2){
            $SecoundMaxVotes+=$vote;
           }  
           if ($keyNo==3){
            break;
           } 
        }
        $leadMargin =$maxVotes - $SecoundMaxVotes;
        //Up to Vote Details        
        $upToCandidateVotes = array();
         $upTototal='';
        $roundArray=array();
         for ($i=1; $i <=$round_no; $i++) {
          $roundArray[]=$i;
         } 
          foreach ($candidatedetails as $key => $candidate) {
              $upToVotes=VoteDetails::where('pc_code',$pc_code)
                                               ->where('ac_code',$ac_code)                               
                                               ->whereIn('round_no',$roundArray)                               
                                               ->where('candidate_id',$candidate->id)                            
                                               ->sum('vote_polled');
              $upTototal+=$upToVotes;
              $upToCandidateVotes[$candidate->id]= $upToVotes;
            }
          
        $upToCandidateVotesSort= array_sort($upToCandidateVotes);
         $upToCandidateVotesReverse=  array_reverse($upToCandidateVotesSort,true);
         $upToMaxVotes='';
         $upToSecoundMaxVotes='';
         $upTokeyNo ='';
         
         foreach ($upToCandidateVotesReverse as $upToVote) {
            $upTokeyNo +=1;          
            if ($upTokeyNo==1){
             $upToMaxVotes+=$upToVote;
            }
             if ($upTokeyNo==2){
             $upToSecoundMaxVotes+=$upToVote;
            }  
            if ($upTokeyNo==3){
             break;
            } 
         }

         $UpToLeadMargin =$upToMaxVotes - $upToSecoundMaxVotes;
        //end up to vote details
        $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$pc_code)
                                     ->where('ac_code',$ac_code)                                    
                                     ->where('round_no',$round_no) 
                                     ->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.dashboard.pdf.roundwisereport',compact('countingTableBoothMaps','pc_code','ac_code','round_no','candidateVotes','total','leadMargin','upToCandidateVotes','UpToLeadMargin','upTototal','acDetails','voteDetails'));
        return $pdf->stream();
         
    }
     //download
    public function download($ac_code,$pc_code,$round_no,$table_no){

        $candidatedetails = CandidateDetails::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.dashboard.pdf.report',compact('candidatedetails','ac_code','pc_code','round_no','table_no'));
        return $pdf->stream();
         
    }
}
