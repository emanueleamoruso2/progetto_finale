<?php

namespace App\Mail;

use App\Models\User;
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

    public $user;
    public $description;

    public function __construct(User $user, $description)
    {
        $this->user = $user;
        $this->description = $description;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('infoannounce@noreply.com', 'Progetto Finale'),

            replyTo: [
                new Address($this->user->email, $this->user->name)
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