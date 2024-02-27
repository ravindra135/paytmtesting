<?php $__env->startSection('title'); ?>
    <?php echo e(__('Regsiter')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="breadcum_oddk_category ">

    <!-- Page Title-->
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator"></li>
                <li><?php echo e(__('Login/Register')); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-2x mb-1">
  <div class="row">

          <div class="col-md-6 offset-md-3">
            <div class="card register-area">
                <div class="card-body login_form">
                    <h4 class="margin-bottom-1x "><?php echo e(__('Register')); ?> </h4>
            <form class="row" action="<?php echo e(route('user.register.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
             
              <div class="col-sm-12">
                <div class="form-group">
                  <input required class="form-control" type="email" name="email" placeholder="<?php echo e(__('E-mail Address')); ?>" id="reg-email" value="<?php echo e(old('email')); ?>">
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="text-danger"><?php echo e($message); ?></p>
                  <?php endif; ?>
                </div>
              </div> 
                <?php if($setting->recaptcha == 1): ?>
              <div class="col-lg-12 mb-4">
                  <?php echo NoCaptcha::renderJs(); ?>

                  <?php echo NoCaptcha::display(); ?>

                  <?php if($errors->has('g-recaptcha-response')): ?>
                  <?php
                      $errmsg = $errors->first('g-recaptcha-response');
                  ?>
                  <p class="text-danger mb-0"><?php echo e(__("$errmsg")); ?></p>
                  <?php endif; ?>
              </div>
              <?php endif; ?>
              <div class="col-12">
                <button class="btn btn-primary margin-bottom-none" type="submit"><span><?php echo e(__('Register')); ?></span></button>

                <a href="<?php echo e(route('user.login')); ?>" class="btn btn-info" ><span><i class="fa fa-lock"></i> <?php echo e(__('Login')); ?></span></a>
              </div>
            </form>
                </div>
            </div>
          </div>
        </div>
  </div>
  <!-- Site Footer-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/user/auth/register.blade.php ENDPATH**/ ?>