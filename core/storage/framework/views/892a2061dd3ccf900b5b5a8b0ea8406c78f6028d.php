<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
<meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <?php echo $__env->make('front.common.page_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page Title-->
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator"></li>
                <li><?php echo e(__('Contact Us')); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-1x mt-60 contact-page">


    <div class="row">
      <div class="col-lg-4 col-md-5 col-sm-5 order-lg-1 order-md-2 order-sm-2">

        <!-- Widget Contacts-->
        <section class="widget widget-featured-posts card rounded p-4 ">
          <h3 class="widget-title "><?php echo e(__('Working Days')); ?></h3>
          

          <ul class="list-unstyled text-sm">
                        <li><span class="text-muted">Our experts are happy to help anytime on</li>

            <li><span class="text-muted"><b><?php echo e(__('Mon-Sat')); ?>:</b> </span><?php echo e($setting->friday_start); ?> - <?php echo e($setting->friday_end); ?></li>
                        <li><span class="text-muted"><b>Sunday:</b> </span>Closed</li>

          </ul>
          
        </section>
        <!-- Widget Address-->
        <section class="widget widget-featured-posts card rounded p-4">
          <h3 class="widget-title ">Location</h3>
          <ul class="list-icon ">
            <li> <i class="icon-map-pin text-muted"></i><?php echo e($setting->footer_address); ?></li>

            <li><i class="icon-phone text-muted"></i>  Toll Free: <a class="underline" href="tel:<?php echo e($setting->footer_phone); ?>"><?php echo e($setting->footer_phone); ?></a>
              </li>
              <li> <i class="icon-phone text-muted"></i> Support Number: <a class="underline" href="tel:<?php echo e($setting->support_phone); ?>"><?php echo e($setting->support_phone); ?></a>
              </li>
              <li><i class="icon-mail text-muted"></i> Email: <a class="underline" href="mailto:<?php echo e($setting->footer_email); ?>"><?php echo e($setting->footer_email); ?></a>
              </li>
 <li><i class="fab fa-whatsapp text-muted"></i> <a target="_blank" class="underline" href="https://api.whatsapp.com/send?phone=%20<?php echo e($setting->support_phone); ?>&text=Hi,%20Timesquartz%20Team,%20I%20want%20to%20contact%20you%20for%20">Chat on Whatsapp</a>
              </li>

          </ul>

         <h5>Connect With Us !</h5>
            <div class="footer-social-links">
              <a class="facebook" href="https://www.facebook.com/timesquartz">
                <span>
                  <i class="fab fa-facebook-f"></i>
                </span>
              </a>
              <a class="twitter" href="https://twitter.com/timesquartz">
                <span>
                  <i class="fab fa-twitter"></i>
                </span>
              </a>
              <a class="instagram" href="https://www.instagram.com/timesquartz/">
                <span>
                  <i class="fab fa-instagram"></i>
                </span>
              </a>
              <a class="linkedin-in" href="">
                <span>
                  <i class="fab fa-linkedin-in"></i>
                </span>
              </a>
            </div>
        </section>
      </div>

      <div class="col-lg-8 col-md-7 col-sm-7 order-lg-2 order-md-1 order-sm-1">
        <div class="contact-form-box card">

            <h2 class="h4"><?php echo e(__('Send Us Your Queries :')); ?></h2>
            <form class="row mt-2" method="Post" action="<?php echo e(route('front.contact.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first-name"><?php echo e(__('First Name')); ?></label>
                    <input class="form-control form-control-rounded" name="first_name" type="text" id="first-name" placeholder="<?php echo e(__('First Name')); ?>" >
                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="last-name"><?php echo e(__('Last Name')); ?></label>
                    <input class="form-control form-control-rounded" name="last_name" type="text" id="last-name" placeholder="<?php echo e(__('Last Name')); ?>" >
                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact-email"><?php echo e(__('E-mail')); ?></label>
                    <input class="form-control form-control-rounded" type="email" name="email" id="contact-email" placeholder="<?php echo e(__('E-mail')); ?>" >
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact-tel"><?php echo e(__('Phone')); ?></label>
                    <input class="form-control form-control-rounded" type="text" name="phone" id="contact-tel" placeholder="<?php echo e(__('Phone')); ?>" >
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                <div class="col-12  ">
                  <div class="form-group">
                    <label for="message-text"><?php echo e(__('Message')); ?></label>
                    <textarea class="form-control form-control-rounded" rows="5" name="message" id="message-text" placeholder="<?php echo e(__('Write your message here...')); ?>"></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <?php if($setting->recaptcha == 1): ?>
                <div class="col-lg-12 mb-2">
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


                <div class="col-12 text-right">
                    <!-- Show toastr after succesfull submit -->
                  <button class="btn btn-primary" type="submit"><span><?php echo e(__('Send message')); ?></span></button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/front/contact.blade.php ENDPATH**/ ?>