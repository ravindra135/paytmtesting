<div class="testimonials-wrap ">
  <div class="container-fluid">
    <div class="heading-section heading_h2">
      <h2>OUR CUSTOMERS SPEAK FOR US </h2>
      <p class="starrating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </p>
      <p>
        <u>From 1249+ Reviews</u>
      </p>
    </div>
    <div class="col-md-8 offset-md-2 main_nav_carous">
      <div class="carousel-testimonial owl-carousel "> <?php $reviews = App\Models\Review::whereStatus(1)->take(10)->get(); ?> <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <div class="item">
          <div class="testimonial-box d-flex">
            <div class="user-img img-thumbnail" ">
                            <a href=" <?php echo e(url('/product')); ?>/<?php echo e($review->item->slug); ?>">
              <img src="<?php echo e($review->item->thumbnail ? asset('assets/images/'.$review->item->thumbnail) : asset('assets/images/placeholder.png')); ?> ">
              </a>
            </div>
            <div class="text pl-4">
              <p class="starrating"> <?php for($i=1;$i<=5;$i++): ?> <?php if($i <=$review->rating): ?> <i class="fa fa-star"></i> <?php else: ?> <i class="far fa-star "></i> <?php endif; ?> <?php endfor; ?> </p>
              <p class="desccc"><?php echo e($review->review); ?></p>
              <p class="name"><?php echo e($review->user->displayName()); ?></p>
            </div>
          </div>
        </div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
    </div>
  </div>
</div><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/front/common/testimonial.blade.php ENDPATH**/ ?>