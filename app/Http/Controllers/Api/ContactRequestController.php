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

        $contactRequest = new ContactRequest();

        $contactRequest->name_sender = $request->input('sender_name');
        $contactRequest->surname_sender = $request->input('sender_surname');
        $contactRequest->email_sender = $request->input('sender_email');
        $contactRequest->object = $request->input('message_object');
        $contactRequest->text = $request->input('message_text');
        $contactRequest->apartment_id = $request->input('apartment_id');
        $contactRequest->save();

        $apartment = Apartment::find($request->input('apartment_id'));
        $hostEmail = $apartment->user->email;
        $contactEmail = $request->input('sender_email');
        $contactName = $request->input('sender_name');
        $contactSurname = $request->input('sender_surname');
        $object = $request->input('message_object');
        $text = $request->input('message_text');
        $email = [
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
                "result" => $contactRequest,
            ]
        );
    }
}
