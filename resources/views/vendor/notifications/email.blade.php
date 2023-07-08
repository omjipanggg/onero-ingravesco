<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
{{--
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Henlo!')
@endif
--}}
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang("Sincerely"),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
<span>In case you are having a bad day, kindly use <a href="{{ $actionUrl }}">this link</a> instead.</span>
{{-- @lang("If you are having trouble clicking the \":actionText\" button, kindly go to this following URL:", ['actionText' => $actionText]) <span style="word-break: break-all;">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span> --}}
</x-slot:subcopy>
@endisset
</x-mail::message>
