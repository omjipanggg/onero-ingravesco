@component('mail::message')
### Henlo, Webmaster!

This is a brief resume of a newly registered user at {{ config('app.name') }}:

@component('mail::table')
| Columns | Records |
| :--- | :--------- |
| **Name**       | {{ \Str::headline($data['name']) }} |
| **Email**      | {{ \Str::lower($data['email']) }} |
| **Registered** | {{ date('F d, Y', strtotime($data['created_at'])) }} |
| **Verified**   | {{ date('F d, Y', strtotime($data['email_verified_at'])) ?? '**false**' }} |
@endcomponent

Mucho gracias,
<br>
{{ config('app.name') }}
@endcomponent
