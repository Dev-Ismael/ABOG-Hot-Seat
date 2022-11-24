<link href="https://fonts.gstatic.com/s/googlesans/v29/4UairENHsxJlGDuGo1OIlL3L2JB80eWHxVA9_Iou-BqGpjmscm43kO8Q5nYksL4vu-A.woff2" rel="stylesheet">
<style>
    body,*{
        font-family: 'Google Sans', sans-serif !important;
    }
    h2 , strong{
        color: rgb(26, 26, 26)
    }
</style>
@component('mail::message')
# {{ $requestData['subject'] }}

<strong>Name :</strong>  {{ $requestData['name'] }} <br>
<strong>Phone :</strong>  {{ $requestData['phone'] }} <br>
<strong>Email :</strong>  {{ $requestData['email'] }} <br>
<strong>Subject :</strong>  {{ $requestData['subject'] }} <br>
<strong>Messege :</strong>  {{ $requestData['body'] }} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
