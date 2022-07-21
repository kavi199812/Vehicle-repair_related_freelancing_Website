<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

//use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required'
        ]);
        $customer = new customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password =Hash::make($request->password);
        $save = $customer->save();

        if($save){
            return back()->with('success','New User Created');

        }else{
            return back()->with('fail');
        }

    }
    function check(Request $request){
        $attributes = $request -> validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        // auth('customer')->user()
        if (auth('customer')->attempt($attributes)) {
            return redirect()->route('customer.dashboard')->with('success', 'You are logged in');
        }

        return back()->with('fail','Email or Password incorrect');
       // throw ValidationException::withMessages(['username' => 'Credentials not matched in our records!']);

    }
    function dashboard(){

        $job_count = DB::table('jobs')->where('customer_id', auth('customer')->id())->count();
        $sale_count = DB::table('sales')->where('customer_id', auth('customer')->id())->count();
        $offer_count = DB::table('offers')->where('customer_id', auth('customer')->id())->count();

       //dd($job_count);
       return view('customer/dashboard',[],compact('job_count','sale_count','offer_count'));

    }

    function logout(){
        auth('customer')->logout();
        return redirect()->route('index');

       // redirect()->route('homepage');
       // return view('auth.login');

    }


}

