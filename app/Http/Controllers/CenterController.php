<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index(Request $request)
    {
        // $jobs = Job::query()
        //    ->where('customer_id', auth('customer')->id())
        //    ->get();
        //return view("customer.jobs.index")->with(compact('jobs'));

        $search = $request['search'] ?? "";
        if ($search != ""){

            $jobs =job::where('fault','LIKE',"%$search%")
                ->orwhere('vehicle_name','LIKE',"%$search%")
                ->get();

        }else{
            $jobs = Job::query()
                ->get();
        }

        $data = compact('jobs','search');
        return view("center.job.index")->with($data);

    }
    public function offer($id)
    {
       dd($id);
       // return view('customer.jobs.edit',compact('job'));

    }

}
