<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // customer_id
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function offers()
    {
        return $this->hasMany(offer::class);
    }
}
