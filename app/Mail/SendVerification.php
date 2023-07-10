<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class SendVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $data;
    protected $url;

    public function __construct($data, $url)
    {
        $this->data = $data;
        $this->url = $url;
    }

    /*
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'VERIFICATION',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.send-verification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
    */

    public function build()
    {
        return $this->subject('VERIFICATION')
            ->markdown('emails.send-verification')
            ->with([
                'data' => $this->data,
                'url' => $this->url
            ]
        );
    }
}
