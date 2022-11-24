
<link href="https://fonts.gstatic.com/s/googlesans/v29/4UairENHsxJlGDuGo1OIlL3L2JB80eWHxVA9_Iou-BqGpjmscm43kO8Q5nYksL4vu-A.woff2" rel="stylesheet">
<style>
    body,*{
        font-family: 'Google Sans', sans-serif !important;
    }
    .mail-content{
        color: rgb(26, 26, 26)
    }
</style>

<div class="mail-content">
    <br>
    Hi Admin,

    <br>
    New User <strong>{{ ucfirst($mailData['user']['name']) }}</strong> with mail
    <strong>{{ ucfirst($mailData['user']['email']) }}</strong> has regitered at our website,

    <br>
    Please check your latest users at admin panel <a href="{{ url("admin/user") }}">From Here</a>.

    <br>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>
