<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\BoothDetails;
use App\CandidateDetails;
use App\CountingTable;
use App\CountingTableBoothMap;
use App\PCDetails;
use App\User;
use App\VoteDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    public function adminLoginVoteDetails(Request $request)
    {
      $this->validate($request, [
          'password' => 'required',
          'email' => 'email',
           
      ]);
      $user = User::where('email',$request->email)->first();
      
      if (Hash::check(Input::get('password'), $user->password))
      {  
          $request->session()->put('user', 1);
       
          return redirect()->back()->with(['message'=>'Login Successfully','class'=>'success']);
      }else{  
         return redirect()->back()->with(['message'=>'These credentials do not match our records.','class'=>'error']);
      }  
       return redirect()->back()->with(['message'=>'These credentials do not match our records.','class'=>'error']);  
    }

    public function adminLogoutVoteDetails(Request $request)
    {
       $request->session()->forget('user'); 
       return redirect()->back()->with(['message'=>'Logout Successfully','class'=>'success']);  
    }

    public function sessionSet(Request $request)
    {  
      if ($request->pc_code ==null && $request->ac_code ==null && $request->table_no ==null) {
       return redirect()->route('login.vote.details')->with(['message'=>'required all field','class'=>'error']);  
      }
      
        $datas['pc_code']=$request->pc_code;
        $datas['ac_code']=$request->ac_code;
        $datas['table_no']=$request->table_no;
       $request->session()->put('data', $datas);
       return redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if ($request->pc_code ==null && $request->ac_code ==null && $request->table_no ==null) {
       return redirect()->route('login.vote.details')->with(['message'=>'Contact Admin...','class'=>'error']);  
      }

      $candidatedetails = CandidateDetails::all();  
      $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$request->pc_code)
                                ->where('ac_code',$request->ac_code)
                                ->where('table_no',$request->table_no)->orderBy('round_no','asc')->get();
     $activeBoothNo = $countingTableBoothMaps->where('status',0)->first();                       
        return view('admin.votedetails.vote_details_create',compact('countingTableBoothMaps','candidatedetails','request','activeBoothNo'));
    }
    //candidateDetails
   public function candidateDetails($countingTableBoothMap_id)
    {
      $candidatedetails = CandidateDetails::all();  
      $countingTableBoothMap=CountingTableBoothMap::find($countingTableBoothMap_id);
      $boothDetail=BoothDetails::where(['pc_code'=>$countingTableBoothMap->pc_code,'ac_code'=>$countingTableBoothMap->ac_code,'booth_no'=>$countingTableBoothMap->booth_no])->first();
     

        return view('admin.votedetails.candidate_table_form',compact('countingTableBoothMap','candidatedetails','boothDetail'));
    }
    public function candidateDetailsRoundFinsh()
    { 
        return view('admin.votedetails.round_finish');
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
          'vote_polled.*' => 'required', 
          ];

         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all(); 
             return redirect()->back()->with(['message'=>'required vote polled field','class'=>'error']);
             // $response=array();
             // $response["status"]=0;
             // $response["msg"]=$errors[0];
             // return response()->json($response);// response as json
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
               $voteDetails->booth_id=$countingTableBoothMap->booth_id;
               $voteDetails->candidate_id=$value;
               $voteDetails->vote_polled=$request->vote_polled[$key];
               $voteDetails->status=1;
               $voteDetails->save();
               
          }
          return redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']);
          // $response["status"]=1;
          // $response["msg"]='Save Successfully';
          // return response()->json($response);// response as json
         } 
         return redirect()->back()->with(['message'=>'Total Vote Polled Not Match','class'=>'error']);
          // $response["status"]=0;
          // $response["msg"]='Total Vote Polled Not Match';
          // return response()->json($response);// response as json
         
         
        
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
      $countingtables=CountingTable::where('pc_code',$request->pc_code)->where('ac_code',$request->ac_code)->get();
       return view('admin.votedetails.select_table',compact('countingtables'))->render();
    }

    public function boothNoShow($pc_code,$ac_code,$table_no)
    {  
         
      $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$pc_code)
                                ->where('ac_code',$ac_code)
                                ->where('table_no',$table_no)->orderBy('booth_id','asc')->get();
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
    public function VoteForm()
    {
       $user=Auth::User(); 
       $pc_code=$user->pc_code;
       $ac_code=$user->ac_code;
       $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$user->pc_code)->where('ac_code',$user->ac_code)->get();
       
        return view('admin.dashboard.vote.vote_form',compact('countingTableBoothMaps','pc_code','ac_code'));
    } 

    public function VoteCandidateFormShow(Request $request,$pc_code,$ac_code)
    {   
         $candidatedetails = CandidateDetails::all(); 
         $countingTableBoothMap=CountingTableBoothMap::where('pc_code',$pc_code)
                                ->where('ac_code',$ac_code)
                                ->where('booth_no',$request->booth_no)->first();
        $boothDetail=BoothDetails::where(['pc_code'=>$pc_code,'ac_code'=>$ac_code,'booth_no'=>$request->booth_no])->first();
        return view('admin.dashboard.vote.candidate_vote_form',compact('countingTableBoothMap','candidatedetails','boothDetail'));
    }

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
