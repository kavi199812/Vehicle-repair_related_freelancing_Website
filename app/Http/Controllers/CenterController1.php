<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Job;
use App\Models\Offer;
use App\Notifications\NewOfferCerated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CenterController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        if ($search != "") {

            $jobs = job::where('fault', 'LIKE', "%$search%")
                ->orwhere('vehicle_name', 'LIKE', "%$search%")
                ->get();

        } else {
            $jobs = Job::query()
                ->get();
        }

        $offer_count = DB::table('offer_accepts')->where('center_id', auth('center')->id())->count();
        $Send_offer_count = DB::table('offers')->where('center_id', auth('center')->id())->count();
        $income = DB::table('offer_accepts')->where('center_id', auth('center')->id())->sum('offer_price');

        $data = compact('jobs', 'search','offer_count','Send_offer_count','income');

        return view("center.job.index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'cost' => 'required',
            'discription' => 'required',
            'job_id' => 'required',
            'mobile' => 'required',
            'location' => 'required'
        ]);

        $offer = Offer::create([
            'email' => $request->input('email'),
            'discription' => $request->input('discription'),
            'cost' => $request->input('cost'),
            'job_id' => $request->input('job_id'),
            'mobile' => $request->input('mobile'),
            'center_id' => auth('center')->id(),
            'customer_id' => $request->input('customer_id'),
            'location' => $request->input('location'),
            'fault' => $request->input('fault')

        ]);

        $job = Job::find($request->get('job_id'));

        $job->customer->notify(new NewOfferCerated($offer));

        return redirect('vehicle-center')->with('success', 'Offer has been sent!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id,'view');
        $cus_id = job::where('id', $id)->value('customer_id');
        $fault = job::where('id', $id)->value('fault');
        return view('center.job.create', compact('id', 'cus_id','fault'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
