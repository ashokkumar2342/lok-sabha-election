<?php

namespace App\Http\Controllers;

use App\BoothDetails;
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
        return view('admin.boothdetails.booth_details');
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
       'ac_code' => 'required',
       "booth_no" => 'required',
       "booth_location" => 'required',
       "booth_name" => 'required',
       "total_booth_pooled" => 'required',
        
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
        $boothdetails->total_booth_pooled=$request->total_booth_pooled;
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
    public function show(BoothDetails $boothDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BoothDetails  $boothDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(BoothDetails $boothDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BoothDetails  $boothDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoothDetails $boothDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BoothDetails  $boothDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoothDetails $boothDetails)
    {
        //
    }
}
