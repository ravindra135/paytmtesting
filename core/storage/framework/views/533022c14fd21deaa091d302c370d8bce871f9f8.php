<div class="col-md-12">
  <div class="marginooooo">
    <div class="hero-area3">
      <div class="heroarea-slider owl-carousel"> 
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <a href="<?php echo e($slider->link); ?>">
        <?php if($agent->isMobile()): ?> 
        <div class="test">
        <img src="<?php echo e(asset('assets/images/' . $slider->logo)); ?>">
      </div>
        <?php else: ?>
         <div class="item" style="background: url('<?php echo e(asset('assets/images/' . $slider->photo)); ?>')">
           
         </div>
          <?php endif; ?> 
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </div>
    </div>
  </div>
</div><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/front/common/slider.blade.php ENDPATH**/ ?>