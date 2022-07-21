<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\center;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CenterReportController extends Controller
{
    public function index()
    {
        //dd('center reports');
        return view('admin.report.center.centerreport');
    }
    public function records(Request $request)
    {
        //dd($request);
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $centers = center::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $centers = center::latest()->get();
                }
            } else {
                $centers = center::latest()->get();
            }

            return response()->json([
                'centers' => $centers
            ]);
        } else {
            abort(403);
        }
    }
}
