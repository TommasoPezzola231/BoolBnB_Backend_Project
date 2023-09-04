<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view extends Model
{
    protected $fillable = [
        'apartment_id',
        'ip_address',
        'viewed_at',
    ];


    use HasFactory;
}
