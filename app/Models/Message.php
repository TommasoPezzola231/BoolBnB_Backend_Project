<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        "apartment_id",
        "name_sender",
        "surname_sender",
        "email_sender",
        "message_object",
        "message_text",
        "sent_at"
    ];

    public function apartments()
    {
        return $this->belongsTo(Apartment::class);
    }
}
