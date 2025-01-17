<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="<?php echo e($notify_url); ?>" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
// Checkout details as a json
var options = <?php echo $json; ?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
      window.location.assign("<?php echo e(url()->previous()); ?>");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

//document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
   // e.preventDefault();
//}


</script>
<?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/front/razorpay-checkout.blade.php ENDPATH**/ ?>