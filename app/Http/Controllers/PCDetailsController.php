<?php

namespace App\Http\Controllers;

use App\PCDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PCDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pcdetails=PCDetails::all();
        return view('admin.pcdetails.pc_details',compact('pcdetails'));
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

       'pc_code' => 'required|unique:p_c_details',
       "pc_name" => 'required',
       "ro_name" => 'nullable', 
       ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
         
         $pcdetails = new PCDetails();
        $pcdetails->pc_code=$request->pc_code;
        $pcdetails->pc_name=$request->pc_name;
        $pcdetails->ro_name=$request->ro_name; 
        $pcdetails->save();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Save Successfully';
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PCDetails  $pCDetails
     * @return \Illuminate\Http\Response
     */
    public function show(PCDetails $pCDetails)
    {  
         $pcdetails=PCDetails::all();
        return view('admin.pcdetails.pc_details_table',compact('pcdetails'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PCDetails  $pCDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $pcdetails=PCDetails::find($id);
        return view('admin.pcdetails.pc_details_edit',compact('pcdetails'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PCDetails  $pCDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
         $pcdetails = PCDetails::find($id);
        $pcdetails->pc_code=$request->pc_code;
        $pcdetails->pc_name=$request->pc_name;
        $pcdetails->ro_name=$request->ro_name; 
        $pcdetails->save();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Update Successfully';
        return $response;              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PCDetails  $pCDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pcdetails=PCDetails::find($id);
        $pcdetails->delete();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Delete Successfully';
        return $response;
    }
}
