<?php

namespace App\Http\Controllers;

use App\Models\center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class centerLogin extends Controller
{
    function login(){
        return view('centerAuth.login');
    }

    function register(){
        return view('centerAuth.register');
    }

    function save(Request $request){
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email|unique:centers',
            'password'=>'required'
        ]);
        $customer = new center;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password =Hash::make($request->password);
        $customer->address = $request->name;

        $save = $customer->save();

        if($save){
            return back()->with('success','New Center Created');

        }else{
            return back()->with('fail');
        }

    }

    function check(Request $request){
        $attributes = $request -> validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (auth('center')->attempt($attributes)) {

            return redirect()->route('center-auth.dashboard')->with('success', 'You are logged in');
        }
        return back()->with('fail','Email or Password incorrect');
        // throw ValidationException::withMessages(['username' => 'Credentials not matched in our records!']);
        }

    function dashboard(){

        $offer_count = DB::table('offer_accepts')->where('center_id', auth('center')->id())->count();
        $income = DB::table('offer_accepts')->where('center_id', auth('center')->id())->sum('offer_price');
        $Send_offer_count = DB::table('offers')->where('center_id', auth('center')->id())->count();

        return view('center/dashboard',[],compact('offer_count','income','Send_offer_count'));
    }
}
