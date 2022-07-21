<?php

namespace App\Exports;

use App\Models\job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use mysql_xdevapi\ColumnResult;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
   // private  $colums = ['1','1','1','1','1','1','1',];

    public function collection()
    {
        return job::all();
        //return job::query()
        //    ->select($this->colums)
        //    ->where('customer_id',2);

    }


}
