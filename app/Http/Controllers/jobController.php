<?php

namespace App\Http\Controllers;

use App\Models\center;
use App\Models\Customer;
use App\Models\job;
use App\Notifications\NewJobNotification;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class jobController extends Controller
{

    public function index(Request $request)
    {
       // $jobs = Job::query()
        //    ->where('customer_id', auth('customer')->id())
        //    ->get();
        //return view("customer.jobs.index")->with(compact('jobs'));

        $search = $request['search'] ?? "";
        if ($search != ""){

            $jobs =job::where('customer_id', auth('customer')->id())
                 ->where('fault','LIKE',"%$search%")
                 ->get();

        }else{
            $jobs = Job::query()
                ->where('customer_id', auth('customer')->id())
                ->get();
        }

        $data = compact('jobs','search');
        return view("customer.jobs.index")->with($data);



    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name'=>'required',
            'vehicle_modal'=>'required',
            'fault'=>'required',
        ]);

        $job = Job::create([
            'vehicle_name' => $request->input('vehicle_name'),
            'vehicle_modal' => $request->input('vehicle_modal'),
            'fault' => $request->input('fault'),
            'customer_id' => auth('customer')->id()
        ]);

        Notification::send(center::all(), new NewJobNotification($job));

        return redirect()->route('customer.jobs.index')->with('status','Successfully added your job');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('customer.jobs.edit',compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $id)
    {
        $id->update($request->all());
        return redirect()->route('customer.jobs.index')->with('status','successfully update your job');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        $job ->delete();
        return redirect()->back()->with('fail','Successfully deleted job');

    }
}
