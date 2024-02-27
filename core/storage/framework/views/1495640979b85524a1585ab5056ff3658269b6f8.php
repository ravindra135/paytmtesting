<?php $__env->startSection('title'); ?>
    <?php echo e(__('Order Success')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="breadcum_oddk_category ">

    <!-- Page Title-->
<div class="page-title">
    <div class="container">
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
          <li class="separator"></li>
          <li><?php echo e(__('Success')); ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x">
  <div class="card text-center ">
          <div class="card-body padding-top-2x">

          <div class=" box_shoadow_track">
<br/>
<br/>
<div class="text-center" style="color:green" ><i class="fa fa-check-circle" style="font-size:55px"></i></div>
 <br/>
            <h3 class="card-title text-success"><?php echo e(__('Thank you for your order')); ?>!</h3>
            <p class="card-text"><?php echo e(__('Your order has been placed and will be processed as soon as possible.')); ?></p>
            <p class="card-text"><?php echo e(__('Make sure you make note of your order number, which is')); ?> <span class="text-medium"><b><?php echo e($order->orderNumber); ?></b></span></p>
            <p class="card-text"><?php echo e(__('You will be receiving an email shortly with confirmation of your order.')); ?>


            </p>
            <div class=" padding-bottom-1x">

                <a class="btn btn-primary m-4" href="<?php echo e(route('front.catalog')); ?>"><span><i class="icon-package pr-2"></i> <?php echo e(__('View our products again')); ?></span></a>

              </div>
            </div>
          </div>
        </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/front/checkout/success.blade.php ENDPATH**/ ?>