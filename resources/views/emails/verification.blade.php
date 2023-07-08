@component('mail::message')
# Greetings, {{ $notifiable->name }}!

Thank you for signing up at {{ config('app.name') }}!
You are only one step away to enjoy all the pleasure at {{ config('app.name') }}. We just need you to activate your account by clicking the **Activate** button below:

@component('mail::button', ['url' => $url])
Activate
@endcomponent

If you did not create an account, no further action is required.
Either way, welcome to the club!

Mucho gracias,
{{ config('app.name') }}

@component('mail::subcopy')
If you are having trouble clicking the button, kindly go to this following URL: {{ $url }}
@endcomponent

@endcomponent