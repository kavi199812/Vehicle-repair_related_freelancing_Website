<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class center extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function offers()
    {
        return $this->hasMany(offer::class);
    }
    public function offeraccepts()
    {
        return $this->hasMany(OfferAccept::class);
    }
}
