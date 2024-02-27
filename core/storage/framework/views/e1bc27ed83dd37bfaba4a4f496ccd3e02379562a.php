<?php $__env->startSection('title'); ?>
    <?php echo e(__('Wishlist')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="breadcum_oddk_category ">

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Wishlist')); ?></li>
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
            <div class="card">
<div class="card table_times_s">
            <!-- Wishlist Table-->
            <div class="wishlist-table mb-0">
              <table class="table table-bordered mb-0">

                    <?php if($wishlist_items->count() > 0): ?>
                    <div ><a class="btn btn-sm btn-primary" href="<?php echo e(route('user.wishlist.delete.all')); ?>"><span><?php echo e(__('Clear Wishlist')); ?> <br/></span> </a></div>
                    <?php endif; ?>
                  <thead>
                                <tr>
                                    <th><?php echo e(__('Wishlist Product')); ?> #</th>
                                    
                                    <th>Remove</th>
                                    <th>Add to Cart</th>
                                </tr>
                                </thead>
              
                <tbody>
                <?php if($wishlist_items->count() > 0): ?>
                <?php $__currentLoopData = $wishlist_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td data-label="Product">
                      <div class="product-item"><a class="product-thumb" href="<?php echo e(route('front.product',$product->slug)); ?>"><img src="<?php echo e(asset('assets/images/'.$product->photo)); ?>" alt="Product"></a>
                        <div class="product-info">
                          <h4 class="product-title"><a href="<?php echo e(route('front.product',$product->slug)); ?>"><?php echo e($product->name); ?></a></h4>
                          <div class="text-lg mb-1"><?php echo e(PriceHelper::grandCurrencyPrice($product)); ?></div>
                          <div class="text-sm"><?php echo e(__('Availability')); ?>:
                            <div class="d-inline text-<?php echo e($product->stock == 0 ? 'danger' : 'success'); ?>"><?php echo e($product->stock == 0 ? __('Out of stock') : __('In Stock')); ?></div>
                          </div>
                        </div>

                      </div>
                     
                    </td>
                  
                    <td data-label="Remove" ><a class="remove-from-cart" href="<?php echo e(route('user.wishlist.delete',$product->getWishlistItemId())); ?>" data-toggle="tooltip" title="Remove item"><i class="icon-x"></i></a></td>
                      <td  data-label="Add to Cart">

                         <?php if($product->is_stock()): ?>
                      <a class="product-button btn btn-primary btn-sm add_to_single_cart" href="javascript:;" data-target="<?php echo e($product->id); ?>"><i class="icon-shopping-cart"></i><span><?php echo e(__('To Cart')); ?></span>
                      </a>
                      <?php else: ?>
                      <a class="product-button btn btn-primary btn-sm" href="<?php echo e(route('front.product',$product->slug)); ?>"><i class="icon-arrow-right"></i><span><?php echo e(__('Details')); ?></span></a>
                    <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                    <td colspan="3"><?php echo e(__('No Product Found')); ?></td>
                </tr>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
            <hr class="mb-4">
                </div>
            </div>

          </div>
        </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/user/wishlist/index.blade.php ENDPATH**/ ?>