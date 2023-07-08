<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $data;
    protected $url;

    public function __construct($data)
    {
        $this->data = $data;
    }

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

    public function build()
    {
        return $this->subject('VERIFICATION')
            ->markdown('emails.send-verification')
            ->with(['data' => $this->data, 'url' => url()->temporarySignedRoute('verification.verify', now()->addMinutes(config('auth.verification.expire', 60)), ['id' => $this->data->getKey(), 'hash' => sha1($this->data->getEmailForVerification())]
                )
            ]
        );
    }

    protected function temporaryUrl() {
        return url()->temporarySignedRoute('verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)), [
                'id' => $this->data->getKey(),
                'hash' => sha1($this->data->getEmailForVerification())
            ]
        );
    }
}
