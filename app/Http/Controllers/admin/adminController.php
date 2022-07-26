<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('admin dash');
        $customers = customer::select(DB::raw('COUNT(*) as count'))
            -> whereYear('created_at',date('Y'))
            -> groupBy (DB::raw('Month(created_at)'))
            -> pluck('count');

        $months = customer::select(DB::raw('Month (created_at) as month'))
            -> whereYear('created_at',date('X'))
            -> groupBy (DB::raw('Month(created_at)'))
            -> pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month){
            $datas[$month] = $customers[$index];
        }

       return view("Admin.index",compact('datas'));


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
