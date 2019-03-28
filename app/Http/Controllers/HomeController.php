<?php

namespace App\Http\Controllers;

use App\CountingTable;
use App\CountingTableBoothMap;
use Auth;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $countigTables = CountingTable::where('pc_code',$user->pc_code)->where('ac_code',$user->ac_code)->get();

       $countingTableMinStatus=CountingTableBoothMap::where('pc_code',$user->pc_code)
                                          ->where('ac_code',$user->ac_code)
                                          ->where('status',1)
                                          ->get();

       $countingTableBoothMaps=CountingTableBoothMap::where('pc_code',$user->pc_code)
                                  ->where('ac_code',$user->ac_code)
                                  ->where('table_no',1)->orderBy('round_no','asc')->get();
        $activeBoothNo = $countingTableBoothMaps->where('status',0)->first();
        return view('admin.dashboard.index',compact('countigTables','activeBoothNo'));
    }

    //download
    public function download(){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.dashboard.pdf.report');
        return $pdf->stream();
         
    }
}
