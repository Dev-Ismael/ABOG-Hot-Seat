<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<style>
    body,*{
        font-family: 'Open Sans', sans-serif !important;
    }
    h2 , strong{
        color: rgb(26, 26, 26)
    }
</style>
@component('mail::message')
# {{ $requestData['subject'] }}

<strong>Name :</strong>  {{ $requestData['name'] }} <br>
<strong>Email :</strong>  {{ $requestData['email'] }} <br>
<strong>Messege :</strong>  {{ $requestData['body'] }} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
