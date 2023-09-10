<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "user_id",
        "title",
        "slug",
        "principal_image",
        "imageID",
        "description",
        "price",
        "city",
        "country",
        "num_rooms",
        "num_bathrooms",
        "square_meters",
        "address",
        "visible",
        "latitude",
        "longitude",
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class)
            ->withPivot('end_time');
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    protected $appends = [
        'full_path_principal_image',
        // 'full_path_images',
    ];

    public function getFullPathPrincipalImageAttribute()
    {
        $fullPath = null;
        if ($this->principal_image)
            $fullPath = url('storage/' . $this->principal_image);
        return $fullPath;
    }
}
