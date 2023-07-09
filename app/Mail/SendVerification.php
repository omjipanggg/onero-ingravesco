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

    public function __construct($data)
    {
        $this->data = $data;
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
        URL::forceRootUrl(config('app.url', 'astaga.web.id'));

        $url = URL::temporarySignedRoute('verification.verify', now()->addMinutes(60), ['id' => $this->data->getKey(), 'hash' => sha1($this->data->getEmailForVerification())], false);

        return $this->subject('VERIFICATION')
            ->markdown('emails.send-verification')
            ->with([
                'data' => $this->data,
                'url' => $url
            ]
        );
    }
}
