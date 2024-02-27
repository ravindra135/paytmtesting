<?php $__env->startSection('title'); ?>
    <?php echo e(__('Shipping')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="breadcum_oddk_category ">

<div class="page-title">
    <div class="container">
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
          <li class="separator"></li>
          <li><?php echo e(__('Shipping address')); ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1  checkut-page">
    <div class="row">
      <!-- Shipping Adress-->
      <div class="col-xl-9 col-lg-8">
        <div class="steps flex-sm-nowrap mb-5"><a class="step" href="<?php echo e(route('front.checkout.billing')); ?>">
          <h4 class="step-title">1. <?php echo e(__('Billing Address')); ?>:</h4>
          </a><a class="step active" href="<?php echo e(route('front.checkout.shipping')); ?>">
          <h4 class="step-title">2. <?php echo e(__('Shipping Address')); ?>:</h4>
          </a><a class="step" href="<?php echo e(route('front.checkout.payment')); ?>">
          <h4 class="step-title">3. <?php echo e(__('Review and pay')); ?></h4>
          </a>
        </div>
        <div class="card">
            <div class="card-body">
                <h6><?php echo e(__('Shipping Address')); ?></h6>

          <form id="checkoutShipping" action="<?php echo e(route('front.checkout.shipping.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-fn"><?php echo e(__('First Name')); ?></label>
              <input class="form-control" name="ship_first_name" type="text" id="checkout-fn" value="<?php echo e(isset($user) ? $user->first_name : ''); ?>" >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-ln"><?php echo e(__('Last Name')); ?></label>
              <input class="form-control" name="ship_last_name" type="text" id="checkout-ln" value="<?php echo e(isset($user) ? $user->last_name : ''); ?>" >
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-email"><?php echo e(__('E-mail Address')); ?></label>
              <input class="form-control" name="ship_email" type="email" id="checkout-email" value="<?php echo e(isset($user) ? $user->email : ''); ?>" >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-phone"><?php echo e(__('Phone Number')); ?></label>
              <input class="form-control" name="ship_phone" type="phone" id="checkout-phone" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits phone number" required value="<?php echo e(isset($user) ? $user->phone : ''); ?>" >
            </div>
          </div>
        </div>
     
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-address1"><?php echo e(__('Address')); ?> 1</label>
              <input class="form-control" name="ship_address1" required type="text" id="checkout-address1" value="<?php echo e(isset($user) ? $user->ship_address1 : ''); ?>" >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-address2"><?php echo e(__('Address')); ?> 2/Locality</label>
              <input class="form-control" name="ship_address2" type="text" id="checkout-address2" value="<?php echo e(isset($user) ? $user->ship_address2 : ''); ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-zip"><?php echo e(__('Zip Code')); ?></label>
              <input class="form-control" name="ship_zip" required type="phone" id="checkout-zip"  maxlength="6" pattern="\d{06}" title="Please enter exactly 6 digits PIN Code" required value="<?php echo e(isset($user) ? $user->ship_zip : ''); ?>" >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-city"><?php echo e(__('City')); ?></label>
              <input class="form-control" name="ship_city" required type="text" id="checkout-city" value="<?php echo e(isset($user) ? $user->ship_city : ''); ?>" >
            </div>
          </div>
        </div>
      


        <div class="d-flex justify-content-between paddin-top-1x mt-4">
            <a class="btn btn-primary btn-sm" href="<?php echo e(route('front.cart')); ?>"><span class="hidden-xs-down"><i class="icon-arrow-left"></i> <?php echo e(__('Back To Cart')); ?></span>
            </a><button class="btn btn-primary  btn-sm" type="submit"><span class="hidden-xs-down"><?php echo e(__('Continue')); ?></span><i class="icon-arrow-right"></i></button></div>
        </form>
            </div>
        </div>
      </div>
      <!-- Sidebar          -->
      <?php echo $__env->make('includes.checkout_sitebar',$cart, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/front/checkout/shipping.blade.php ENDPATH**/ ?>