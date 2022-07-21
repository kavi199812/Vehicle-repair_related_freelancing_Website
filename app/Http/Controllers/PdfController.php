<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
class PdfController extends Controller
{
    public function pdfmaker(){

        //$jobs = job::get();
        //return view("Admin.report.index")->with(compact('jobs'));

        $pdf = PDF::loadView('pdf');
        return $pdf->download('test..pdf');
    }

}
