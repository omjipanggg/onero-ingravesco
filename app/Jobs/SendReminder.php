<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\SendReminder as SendMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $webmaster = 'maulana.ajie.pamungkas@gmail.com';
    protected $supervisor = 'astagawe@astaga.web.id';

    public function __construct($user)
    {
    	$this->user = $user;
    }

    public function handle(): void
    {
        Mail::to($this->webmaster)->send(new SendMail($this->user));
    }
}
