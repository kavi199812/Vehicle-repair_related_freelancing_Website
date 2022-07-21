<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class adminLoginController extends Controller
{
    function login(){
        return view('admin.login');
        //dd('admin login');
    }

    function check(Request $request){
        $attributes =  $request -> validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (auth('admin')->attempt($attributes)) {

            return redirect()->route('admin.dashboard')->with('success', 'You are logged in');
        }
        return back()->with('fail','Email or Password incorrect');

    }
    function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = admin::where('id','=',Session::get('loginId'))->first();
        }

        $job_count = DB::table('jobs')->get()->count();
        $customer_count = DB::table('customers')->get()->count();
        $center_count = DB::table('centers')->get()->count();
        $vehicle_count = DB::table('sales')->get()->count();


       return view('admin/index',
           compact('data','job_count','customer_count','center_count','vehicle_count'));

    }
    function logout(){
        auth('admin')->logout();
        return redirect()->route('index');
       // return view('admin.login');

    }
}
