<?php

namespace App\Http\Controllers;

use App\ACDetails;
use App\BoothDetails;
use App\CountingTable;
use App\CountingTableBoothMap;
use App\PCDetails;
use Illuminate\Http\Request;

class CountingTableBoothMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $boothdetails=BoothDetails::all();
         $countingtables=CountingTable::all();
         $acdetails=ACDetails::all();
        $pcdetails=PCDetails::all();
        return view('admin.contingtableboothmap.conting_table_booth_map',compact('acdetails','pcdetails','countingtables','boothdetails'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CountingTableBoothMap  $countingTableBoothMap
     * @return \Illuminate\Http\Response
     */
    public function show(CountingTableBoothMap $countingTableBoothMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CountingTableBoothMap  $countingTableBoothMap
     * @return \Illuminate\Http\Response
     */
    public function edit(CountingTableBoothMap $countingTableBoothMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CountingTableBoothMap  $countingTableBoothMap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountingTableBoothMap $countingTableBoothMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CountingTableBoothMap  $countingTableBoothMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountingTableBoothMap $countingTableBoothMap)
    {
        //
    }
}
