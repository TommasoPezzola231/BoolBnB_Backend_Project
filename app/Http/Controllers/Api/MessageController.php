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

        $customMessages = [
            'name_sender.required' => 'Il Nome è obbligatorio',
            'name_sender.string' => 'Il Nome deve essere una stringa.',
            'name_sender.max' => 'Il Nome non può superare :max caratteri',

            'surname_sender.required' => 'Il Cognome è obbligatorio.',
            'surname_sender.string' => 'Il Cognome deve essere una stringa',
            'surname_sender.max' => 'Il Cognome non può superare :max caratteri',

            'email_sender.required' => 'Il campo Email è obbligatorio',
            'email_sender.email' => 'Il campo Email deve essere un indirizzo email valido',
            'email_sender.max' => 'Il campo Email non può superare :max caratteri',

            'message_object.required' => 'Il campo Oggetto è obbligatorio',
            'message_object.string' => 'Il campo Oggetto deve essere una stringa',
            'message_object.max' => 'Il campo Oggetto non può superare :max caratteri',

            'message_text.required' => 'Il campo Messaggio è obbligatorio',
            'message_text.string' => 'Il campo Messaggio deve essere una stringa.',
        ];

        $validator->setCustomMessages($customMessages);

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
