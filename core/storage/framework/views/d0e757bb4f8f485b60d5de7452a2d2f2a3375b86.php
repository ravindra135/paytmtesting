<?php $__env->startSection('title'); ?>
    <?php echo e(__('Orders')); ?>

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
                    <li><?php echo e(__('Orders')); ?></li>
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
<div class="card table_times_s">
            <div class="card-body">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th><?php echo e(__('Order')); ?> #</th>
                <th><?php echo e(__('Total')); ?></th>
                <th><?php echo e(__('Order Status')); ?></th>
                <th><?php echo e(__('Payment Status')); ?></th>
                <th><?php echo e(__('Date Purchased')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody>
             <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
              <td data-label="Order"><a class="navi-link" href="#" data-toggle="modal" data-target="#orderDetails"><?php echo e($order->transaction_number); ?></a></td>
              <td data-label="Total">
                <?php if($setting->currency_direction == 1): ?>
                <?php echo e($order->currency_sign); ?><?php echo e(PriceHelper::OrderTotal($order)); ?>

                <?php else: ?>
                <?php echo e(PriceHelper::OrderTotal($order)); ?><?php echo e($order->currency_sign); ?>

                <?php endif; ?>

              </td>
              <td data-label="Order Status">
                <?php if($order->order_status == 'Pending'): ?>
                <span class="text-info"><?php echo e($order->order_status); ?></span>
                <?php elseif($order->order_status == 'In Progress'): ?>
                <span class="text-warning"><?php echo e($order->order_status); ?></span>
                <?php elseif($order->order_status == 'Delivered'): ?>
                <span class="text-success"> <?php echo e($order->order_status); ?></span>
                 <?php elseif($order->order_status == 'Return'): ?>
                <span class="text-success"> <?php echo e($order->order_status); ?></span>
                <?php else: ?>
                <span class="text-danger"><?php echo e(__('Canceled')); ?></span>
                <?php endif; ?>
              </td>
              <td data-label="Payment Status">
                <?php if($order->payment_status == 'Paid'): ?>
                <span class="text-success"><?php echo e($order->payment_status); ?></span>
                <?php else: ?>
                <span class="text-danger"><?php echo e($order->payment_status); ?></span>
                <?php endif; ?>
              </td>

              <td  data-label="Date" ><?php echo e($order->created_at->format('D/M/Y')); ?></td>
              <td data-label="Action">


<?php if($order->order_status == 'Canceled'): ?>
                 <?php elseif($order->order_status !== 'Delivered'): ?>
                   <a href="<?php echo e(route('user.order.cancel',$order->id)); ?>" class="badge badge-pill badge-primary">Cancel Order</a>


<?php endif; ?>

 <?php if($order->order_status == 'Delivered'): ?>
                   <a href="<?php echo e(route('user.order.return',$order->id)); ?>" class="badge badge-pill badge-success">Return Order</a>

                   <?php endif; ?>

                                      <?php if($order->order_status == 'Delivered' && $order->payment_status == 'Paid'): ?>

                  <a href="<?php echo e(route('user.order.invoice',$order->id)); ?>" class="btn btn-info btn-sm"><?php echo e(__('Invoice')); ?></a>
              <?php endif; ?>
              </td>
            </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
            </div>
        </div>

      </div>
    </div>
 </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/user/order/index.blade.php ENDPATH**/ ?>