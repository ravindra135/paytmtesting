<?php
    $user = Auth::user();
?>
<div class="col-lg-4">
    <aside class="user-info-wrapper">
      <div class="user-info">
        <div class="user-avatar">

          <img id="avater_photo_view" src="<?php echo e($user->photo ? asset('assets/images/'.$user->photo) : asset('assets/images/placeholder.png')); ?>" alt="User">
        </div>

        <div class="user-data">
          <h4 class="h5"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h4><span><?php echo e(__('Joined')); ?> <?php echo e($user->created_at->format('M D Y')); ?></span>
        </div>
      </div>
      <nav class="list-group">
        <a class="list-group-item <?php echo e(request()->is('user/dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('user.dashboard')); ?>"><i class="icon-command"></i><?php echo e(__('Dashboard')); ?></a>
        <a class="list-group-item <?php echo e(request()->is('user/profile') ? 'active' : ''); ?>" href="<?php echo e(route('user.profile')); ?>"><i class="icon-user"></i><?php echo e(__('Profile')); ?></a>
        <a class="list-group-item <?php echo e(request()->is('user/ticket') ? 'active' : ''); ?>" href="<?php echo e(route('user.ticket')); ?>"><i class="icon-file-text"></i><?php echo e(__('Support Ticket')); ?></a>
        <a class="list-group-item with-badge <?php echo e(request()->is('user/orders') ? 'active' : ''); ?>" href="<?php echo e(route('user.order.index')); ?>"><i class="icon-shopping-bag"></i><?php echo e(__('Orders')); ?><span class="badge badge-default badge-pill"><?php echo e($user->orders->count()); ?></span></a>
        <a class="list-group-item <?php echo e(request()->is('user/addresses') ? 'active' : ''); ?>" href="<?php echo e(route('user.address')); ?>"><i class="icon-map-pin"></i><?php echo e(__('Address')); ?></a>
        <a class="list-group-item  with-badge <?php echo e(request()->is('user/wishlists') ? 'active' : ''); ?>" href="<?php echo e(route('user.wishlist.index')); ?>"><i class="icon-heart"></i><?php echo e(__('Wishlist')); ?><span class="badge badge-default badge-pill"><?php echo e($user->wishlists->count()); ?></span></a>
        <a class="list-group-item with-badge" href="<?php echo e(route('user.logout')); ?>"><i class="icon-log-out"></i><?php echo e(__('Log out')); ?></a>
      </nav>
    </aside>


  </div>
<?php /**PATH /opt/lampp/htdocs/paytmtesting/core/resources/views/includes/user_sitebar.blade.php ENDPATH**/ ?>