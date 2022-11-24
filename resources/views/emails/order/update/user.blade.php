

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
    we hope you are doing well


    <br>
    <!----- Order Expired ------->
    @if ( $mailData['order']['status'] == '2' )

        We want to inform you that Your <strong> {{ $mailData['order']['plan']['title'] }} </strong> has been expired,
        You can purchase new packages <a href="{{ url("/#packages") }}">From Here</a>.

    <!----- Payment Issue ----->
    @elseif ( $mailData['order']['status'] == '3' )

        We want to inform that there's <strong> Payment issue </strong> at purchase <strong> {{ $mailData['order']['plan']['title'] }} </strong>,
        you choosed <strong> {{ $mailData['order']['payment_method'] }} </strong> as your payment method but there's problem at sending money

        <br>
        Please scan QR Code and send again

        @if ( $mailData['order']['payment_method'] == 'zelle' )
            <img src="{{ asset("front/images/zelle-qr-code.jpg") }}" width="300" alt="payment-method">
        @elseif ( $mailData['order']['payment_method'] == 'venmo' )
            <img src="{{ asset("front/images/venmo-qr-code.jpg") }}" width="300" alt="payment-method">
        @endif


    @endif


    <br>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>

