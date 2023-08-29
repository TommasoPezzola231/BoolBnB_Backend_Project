<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{

    protected $fillable = [
        'name_sponsorship',
        'price',
        'duration',
    ];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class);
    }

    use HasFactory;
}
