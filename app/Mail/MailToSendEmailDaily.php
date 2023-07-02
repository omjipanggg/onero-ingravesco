<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailToSendEmailDaily extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Report',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.mail-to-send-email-daily',
        );
    }

    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->subject('Daily reminder to start your day with.')
                    ->markdown('mail.mail-to-send-email-daily')
                    ->with(['user' => $this->user]);
    }
}
