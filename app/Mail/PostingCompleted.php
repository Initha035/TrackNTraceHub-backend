<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostingCompleted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The posting instance.
     *
     * @var \App\Models\Posting
     */
    public $posting;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Posting $posting
     */
    public function __construct($posting)
    {
        $this->posting = $posting;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Posting Completed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.post-completed',
            with: [
                'posting' => $this->posting,
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
