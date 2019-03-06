<?php

namespace App\Http\Controllers;
use App\ACDetails;
use App\AcPcTable;
use App\PCDetails;
use Illuminate\Http\Request;

class AcPcTableController extends Controller
{
    public function index(){
    	$pcdetails=PCDetails::all();
    	$acdetails=ACDetails::all();
    	 return view('admin.acpctable.ac_pc_table',compact('pcdetails','acdetails'));

    }
    public function store(Request $request){

    	$acpctable = new AcPcTable();
    	$acpctable->pc_code=$request->pc_code;
    	$acpctable->ac_code=$request->ac_code;
    	$acpctable->table_no=$request->table_no;
    	$acpctable->save();


    }
   
}
