<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $problem;
    public $description;

    public function __construct($user, $problem, $description)
    {
        $this->user = $user;
        $this->problem = $problem;
        $this->description = $description;
    }

    /**
     * Funcion que define quien lo envia el mail y su titulo.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Respuesta a tu solicitud de contacto - Minecraft',
            from: new Address('contact@minecraft.com', 'Minecraft'),
        );
    }

    /**
     * Contenido del mail.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.response-mail',
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
