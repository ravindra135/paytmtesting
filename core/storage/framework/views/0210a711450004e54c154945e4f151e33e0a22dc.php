 <?php $__env->startSection('title'); ?> Our Brands
 <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?> 
<?php echo $__env->make('front.common.page_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Page Title-->
<br />
<!-- Page Content-->
<div class="pt-6 pb-1 ">
  <div class="container-fluid ">
    <!-- Categories-->
    <h2 class="d-block text-center page_heading">
      <br />
      <div class="buy_Fromm">Our Brands <br />
      </div>
    </h2>
    <div class="col-md-8 offset-md-2">
       
        
         <div class=" pt-0 pb-5">
    <div class="row g-3">
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4 col-6">
                <a class="b-p-s-b" href="<?php echo e($brand->url); ?>">
                    <img class="img-thumbnail"
                        src="<?php echo e(asset('assets/images/' . $brand->photo)); ?>"
                        alt="<?php echo e($brand->name); ?>" title="<?php echo e($brand->name); ?>">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
    </div>
    <br />
  </div> <?php $__env->stopSection(); ?>
<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/front/brand.blade.php ENDPATH**/ ?>