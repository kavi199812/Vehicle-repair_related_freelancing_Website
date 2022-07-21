<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function offers()
    {
        return $this->hasMany(offer::class);
    }

    public function sales()
    {
        return $this->hasMany(Job::class);
    }
}

