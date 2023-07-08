@component('mail::message')
### Henlo, Webmaster!

This is a brief resume of a newly registered user at {{ config('app.name') }}:

@component('mail::table')
| **Name**       | {{ \Str::headline($data['name']) }} |
| :------------- | :---------------------------------- |
| **Email**      | {{ \Str::lower($data['email']) }} |
| **Verified**   | {{ date('F d, Y', strtotime($data['email_verified_at'])) ?? '**false**' }} |
| **Registered** | {{ date('F d, Y', strtotime($data['created_at'])) }} |
@endcomponent

Mucho gracias,
<br>
{{ config('app.name') }}
@endcomponent
