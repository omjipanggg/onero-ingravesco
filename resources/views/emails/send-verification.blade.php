@component('mail::message')
# Warm greetings,
### To the owner of {{ \Str::lower($data['email']) }}!

Thank you for signing up! <br>
You are only one step away to enjoy all the pleasure at {{ config('app.name') }}, all you need to do is activate your account by clicking the button below:

@component('mail::button', ['url' => $url])
Activate
@endcomponent

If you did not create an account, no further action is required. <br>
Either way, welcome to the club!

@component('mail::subcopy')
If you are having a bad day, kindly use [this link]({{ $url }}) instead.
@endcomponent
@endcomponent