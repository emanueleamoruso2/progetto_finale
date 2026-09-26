<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class WorkwithUs extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $description;

    public function __construct($name, $email, $description)
    {
        $this->name = $name;
        $this->email = $email;
        $this->description = $description;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('infoannounce@noreply.com', 'Progetto Finale'),
            replyTo: [
                new Address($this->email, $this->name)
            ],
            subject: 'Request to become revisor',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.content',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}