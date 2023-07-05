@component('mail::message')
# Henlo, {{ \Str::headline($data['name']) }}!

Thank you for registering with {{ config('app.name') }}! In order to complete your account verification, please verify this email address by clicking the button below:

@component('mail::button', ['url' => 'http://astaga.web.id'])
Verify
@endcomponent

If you did not register for an account, no further action is required.

Much thanks,<br>
{{ config('app.name') }}
@endcomponent
