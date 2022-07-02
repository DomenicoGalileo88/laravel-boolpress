@component('mail::message')
# Introduction

Grazie per aver inviato il tuo messaggio

Name: {{$message->full_name}}<br>
Email: {{$message->email}}<br>
Subject: {{$message->subject}}<br>

Il tuo messaggio: <br>
{{$message->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent