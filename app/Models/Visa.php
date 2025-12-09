<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = [
        'name', 'country', 'requirements', 'normal_price', 'b2b_price', 'processing_time'
    ];
}
