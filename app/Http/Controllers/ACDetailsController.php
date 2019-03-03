<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\PCDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ACDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acdetails=ACDetails::all();
        $pcdetails=PCDetails::all();
        return view('admin.acdetails.ac_details',compact('acdetails','pcdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       'pc_code' => 'required',
       "ac_code" => 'required|unique:a_c_details',
       "ac_name" => 'required',
       "aro_name" => 'nullable|string', 
       ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
         
        $acdetails = new ACDetails();
        $acdetails->pc_code=$request->pc_code;
        $acdetails->ac_code=$request->ac_code;
        $acdetails->ac_name=$request->ac_name;
        $acdetails->aro_name=$request->aro_name; 
        $acdetails->save();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Save Successfully';
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ACDetails  $aCDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ACDetails $aCDetails)
    {
         $acdetails=ACDetails::all();
        return view('admin.acdetails.ac_details_table',compact('acdetails'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ACDetails  $aCDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $acdetail=ACDetails::find($id);
         $pcdetails=PCDetails::all();
        return view('admin.acdetails.ac_details_edit',compact('acdetail','pcdetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ACDetails  $aCDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ACDetails $aCDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ACDetails  $aCDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acdetails=ACDetails::find($id);
        $acdetails->delete();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Delete Successfully';
        return $response;
    }
}
