<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'https://astaga.web.id'">
Verify
</x-mail::button>

Thanks,
<br>
{{ config('app.name') }}
</x-mail::message>
