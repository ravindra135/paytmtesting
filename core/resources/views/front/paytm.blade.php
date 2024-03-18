@extends('master.front')

@section('content')
    <center>
        <h1>{{ __('Please do not refresh this page...') }}</h1>
    </center>

    {{-- Old Code Commented Out --}}
    {{-- <form method="post" action="{{ $paytm_txn_url }}" name="f1">
        {{ csrf_field() }}
        <table border="1">
            <tbody>
                <?php
                // foreach ($paramList as $name => $value) {
                //     echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
                // }
                ?>
                <input type="hidden" name="CHECKSUMHASH" value="<?php // echo $checkSum;
                ?>">
            </tbody>
        </table>

    </form> --}}
@endsection

@section('script')
    <script>
        function onScriptLoad() {
            var config = {
                "root": "",
                "flow": "DEFAULT",
                "data": {
                    "orderId": @json($order_id),
                    "token": @json($txn_token),
                    "tokenType": "TXN_TOKEN",
                    "amount": @json($order_amount)
                },
                "handler": {
                    "notifyMerchant": function(eventName, data) {
                        console.log("notifyMerchant handler function called");
                        console.log("eventName => ", eventName);
                        console.log("data => ", data);
                    }
                }
            };
            if (window.Paytm && window.Paytm.CheckoutJS) {
                window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                    // initialze configuration using init method
                    window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                        // after successfully updating configuration, invoke JS Checkout
                        window.Paytm.CheckoutJS.invoke();
                    }).catch(function onError(error) {
                        console.log("error => ", error);
                    });
                });
            }
        }
    </script>

    <script type="application/javascript" src="{{ $paytm_host }}/merchantpgpui/checkoutjs/merchants/{{ $mid }}.js" onload="onScriptLoad();" crossorigin="anonymous"></script>
@endsection
