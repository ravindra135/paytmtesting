<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
    <meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <?php
        function renderStarRating($rating, $maxRating = 5)
        {
            $fullStar = "<i class = 'far fa-star filled'></i>";
            $halfStar = "<i class = 'far fa-star-half filled'></i>";
            $emptyStar = "<i class = 'far fa-star'></i>";
            $rating = $rating <= $maxRating ? $rating : $maxRating;

            $fullStarCount = (int) $rating;
            $halfStarCount = ceil($rating) - $fullStarCount;
            $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

            $html = str_repeat($fullStar, $fullStarCount);
            $html .= str_repeat($halfStar, $halfStarCount);
            $html .= str_repeat($emptyStar, $emptyStarCount);
            $html = $html;
            return $html;
        }
    ?>
<?php echo $__env->make('front.common.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <div class="container-fluid">
  <br />
  <div class="col-md-12 text-center">
    <img class="img-responsive img-thumbnail" src="<?php echo e(asset('assets/images/'.$setting->discount_banner)); ?>" alt="TimesQuartz.com">
  </div>
</div> <?php echo $__env->make('front.common.newly_launched', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <div class="col-md-12 text-center">
  <a href="<?php echo e(url('products')); ?>">
    <img class="img-responsive" src="<?php echo e(asset('assets/images/'.$setting->percent_off)); ?>" alt="<?php echo e($setting->title); ?>">
  </a>
</div>
<br /> <?php /* @include('front.common.flash_deal') */ ?> <?php echo $__env->make('front.common.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo $__env->make('front.common.featured', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <br /> <?php echo $__env->make('front.common.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo $__env->make('front.common.crafted_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/timesquartzold/core/resources/views/front/themes/theme3.blade.php ENDPATH**/ ?>