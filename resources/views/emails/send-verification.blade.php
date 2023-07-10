@component('mail::message')
# Warm greetings,
### To the owner of {{ \Str::lower($data['email']) }}!

You are only one step away to complete the verification process, all you need to do is verify your email address by clicking the button below:

@component('mail::button', ['url' => $url])
Verify Now
@endcomponent

If you did not create an account, no further action is required. <br>
Either way, welcome to the club! <br><br>

Sincerely, <br>
{{ config('app.name') }}

@component('mail::subcopy')
In case you are having a bad day, kindly use [this link]({{ $url }}) instead.
@endcomponent
@endcomponent