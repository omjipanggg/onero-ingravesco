<?php

namespace App\Jobs;

use App\Mail\SendVerification as SendMail;
use App\Models\User;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $url;

    public function __construct(User $user, $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    public function handle(): void
    {
        Mail::to($this->user->email)->send(new SendMail($this->user, $this->url));
    }
}
