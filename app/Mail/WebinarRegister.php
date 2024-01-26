<?php

namespace App\Mail;

use App\Models\Webinars;
use App\Models\WebinarBookings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class WebinarRegister extends Mailable
{
    use Queueable, SerializesModels;

    public Webinars $webinar;
    public WebinarBookings $bookings;
    /**
     * Create a new message instance.
     */
    public function __construct($webinar, $bookings)
    {
        $this->webinar = $webinar;
        $this->bookings = $bookings;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Webinar Registration',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.webinar_register',
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
