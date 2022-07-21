<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;
use App\Models\sale;


class saleController extends Controller
{
    public function index(){

        $sale = sale::query()
            ->where('customer_id', auth('customer')->id())
            ->get();
        return view('customer.sale.index')->with(compact('sale'));
    }

    public function addSale(){
        return view('customer.sale.create');

    }
    public function store( Request $request){
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

    public function Saledelete(Request $id){

       //dd($id);
     // $sale = sale::find($id);
      //nlink(public_path('images').'/'.$sale->vehicle_img);
     //  $sale->delete();
      //  return back()->with('saledelete','delete success');


    }
}
