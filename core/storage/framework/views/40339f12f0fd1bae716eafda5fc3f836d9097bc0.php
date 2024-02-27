<?php $__env->startSection('title'); ?>
    <?php echo e(__('Dashboard')); ?>

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
                    <li>Cancel Order</li>
                 </ul>
            </div>
        </div>
    </div>
 </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
  <div class="row">
         <?php echo $__env->make('includes.user_sitebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="col-lg-8 dashboard_tab">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <h5 class="mb-0">Cancellation</h5>
                        <a href="<?php echo e(route('user.order.index')); ?>" class="btn btn-primary btn-sm m-0"><span><?php echo e(__('Back')); ?></span></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('user.order.submit_cancel')); ?>" method="post" enctype="multipart/form-data" class="contact-form">
                        <?php echo csrf_field(); ?>
                        <div class="row">

 <input type="hidden" id="order_id" name="order_id" value="<?php echo e($id); ?>">

                            <div class="form-group">
                                        <label for="role_id">Cancellation Reason *</label>
                                        <select required="true" name="reason" id="reason" class="form-control" >
                                           
                                   <option value="Long delivery time">Long delivery time</option>
                                   <option value="Changed my mind">Changed my mind</option>
                                   <option value="Ordered by Mistake">Ordered by mistake</option>
                                   <option value="Product Price too High">Product price too high</option>
                                   <option value="Other Reason">Other Reason</option>
                                        </select>
                                    </div>
                          

                            <div class="col-12 form-group">
                                <label for="inputMessage"><?php echo e(__('Any Message')); ?> </label>
                                <textarea name="notes" class="form-control" rows="3"></textarea>
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

                      

                        <div class="d-flex justify-content-between mt-1">
                            <button class="btn btn-primary btn-sm" type="submit"><span><?php echo e(__('Submit')); ?></span></button>
                        </div>
                    </form>
                </div>
            </div>

          </div>
        </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/user/order/cancel.blade.php ENDPATH**/ ?>