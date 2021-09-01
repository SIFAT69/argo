@component('mail::message')
# Welcome to {{ config('app.name') }}

Email: {{ $email }}<br>
Password: {{ $password }}<br>

@component('mail::button', ['url' => $url])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
