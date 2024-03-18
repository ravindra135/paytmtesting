

<?php $__env->startSection('content'); ?>
    <center>
        <h1><?php echo e(__('Please do not refresh this page...')); ?></h1>
    </center>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function onScriptLoad() {
            var config = {
                "root": "",
                "flow": "DEFAULT",
                "data": {
                    "orderId": <?php echo json_encode($order_id, 15, 512) ?>,
                    "token": <?php echo json_encode($txn_token, 15, 512) ?>,
                    "tokenType": "TXN_TOKEN",
                    "amount": <?php echo json_encode($order_amount, 15, 512) ?>
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

    <script type="application/javascript" src="<?php echo e($paytm_host); ?>/merchantpgpui/checkoutjs/merchants/<?php echo e($mid); ?>.js" onload="onScriptLoad();" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\clients\vicky\paytmtesting\core\resources\views/front/paytm.blade.php ENDPATH**/ ?>