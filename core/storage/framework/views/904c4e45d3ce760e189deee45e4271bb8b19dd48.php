<?php $__env->startSection('title'); ?>
    <?php echo e(__('Change Reset')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Page Title-->
<div class="breadcum_oddk_category ">

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Change Reset')); ?></li>
                  </ul>
            </div>
        </div>
    </div>
  </div>

</div>

   <div class="container padding-bottom-3x mb-1">
  <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <form class="card mt-4" method="POST" action="<?php echo e(route('user.change.password')); ?>">
                <?php echo csrf_field(); ?>
               <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="card-body login_form">
                <div class="form-group">
                <h4 class="d-block mb-4"><?php echo e(__('Change your password?')); ?></h4>
                  <label for="email-for-pass">Enter Password</label>

               <input id="new_password" name="new_password" type="password" class="form-control input-border-bottom" placeholder="<?php echo e(__('Change Your Password')); ?>">

              <input type="hidden" name="file_token" value="<?php echo e($token); ?>">


                </div>
                 <div class="form-group">
                  <label for="email-for-pass">Retype Password</label>


                            <input id="renew_password" name="renew_password" type="password" class="form-control input-border-bottom" placeholder="<?php echo e(__('Retype Your Password')); ?>" >


                </div>
                <button class="btn btn-primary btn-sm" type="submit"><span>Submit</span></button>
                <a href="<?php echo e(route('user.login')); ?>" class="btn btn-primary btn-sm" ><span><?php echo e(__('Login')); ?></span></a>
              </div>
            </form>
          </div>
        </div>
  </div>

        


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/user/auth/changepass.blade.php ENDPATH**/ ?>