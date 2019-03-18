<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\BoothDetails;
use App\CountingTable;
use App\PCDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


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
       "total_vote_polled" => 'nullable',
        
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

    public function storeByExcel(Request $request){   
        try{  
             $rules=[ 
             'file' => 'required|mimes:xlsx',
             ];
             $validator = Validator::make($request->all(),$rules);
             if($validator->fails()){
                 $errors = $validator->errors()->all();
                 $response=array();
                 $response["status"]=0;
                 $response["msg"]=$errors[0];
                 return response()->json($response);// response as json
             }
             //upload file
             $files = $request->file('file'); 
             $files->store('booth_details');
             //upload data
             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
             $spreadsheet = $reader->load($request->file('file')->getRealPath());
             $sheetData = $spreadsheet->getActiveSheet()->toArray(); 
             $notImportedData=array();
               $count_all=0;
               $count_ins=0;
               $count_exits=0;
               $responseError=array();
             $header_array=array("PC Code","AC Code","Booth No","Booth Name","Booth Location","Total Vote Polled");
             $header_array = array_map('strtoupper', $header_array);

             foreach($sheetData as $va=>$key){ 
                 if ($va == 0) { 
                    foreach($key as $hc)
                    {
                      if(!in_array(trim(strtoupper($hc)), $header_array) && $hc!='')
                         {                     
                          $response=array();
                          $response["status"]=0;
                          $response["msg"]=$hc." Sheet header name is invalid";
                          return response()->json($response);// response as json
                          }
                     }
                     continue;
                 }else{
                     $error="";
                     $rules=[
                     '0' => 'required|numeric',
                     '1' => 'required|numeric',
                     '2' => 'required|numeric',
                     '3' => 'required|string', 
                     '4' => 'required|string', 
                     '5' => 'nullable|numeric', 
                     ];
                     
                    $messages=array();
                    foreach($header_array as $kk=>$kkvalue)
                    {
                      $messages[$kk.".required"]="$kkvalue is required";
                      $messages[$kk.".numeric"]="$kkvalue is numeric";
                      $messages[$kk.".string"]="$kkvalue is string";
                      
                    } 
                    $validator = Validator::make($key,$rules,$messages);
                    if($validator->fails()){
                       $errors = $validator->errors()->all(); 
                      $responseError[$va]=$errors;
                    } 
                 } 
             }
             if ($responseError!=null) {
               $response['msg']= view('include.errorMessage',compact('responseError'))->render();
             
               $response["status"]=0;
               return response()->json($response);// response as json
             }else{

                 foreach($sheetData as $va=>$key){
                     if ($va == 0) {
                         foreach($key as $hc)
                         {
                           if(!in_array(trim(strtoupper($hc)), $header_array) && $hc!='')
                           {
                               $response=array();
                               $response["status"]=0;
                               $response["msg"]="Sheet is invalid";
                               return response()->json($response);// response as json
                           }
                         }
                         continue;
                     }

                     $count_all++; 
                     $error=""; 
                     $valid = BoothDetails::where('pc_code',$key[0])->where('ac_code',$key[1])->where('booth_no',$key[2])->exists();
                     if($valid){                   
                      $response=array();
                      $response["status"]=0;
                      $response["msg"]="Already Exists";
                      $count_exits++;
                     }    
                     else{
                       $boothDetails = new BoothDetails();
                       $ins = array();
                       $ins['pc_code'] = $key[0];
                       $ins['ac_code'] =$key[1];
                       $ins['booth_no'] =$key[2];
                       $ins['booth_name'] =$key[3];
                       $ins['booth_location'] =$key[4];                       
                       $ins['total_vote_polled'] =$key[5]; 
                       
                      
                       $boothDetails->insertGetId($ins);
                       if($ins!='')
                        {
                          $count_ins++;
                        }
                     }
                     if($error!=""){
                         $key["error"]=$error;
                         $notImportedData[]=$key;
                     }                     
                 }  
                  
               $response=array();
               $response["status"]=1;
               $response["msg"]= "Unique  Inserted = ".$count_ins.'</br> Duplicate Rejected = '.$count_exits;
                
               return response()->json($response);// response as json
                   
             } 
              
            }catch(\Exception $e){
            Log::error('act defination upload: '.$e->getMessage());      // making log in file
            return view('error.home');                                  // showing the err page
         
        }
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
