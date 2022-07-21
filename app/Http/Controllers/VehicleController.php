<?php

namespace App\Http\Controllers;

use App\Models\sale;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = sale::query()
            ->where('customer_id', auth('customer')->id())
            ->get();
        return view('customer.sale.index')->with(compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vname = $request-> vehicle_name;
        $vmodel= $request -> vehicle_model;
        $price = $request -> vehicle_price;
        $img = $request ->file('vehicle_img') ;
        $imgName = time().'.'.$img->extension();
        $img->move(public_path('images'),$imgName);

        $sale  =new sale();
        $sale ->vehicle_name = $vname;
        $sale ->vehicle_model = $vmodel;
        $sale ->vehicle_price = $price;
        $sale -> vehicle_img = $imgName;
        $sale -> customer_id = auth('customer')->id();
        //'customer_id' => auth('customer')->id()

        $sale ->save();
        //return back()->with('customer.sale.index'.'record added');
        return redirect()->route('customer.sale')->with('status','Successfully added your Vehicle');
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
       // $sale = sale::find($id);
        sale::destroy($id);
      //  $id->delete();
        return redirect()->back()->with('fail','Successfully deleted job');
    }
}
