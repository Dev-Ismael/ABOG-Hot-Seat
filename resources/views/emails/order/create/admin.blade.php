
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
    New order is submitted by <strong>{{ ucfirst($mailData['user']['name']) }}</strong>,
    Purchase <strong>{{ $mailData['plan']['title'] }}</strong> and with price <strong>${{ $mailData['plan']['price'] }}</strong>.

    <br>
    <strong>{{ ucfirst($mailData['user']['name']) }}</strong> has sent money at your <strong>{{ ucfirst($mailData['payment_method']) }}</strong> wallet, so don't forget check this transfer

    <br>
    Please check your latest orders <a href="{{ url("admin/order") }}">From Here</a>.

    <br>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>
