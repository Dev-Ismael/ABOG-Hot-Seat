

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
    Thank you for trusting us, Order is submitted Successfully.
    <br>
    You have Purchased <strong>{{ $mailData['plan']['title'] }}</strong> and with price
    <strong>${{ $mailData['plan']['price'] }}</strong>.

    <br>
    Don't forget submit your case lists to <strong> <a href="mailto:info@ahsboardprep.com">info@ahsboardprep.com</a></strong>

    <br>
    Now you can book your sessions <a href="https://calendar.app.google/fxXSDWqByfJZB7px9">From Here</a>.

    <br>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>

