<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewContact;
use App\Models\Apartment;
use App\Models\ContactRequest;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactRequestController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            "sender_name" => "required|max:255",
            "sender_surname" => "required|max:255",
            "sender_email" => "required|max:255",
            "message_object" => "required|max:255",
            "message_text" => "required|max:255",
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "success" => false,
                    "errors" => $validator->errors(),
                ]
            );
        }

        $message = new Message();
        $message->name_sender = $request->input('sender_name');
        $message->surname_sender = $request->input('sender_surname');
        $message->email_sender = $request->input('sender_email');
        $message->object = $request->input('message_object');
        $message->text = $request->input('message_text');
        $message->apartment_id = $request->input('apartment_id');
        $message->save();

        $apartment = Apartment::find($request->input('apartment_id'));
        $hostEmail = $apartment->user->email;
        $contactEmail = $request->input('sender_email');
        $contactName = $request->input('sender_name');
        $contactSurname = $request->input('sender_surname');
        $object = $request->input('message_object');
        $text = $request->input('message_text');
        $email = [
            'hostEmail' => $hostEmail,
            'contactEmail' => $contactEmail,
            'contactName' => $contactName,
            'contactSurname' => $contactSurname,
            'object' => $object,
            'text' => $text,
        ];

        Mail::to($hostEmail)->send(new NewContact($email));

        return response()->json(
            [
                "success" => true,
                "result" => $message,
            ]
        );
    }
}
