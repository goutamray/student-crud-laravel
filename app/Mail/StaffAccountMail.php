<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StaffAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $cell;
    public $photo;

    /**
     * Create a new message instance.
     */
    public function __construct( $data )
    {
        $this -> name = $data["name"];
        $this -> email = $data["email"];
        $this -> cell = $data["cell"];
        $this -> photo = $data["photo"];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Staff Account Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.staff',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'cell' => $this->cell,
                'photo' => $this->photo,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
