<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobReportController extends Controller
{
    public function index()
    {
        //dd('job reports');
        return view('admin.report.job.JobReports');
    }
    public function records(Request $request)
    {
        //dd($request);
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $jobs = Job::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $jobs = Job::latest()->get();
                }
            } else {
                $jobs = Job::latest()->get();
            }

            return response()->json([
                'jobs' => $jobs
            ]);
        } else {
            abort(403);
        }
    }
}
