@component('mail::message')
<div>
    <p>Subject: {{$subject}}</p>
    <p>Error Message: {{ $content }}</p>
</div>
@endcomponent