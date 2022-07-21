<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferAccept extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'customer_id',
        'center_id',
        'offer_id',
        'offer_price'
    ];
    public function center()
    {
        return $this->belongsTo(center::class);
    }
}
