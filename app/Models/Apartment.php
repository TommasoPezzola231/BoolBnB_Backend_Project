<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "title",
        "principal_image",
        "imageID",
        "description",
        "price",
        "country",
        "num_rooms",
        "num_bathrooms",
        "square_meters",
        "address",
        "serviceID",
        "visible",
        "latitude",
        "longitude"
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
