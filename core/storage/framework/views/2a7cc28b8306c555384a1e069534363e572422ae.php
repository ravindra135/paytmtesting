<section class="selected-product-section speacial-product-sec mt-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="section-title section-title2 section-title3section-title section-title2 section-title3">
          <h2 class="h3 text-center">Newly Arrived</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="type_product_view d-none">
        <img src="<?php echo e(asset('assets/images/ajax_loader.gif')); ?>" alt="">
      </div>
      <div class="col-lg-12" id="type_product_view">
        <div class="row"> <?php $__currentLoopData = $products->orderBy('id','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <div class="slider-item col-sm-6 col-xs-6  col-md-3">
            <div class="product-card ">
              <div class="product-thumb"> <?php if(!$item->is_stock()): ?> <div class="product-badge bg-secondary border-default text-body
                                                    "><?php echo e(__('out of stock')); ?></div> <?php endif; ?> <a href="<?php echo e(route('front.product',$item->slug)); ?>">
                  <img class="lazy" src="<?php echo e(asset('assets/images/featuredimage/'.$item->thumbnail)); ?>" alt="<?php echo e($item->name); ?>">
                </a>
                <div class="product-button-group">
                  <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>">
                    <i class="icon-heart"></i>
                  </a> <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
              </div>
              <div class="product-card-inner">
                <div class="product-card-body">
                  <h3 class="product-title">
                    <a href="<?php echo e(route('front.product',$item->slug)); ?>">
                      <div class="hidden-sm-down"> <?php echo e(strlen(strip_tags($item->name)) > 29 ? substr(strip_tags($item->name), 0, 29) : strip_tags($item->name)); ?>

                      </div>
                      <div class="hidden-md-up">
                        <?php echo e(strlen(strip_tags($item->name)) > 25 ? substr(strip_tags($item->name), 0, 25) : strip_tags($item->name)); ?>

                      </div>
                    </a>
                  </h3>
                  

                   <h4 class="product-price"> <?php if($item->previous_price !=0): ?> <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del> <?php endif; ?> <?php if($item->previous_price && $item->previous_price !=0): ?> <span style="color:green"><?php echo e(PriceHelper::DiscountPercentage($item)); ?> off </span> <?php endif; ?> <span class="mrp"> <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?></span>
          </h4>
                  <br />
                </div>
              </div>
            </div>
          </div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
      </div>
      <div class="col-sm-12 text-center">
        <br />
        <div class="p-action-button">
          <a href="<?php echo e(url('products')); ?>" class=" btn-primary2 m-0 a-t-c-mr" id="add_to_cart">View All</a>
        </div>
        <br />
      </div>
    </div>
  </div>
</section><?php /**PATH /opt/lampp/htdocs/paytmtesting/core/resources/views/front/common/newly_launched.blade.php ENDPATH**/ ?>