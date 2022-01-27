<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }
}
