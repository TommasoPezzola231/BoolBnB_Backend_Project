<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "sender_name",
        "sender_surname",
        "sender_email",
        "message_object",
        "message_text",
    ];
}
