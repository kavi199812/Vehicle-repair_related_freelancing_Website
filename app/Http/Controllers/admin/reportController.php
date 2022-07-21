<?php

namespace App\Http\Controllers\admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\Job;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;



class reportController extends Controller
{
    public function index(){

        $jobs = job::get();
        return view("Admin.report.index")->with(compact('jobs'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.pdf');
       // return (new UsersExport)->download('invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }




}
