@component('mail::message')
# Introduction

{{ __('The body of your message') }}.

@component('mail::button', ['url' => ''])
{{ __('Button Text') }}
@endcomponent

{{ __('Thanks') }},<br>
{{ config('app.name') }}
@endcomponent
