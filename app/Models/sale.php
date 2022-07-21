<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class sale extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    //protected $table = 'sales';
    protected $fillable = [
        'vehicle_name',
        'vehicle_model',
        'vehicle_price',
        'vehicle_img'
    ];
    // customer_id
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
