<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'cost',
        'email',
        'job_id',
        'customer_id',
        'center_id',
        'mobile',
        'discription',
        'location',
        'fault',

    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function center()
    {
        return $this->belongsTo(center::class);
    }
}
