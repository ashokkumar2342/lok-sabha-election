<?php

namespace App\Http\Controllers;

use App\CandidateDetails; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidateDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatedetails = CandidateDetails::all();
        return view('admin.candidatedetails.candidate_details',compact('candidatedetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
     $rules=[

       'serial_number' => 'required',
       "candidate_name" => 'required',
       "party_name" => 'required',
       "party_symbol" => 'required',
       "remarks" => 'required',
        
       ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
         
         $candidatedetails = new CandidateDetails();
        $candidatedetails->serial_number=$request->serial_number;
        $candidatedetails->candidate_name=$request->candidate_name;
        $candidatedetails->party_name=$request->party_name;
        $candidatedetails->party_symbol=$request->party_symbol;
        $candidatedetails->remarks=$request->remarks;
        $candidatedetails->save();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Save Successfully';
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CandidateDetails  $candidateDetails
     * @return \Illuminate\Http\Response
     */
    public function showTable()
    {
         $candidatedetails = CandidateDetails::all();
         return view('admin.candidatedetails.candidate_table',compact('candidatedetails'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CandidateDetails  $candidateDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidatedetail=CandidateDetails::find($id);
        return view('admin.candidatedetails.candidate_edit',compact('candidatedetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CandidateDetails  $candidateDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {    

         $candidatedetails = CandidateDetails::find($id);
        $candidatedetails->serial_number=$request->serial_number;
        $candidatedetails->candidate_name=$request->candidate_name;
        $candidatedetails->party_name=$request->party_name;
        $candidatedetails->party_symbol=$request->party_symbol;
        $candidatedetails->remarks=$request->remarks;
        $candidatedetails->save();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Update Successfully';
        return $response;              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CandidateDetails  $candidateDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidatedetail=CandidateDetails::find($id);

        $candidatedetail->delete();
        return redirect()->back();
    }

}
