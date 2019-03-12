<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\BoothDetails;
use App\CandidateDetails;
use App\CountingTable;
use App\CountingTableBoothMap;
use App\PCDetails;
use App\VoteDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoteDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pcdetails=PCDetails::all();
        
         return view('admin.votedetails.vote_details',compact('pcdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $candidatedetails = CandidateDetails::all();  
      $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$request->pc_code)
                                ->where('ac_code',$request->ac_code)
                                ->where('table_no',$request->table_no)->get();

        return view('admin.votedetails.vote_details_create',compact('countingTableBoothMaps','candidatedetails','request'));
    }
    //candidateDetails
   public function candidateDetails($countingTableBoothMap_id)
    {
      $candidatedetails = CandidateDetails::all();  
      $countingTableBoothMap=CountingTableBoothMap::find($countingTableBoothMap_id);
      $boothDetail=BoothDetails::where(['pc_code'=>$countingTableBoothMap->pc_code,'ac_code'=>$countingTableBoothMap->ac_code,'booth_no'=>$countingTableBoothMap->booth_no])->first();
     

        return view('admin.votedetails.candidate_table_form',compact('countingTableBoothMap','candidatedetails','boothDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$countingTableBoothMap_id)
    {
        $rules=[ 
          'vote_polled' => 'required', 
          ];

         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         }
         if ($request->total==$request->total_vote_polled) {
            $countingTableBoothMap=CountingTableBoothMap::find($countingTableBoothMap_id);
            $countingTableBoothMap->status=1;
            $countingTableBoothMap->update();

          foreach ($request->candidate_id as $key => $value) {
               $voteDetails = new VoteDetails();
               $voteDetails->counting_table_booth_map_id=$countingTableBoothMap->id;
               $voteDetails->pc_code=$countingTableBoothMap->pc_code;
               $voteDetails->ac_code=$countingTableBoothMap->ac_code;
               $voteDetails->table_no=$countingTableBoothMap->table_no;
               $voteDetails->round_no=$countingTableBoothMap->round_no;
               $voteDetails->booth_no=$countingTableBoothMap->booth_no;
               $voteDetails->candidate_id=$value;
               $voteDetails->vote_polled=$request->vote_polled[$key];
               $voteDetails->status=1;
               $voteDetails->save();
               
          }
          
          $response["status"]=1;
          $response["msg"]='Save Successfully';
          return response()->json($response);// response as json
         } 
          $response["status"]=0;
          $response["msg"]='Total Vote Polled Not Match';
          return response()->json($response);// response as json
         
         
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\VoteDetails  $voteDetails
     * @return \Illuminate\Http\Response
     */
    public function searchAc(Request $request)
    {
        $acdetails=ACDetails::where('pc_code',$request->id)->get();
        
        return view('admin.votedetails.select_ac',compact('acdetails'))->render();
    }

    public function searchTable(Request $request)
    {  
      $countingtables=CountingTable::where('pc_code',$request->pc_code)->where('ac_code',$request->id)->get();
       return view('admin.votedetails.select_table',compact('countingtables'))->render();
    }

    public function boothNoShow($pc_code,$ac_code,$table_no)
    {  
         
      $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$pc_code)
                                ->where('ac_code',$ac_code)
                                ->where('table_no',$table_no)->get();
          $response=array();
          $response['status']=1;
           return  view('admin.votedetails.booth_no_show',compact('countingTableBoothMaps','candidatedetails'));
          
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoteDetails  $voteDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(VoteDetails $voteDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoteDetails  $voteDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoteDetails $voteDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoteDetails  $voteDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoteDetails $voteDetails)
    {
        //
    }
}
