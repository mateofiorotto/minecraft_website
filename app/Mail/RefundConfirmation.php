<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class RefundConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $edition;
    public $ticket;

    /**
     * Create a new message instance.
     */
     public function __construct($user, $edition)
    {
        $this->user = $user;
        $this->edition = $edition;
        $this->ticket = '#' . mt_rand(100000000, 999999999);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->ticket . ' - Reembolso procesado - Minecraft',
            from: new Address('reembolsos@minecraft.com', 'Minecraft')
        );
    }

    /**
     * Get the message content definition.
     */
     public function content(): Content
    {
        return new Content(
            view: 'emails.refund-confirmation'
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
