<?php

namespace App\Http\Controllers\admin;

use App\Models\Customer;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerReportController extends Controller
{
    public function index()
    {
        return view('admin.report.customer.customerreport');
    }
    public function records(Request $request)
    {
        //dd($request);
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $customers = Customer::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $customers = Customer::latest()->get();
                }
            } else {
                $customers = Customer::latest()->get();
            }

            return response()->json([
                'customers' => $customers
            ]);
        } else {
            abort(403);
        }
    }

}
