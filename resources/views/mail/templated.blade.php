{{-- $heading and $body are pre-escaped by MailTemplate::replacePlaceholders(); the body is Markdown. --}}
<x-mail::message>
@if ($heading)
# {!! $heading !!}
@endif

{!! $body !!}
</x-mail::message>
