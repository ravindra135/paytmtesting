<?php $__env->startSection('content'); ?>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src=" <?php echo e(asset('assets/images/times-quartz-admin.png')); ?>" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="<?php echo e(route('back.login.submit')); ?>" method="POST">

                         <?php echo csrf_field(); ?>
<h4 class="text-center"><b>TimesQuartz</b></h4>
<h5 class="text-center"> Admin Panel</h5>

<br/>
                        <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>

                          <input id="username" name="login_email" type="email" class="form-control input_user" value="<?php echo e(old('login_email')); ?>"  placeholder="Enter Email Address">

                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

                         <input id="password" name="login_password" type="password" class="form-control input_pass" placeholder="Password">

                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center mt-3 login_container">

                                                <button type="submit" class="btn btn-secondary  btn-login"><?php echo e(__('Sign In')); ?></button>

                   </div>
                    </form>
                </div>
        
               
            </div>
        </div>
    </div>
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/back/auth/login.blade.php ENDPATH**/ ?>