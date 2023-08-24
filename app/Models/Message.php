<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        "apartment_id",
        "sender_email",
        "message_text",
        "name_sender",
        "sent_at"
    ];

    public function apartments() {
        return $this->belongsTo(Apartment::class);
    }
}
