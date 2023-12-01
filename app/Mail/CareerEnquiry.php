<?php

namespace App\Mail;

use App\Models\CareerApplications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class CareerEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    public CareerApplications $career;

    public $attachment;

    /**
     * Create a new message instance.
     */
    public function __construct($career, $attachment = '')
    {
        $this->career = $career;
        $this->attachment = $attachment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Career Enquiry',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.careerform',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->attachment)
        ];
    }
}
