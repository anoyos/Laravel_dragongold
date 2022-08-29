@component('mail::message')
# Introduction

<div>
    <p>Subject: {{$subject}}</p>
    <p>Error Message: {{ $content }}</p>
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
