<?php

namespace App\Http\Controllers;

use App\Models\center;
use App\Models\Job;
use App\Models\Offer;
use App\Models\OfferAccept;
use App\Notifications\NewJobNotification;
use App\Notifications\NewOfferAccept;
use App\Notifications\NewOfferCerated;
use App\Notifications\OfferAcceptd;
use Illuminate\Http\Request;

class AcceptOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('hello report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = OfferAccept::create([
            'customer_id' => $request->input('customer_id'),
            'center_id' => $request->input('center_id'),
            'job_id' => $request->input('job_id'),
            'offer_id' => $request->input('offer_id'),
            'offer_price' => $request->input('offer_price'),

        ]);

        $offeraccept = OfferAccept::find($request->get('offer_id'));

        //$offeraccept->customer->notify(new NewOfferCerated($offer));

        return redirect()->route('customer.payment')->with('success','Successfully Accept your offer');

        //  return redirect()->route('customer.dashboard')->with('status','Successfully Accept your offer');
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
