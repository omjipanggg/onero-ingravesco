@component('mail::message')
# Greetings,  {{ \Str::headline($data['name']) }}!
<br>
Thank you for signing up! You are only one step away to enjoy all the pleasure at {{ config('app.name') }}. We just need you to activate your account by clicking the button below:

@component('mail::button', ['url' => $url])
Activate
@endcomponent

If you did not create an account, no further action is required.
Either way, welcome to the club!

@component('mail::subcopy')
If you are having a bad day, kindly use [this link]({{ $url }}) instead.
@endcomponent
@endcomponent