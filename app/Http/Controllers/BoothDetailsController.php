<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\BoothDetails;
use App\CountingTable;
use App\PCDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoothDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $boothdetails=BoothDetails::all();
         $acdetails=ACDetails::all();
         $pcdetails=PCDetails::all();
        return view('admin.boothdetails.booth_details',compact('boothdetails','acdetails','pcdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules=[

       'pc_code' => 'required',
       'ac_code' => 'required',
       "booth_no" => 'required',
       "booth_location" => 'required',
       "booth_name" => 'required',
       "total_vote_polled" => 'required',
        
       ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
         
        $boothdetails = new BoothDetails();
        $boothdetails->pc_code=$request->pc_code;
        $boothdetails->ac_code=$request->ac_code;
        $boothdetails->booth_no=$request->booth_no;
        $boothdetails->booth_location=$request->booth_location;
        $boothdetails->booth_name=$request->booth_name;
        $boothdetails->total_vote_polled=$request->total_vote_polled;
        $boothdetails->save();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Save Successfully';
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BoothDetails  $boothDetails
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         $boothdetails=BoothDetails::all();
        return view('admin.boothdetails.booth_details_table',compact('boothdetails'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BoothDetails  $boothDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $boothdetail=BoothDetails::find($id);
           $acdetails=ACDetails::all();
         $pcdetails=PCDetails::all();
        return view('admin.boothdetails.booth_details_edit',compact('boothdetail','pcdetails','acdetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BoothDetails  $boothDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
          $boothdetails = BoothDetails::find($id);
        $boothdetails->pc_code=$request->pc_code;
        $boothdetails->ac_code=$request->ac_code;
         $boothdetails->booth_name=$request->booth_name;
        $boothdetails->booth_no=$request->booth_no;
        $boothdetails->booth_location=$request->booth_location;
        $boothdetails->total_vote_polled=$request->total_vote_polled; 
        $boothdetails->save();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Update Successfully';
        return $response;              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BoothDetails  $boothDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoothDetails $id)
    {
        $id->delete();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Delete Successfully';
        return $response;
    }
}
