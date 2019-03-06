<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\BoothDetails;
use App\CountingTable;
use App\CountingTableBoothMap;
use App\PCDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountingTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $boothdetails=BoothDetails::all(); 
        // $countingTables=CountingTable::all(); 
        
        //  $round =1;   
        //  $table =$countingTables->count();   
        //  $mult =$countingTables->count();    
        //  $tableReset =0;    
        // foreach ($boothdetails as $key => $value) {
        //     $tableReset+=1;
        //     if ($table==$key) { 
        //        $round += 1;
        //        $table= $mult * $round; 
        //     }
           

        //  echo'key= '.$key.'round='.$round.'table='.$tableReset.'</br>'; 
        //   if ($mult==$tableReset) {
        //        $tableReset=0; 
        //     } 
            
        // }
        

        $countingtables=CountingTable::all(); 
        $acdetails=ACDetails::all();
        $pcdetails=PCDetails::all();
        return view('admin.contingtable.conting',compact('acdetails','pcdetails','countingtables'));
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
       'table_no' => 'required', 
        
       ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);
      } 
     

       for ($countingtable = 1; $countingtable <=$request->table_no; $countingtable++){   
       $countingtables=CountingTable::firstOrNew(['pc_code'=>$request->pc_code,'ac_code'=>$request->ac_code,'table_no'=>$countingtable]);
        $countingtables->pc_code=$request->pc_code;
        $countingtables->ac_code=$request->ac_code;
        $countingtables->table_no=$countingtable; 
        $countingtables->save();
        
    }
    $this->contingTableBoothMap($request);
          
        $response=array();
        $response["status"]=1;
        $response["msg"]='Save Successfully';
        return $response;
    
    }

    public function contingTableBoothMap($request){

        $boothdetails=BoothDetails::where('pc_code',$request->pc_code)->
                                    where('ac_code',$request->ac_code)->get(); 
        $countingTables=CountingTable::where('pc_code',$request->pc_code)->
                                    where('ac_code',$request->ac_code)->get();  
        $round =1;   
        $table =$countingTables->count();   
        $mult =$countingTables->count();    
        $table_no =0;    
       foreach ($boothdetails as $key => $value) {
           $table_no+=1;
           if ($table==$key) { 
              $round += 1;
              $table= $mult * $round; 
           }
          
           $countingtableboothmap=new CountingTableBoothMap();
            $countingtableboothmap->pc_code=$request->pc_code;
            $countingtableboothmap->ac_code=$request->ac_code;
            $countingtableboothmap->table_no=$table_no;
            $countingtableboothmap->round_no=$round; 
            $countingtableboothmap->booth_no=$value->booth_no; 
            $countingtableboothmap->save(); 
         
         if ($mult==$table_no) {
              $table_no=0; 
           } 
           
       }                        
      
    }

    public function cTableMapSave(){
        $countingtableboothmap=CountingTableBoothMap::firstOrNew(['pc_code'=>$request->pc_code,'ac_code'=>$request->ac_code,'table_no'=>$request->table_no]);
         $countingtableboothmap->pc_code=$request->pc_code;
         $countingtableboothmap->ac_code=$request->ac_code;
         $countingtableboothmap->table_no=$request->table_no;
         $countingtableboothmap->round_no=$request->table_no; 
         $countingtableboothmap->booth_no=$boothdetails->booth_no; 
         $countingtableboothmap->save(); 
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\CountingTable  $countingTable
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $countingtables=CountingTable::all();
        $acdetails=ACDetails::all();
        $pcdetails=PCDetails::all();
        return view('admin.contingtable.conting_table_show',compact('acdetails','pcdetails','countingtables'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CountingTable  $countingTable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countingtables=CountingTable::find($id);
         $acdetails=ACDetails::all();
        $pcdetails=PCDetails::all();
        return view('admin.contingtable.conting_table_edit',compact('acdetails','pcdetails','countingtables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CountingTable  $countingTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountingTable $countingTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CountingTable  $countingTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountingTable $id)
    {
        $id->delete();
         $response=array();
        $response["status"]=1;
        $response["msg"]='Delete Successfully';
        return $response;
    }
}
