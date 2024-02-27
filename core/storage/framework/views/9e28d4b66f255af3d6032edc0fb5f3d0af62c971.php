<?php if($extra_settings->is_t3_3_column_banner_first == 1): ?> <div class="bannner-section mt-40 ">
  <div class="container ">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="section-title section-title2 section-title3section-title section-title2 section-title3">
          <h2 class="h3 text-center">All Categories</h2>
        </div>
      </div>
    </div>
    <div class="row gx-3">
      <div class="categories-testimonial owl-carousel main_nav_carous">
        <a href="<?php echo e($banner_first['firsturl1']); ?>" class="genius-banner">
          <img src="<?php echo e(asset('assets/images/'.$banner_first['img1'])); ?>" alt="">
          <div class="inner-content"> <?php if(isset($banner_first['subtitle1'])): ?> <p><?php echo e($banner_first['subtitle1']); ?></p> <?php endif; ?> <?php if(isset($banner_first['title1'])): ?> <h4><?php echo e($banner_first['title1']); ?></h4> <?php endif; ?> </div>
        </a>
        <a href="<?php echo e($banner_first['firsturl2']); ?>" class="genius-banner">
          <img src="<?php echo e(asset('assets/images/'.$banner_first['img2'])); ?>" alt="">
          <div class="inner-content"> <?php if(isset($banner_first['subtitle2'])): ?> <p><?php echo e($banner_first['subtitle2']); ?></p> <?php endif; ?> <?php if(isset($banner_first['title2'])): ?> <h4><?php echo e($banner_first['title2']); ?></h4> <?php endif; ?> </div>
        </a>
        <a href="<?php echo e($banner_first['firsturl3']); ?>" class="genius-banner">
          <img src="<?php echo e(asset('assets/images/'.$banner_first['img3'])); ?>" alt="">
          <div class="inner-content"> <?php if(isset($banner_first['subtitle3'])): ?> <p><?php echo e($banner_first['subtitle3']); ?> </p> <?php endif; ?> <?php if(isset($banner_first['title3'])): ?> <h4><?php echo e($banner_first['title3']); ?></h4> <?php endif; ?> </div>
        </a>
        <a href="<?php echo e($banner_first['firsturl4']); ?>" class="genius-banner">
          <img src="<?php echo e(asset('assets/images/'.$banner_first['img4'])); ?>" alt="">
          <div class="inner-content"> <?php if(isset($banner_first['subtitle4'])): ?> <p><?php echo e($banner_first['subtitle4']); ?> </p> <?php endif; ?> <?php if(isset($banner_first['title4'])): ?> <h4><?php echo e($banner_first['title4']); ?></h4> <?php endif; ?> </div>
        </a>
        <a href="<?php echo e($banner_first['firsturl5']); ?>" class="genius-banner">
          <img src="<?php echo e(asset('assets/images/'.$banner_first['img5'])); ?>" alt="">
          <div class="inner-content"> <?php if(isset($banner_first['subtitle5'])): ?> <p><?php echo e($banner_first['subtitle5']); ?> </p> <?php endif; ?> <?php if(isset($banner_first['title5'])): ?> <h4><?php echo e($banner_first['title5']); ?></h4> <?php endif; ?> </div>
        </a>
        <a href="<?php echo e($banner_first['firsturl6']); ?>" class="genius-banner">
          <img src="<?php echo e(asset('assets/images/'.$banner_first['img6'])); ?>" alt="">
          <div class="inner-content"> <?php if(isset($banner_first['subtitle6'])): ?> <p><?php echo e($banner_first['subtitle6']); ?> </p> <?php endif; ?> <?php if(isset($banner_first['title6'])): ?> <h4><?php echo e($banner_first['title6']); ?></h4> <?php endif; ?> </div>
        </a>
        <a href="<?php echo e($banner_first['firsturl7']); ?>" class="genius-banner">
          <img src="<?php echo e(asset('assets/images/'.$banner_first['img7'])); ?>" alt="">
          <div class="inner-content"> <?php if(isset($banner_first['subtitle7'])): ?> <p><?php echo e($banner_first['subtitle7']); ?> </p> <?php endif; ?> <?php if(isset($banner_first['title7'])): ?> <h4><?php echo e($banner_first['title7']); ?></h4> <?php endif; ?> </div>
        </a>
      </div>
    </div>
  </div>
</div> <?php endif; ?><?php /**PATH /opt/lampp/htdocs/timesquartzold/core/resources/views/front/common/categories.blade.php ENDPATH**/ ?>