

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
    Dear {{ ucfirst($mailData['user']['name']) }},

    <br>
    <br>
    Thank you for registration at AHS Hot-Seat.
    <br>
    Now you can go to your <a href="{{ url("profile") }}">profile page</a> to manage your purchased packages

    <br>
    You can get our packages offers <a href="{{ url("/#packages") }}">From Here</a>.

    <br>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>

