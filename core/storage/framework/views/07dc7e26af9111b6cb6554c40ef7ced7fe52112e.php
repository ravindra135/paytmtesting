 <?php $__env->startSection('title'); ?> <?php echo e($page->title); ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?> <?php echo $__env->make('front.common.page_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Page Title-->
<!-- Page Content-->
<div class="pt-6 pb-1 ">
  <div class="container ">
    <!-- Categories-->
    <div class="row">
      <div class="col-lg-10  offset-md-1 mb-2 mt-4">
        <div class="card">
          <div class="card-body page_id px-4">
            <h1 class="d-block text-center page_heading">
              <b><?php echo e($page->title); ?></b>
            </h1>
            <p class="text-center know">The smarter way to stay connected | Timesquartz
            </p>
            <br />
            <hr />
            <br />
            <br />
            <div class="d-page-content"> <?php echo $page->details; ?> <br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <?php $__env->stopSection(); ?>
<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/front/page.blade.php ENDPATH**/ ?>