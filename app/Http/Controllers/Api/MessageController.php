<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\NewContact;
use App\Models\Message;
use App\Models\Apartment;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request)
    {

        // $data = $request->all();

        // $validator = Validator::make($data, [
        //     "sender_name" => "required|max:255",
        //     "sender_surname" => "required|max:255",
        //     "sender_email" => "required|max:255",
        //     "message_object" => "required|max:255",
        //     "message_text" => "required|max:255",
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(
        //         [
        //             "success" => false,
        //             "errors" => $validator->errors(),
        //         ]
        //     );
        // }

        // $contactRequest = new ContactRequest();

        // $contactRequest->name_sender = $request->input('sender_name');
        // $contactRequest->surname_sender = $request->input('sender_surname');
        // $contactRequest->email_sender = $request->input('sender_email');
        // $contactRequest->object = $request->input('message_object');
        // $contactRequest->text = $request->input('message_text');
        // $contactRequest->apartment_id = $request->input('apartment_id');
        // $contactRequest->save();

        // $apartment = Apartment::find($request->input('apartment_id'));
        // $hostEmail = $apartment->user->email;
        // $contactEmail = $request->input('sender_email');
        // $contactName = $request->input('sender_name');
        // $contactSurname = $request->input('sender_surname');
        // $object = $request->input('message_object');
        // $text = $request->input('message_text');
        // $email = [
        //     'contactEmail' => $contactEmail,
        //     'contactName' => $contactName,
        //     'contactSurname' => $contactSurname,
        //     'object' => $object,
        //     'text' => $text,
        // ];

        // Mail::to($hostEmail)->send(new NewContact($email));

        // return response()->json(
        //     [
        //         "success" => true,
        //         "result" => $contactRequest,
        //     ]
        // );


        $data = $request->all();

        $validator = Validator::make($data, [
            "name_sender" => "max:250",
            "surname_sender" => "max:250",
            "email_sender" => "email|max:250",
            "message_object" => "max:250",
            "message_text" => "max:250",

        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "success" => false,
                    "errors" => $validator->errors(),
                ]
            );
        }

        $data_validated = $validator->validated();

        $newContact = new Message();
        $newContact->fill($data_validated);
        $newContact->save();

        Mail::to('prova@gmail.com')->send(new NewContact($data_validated));
        return response()->json(
            [
                "Success" => true,
                "result" => $newContact,
            ]
        );
    }
}
