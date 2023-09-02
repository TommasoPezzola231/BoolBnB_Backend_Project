<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    public $publicData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->publicData = $data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            //

        );
    }

    public function build(Request $request)
    {
        $emailData = [
            "name" => $request->input("name_sender"),
            'surname' => $request->input("surname_sender"),
            "email" => $request->input("email_sender"),
            "object" => $request->input("message_object"),
            "message" => $request->input("message_text"),
        ];

        return $this->from($emailData["email"],  $emailData["name"] . ' ' . $emailData["surname"])
            ->subject($emailData["object"])
            ->view("admin.messages.email.newMessage", compact("emailData"));
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'admin.messages.email.newMessage',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
