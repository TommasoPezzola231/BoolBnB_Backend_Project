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

        $validator = Validator::make($request->all(), [
            'name_sender' => 'required|string|max:50',
            'surname_sender' => 'required|string|max:50',
            'email_sender' => 'required|email|max:255',
            'message_object' => 'required|string|max:70',
            'message_text' => 'required|string',
            'apartment_id' => '',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        $message = new Message();
        $message->name_sender = $request->input('name_sender');
        $message->surname_sender = $request->input('surname_sender');
        $message->email_sender = $request->input('email_sender');
        $message->message_object = $request->input('message_object');
        $message->message_text = $request->input('message_text');
        $message->apartment_id = $request->input('apartment_id');
        $message->save();

        $apartment = Apartment::find($request->input('apartment_id'));
        $hostEmail = $apartment->user->email;
        $contactName = $request->input('name_sender');
        $contactEmail = $request->input('email_sender');
        $messageObject = $request->input('message_object');
        $messageContent = $request->input('message_text');
        $email = [
            'contactEmail' => $contactEmail,
            'contactName' => $contactName,
            'messageContent' => $messageContent,
            'messageObject' => $messageObject
        ];

        Mail::to($hostEmail)->send(new NewContact($email));

        return response()->json([
            'success' => true,
            'message' => 'Message saved successfully',
            'data' => $message
        ]);
    }
}
