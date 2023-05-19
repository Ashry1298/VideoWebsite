<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReplyContact extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reply Contact',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $contact=$this->message;
        return new Content(
            view: 'back-end.reply-mail',
            with:[
                'name'=>$contact->name,
                'reply'=>$contact->reply,
            ],
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
