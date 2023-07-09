@component('mail::message')
Here is a brief resume of a newly registered user:

@component('mail::table')
| Columns 			| Records 			|
| :---------------- | :---------------- |
| **Full name** 	| {{ \Str::headline($data['name']) }} |
| **Email address** | {{ \Str::lower($data['email']) }} |
| **Registered at** | {{ date('F d, Y H:i:s', strtotime($data['created_at'])) }} |
@endcomponent

That is a wrap, <br>
Thanks a lot
@endcomponent
