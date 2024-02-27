<ul class="nav">

    <li class="nav-item">
        <a href="<?php echo e(route('back.dashboard')); ?>">
            <i class="fas fa-home"></i>
            <p><?php echo e(__('Dashboard')); ?></p>
        </a>
    </li>

    <?php
        if(Auth::guard('admin')->user()->role->section != 'null'){
            $section = json_decode(Auth::guard('admin')->user()->role->section,true);
        }else{
            $section = [];
        }
    ?>

  

  
    <?php if(in_array('Manage Orders',$section)): ?>
    <li class="nav-item <?php echo e(request()->is('orders/*') ? 'submenu' : ''); ?>">
        <a data-toggle="collapse" href="#order">
            <i class="fab fa-first-order"></i>
            <p><?php echo e(__('Manage Orders')); ?> </p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="order">
            <ul class="nav nav-collapse">
                <li class="<?php echo e(!request()->input('type') && request()->is('admin/orders')  ? 'active' : ''); ?>">
                    <a class="sub-link" href="<?php echo e(route('back.order.index')); ?>">
                        <span class="sub-item"><?php echo e(__('All Orders')); ?></span>
                    </a>
                </li>
                <li class="<?php echo e(request()->input('type') == 'Pending' ? 'active' : ''); ?>">
                    <a class="sub-link" href="<?php echo e(route('back.order.index').'?type='.'Pending'); ?>">
                        <span class="sub-item"><?php echo e(__('Pending Orders')); ?></span>
                    </a>
                </li>
                <li class="<?php echo e(request()->input('type') == 'In Progress' ? 'active' : ''); ?>">
                    <a class="sub-link" href="<?php echo e(route('back.order.index').'?type='.'In Progress'); ?>">
                        <span class="sub-item"><?php echo e(__('Progress Orders')); ?></span>
                    </a>
                </li>

                <li class="<?php echo e(request()->input('type') == 'Delivered' ? 'active' : ''); ?>">
                    <a class="sub-link" href="<?php echo e(route('back.order.index').'?type='.'Delivered'); ?>">
                        <span class="sub-item"><?php echo e(__('Delivered Orders')); ?></span>
                    </a>
                </li>
                <li class="<?php echo e(request()->input('type') == 'Canceled' ? 'active' : ''); ?>">
                    <a class="sub-link" href="<?php echo e(route('back.order.index').'?type='.'Canceled'); ?>">
                        <span class="sub-item"><?php echo e(__('Canceled Orders')); ?></span>
                    </a>
                </li>
                  <li class="">
                    <a class="sub-link" href="<?php echo e(route('back.order.cancellation_return')); ?>">
                        <span class="sub-item"><?php echo e(__('User Cancelled/Return')); ?> (<?php echo e(App\Models\UserOrderStatus::where('admin_status','Pending')->get()->count()); ?>)</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <?php endif; ?>

      <?php if(in_array('Customer List',$section)): ?>
      <li class="nav-item">
        <a href="<?php echo e(route('back.user.index')); ?>">
          <i class="fas fa-users"></i>
          <p><?php echo e(__('Customer List')); ?></p></a>
    </li>
    <?php endif; ?>

    <?php if(in_array('Transactions',$section)): ?>
    <li class="nav-item">
        <a  href="<?php echo e(route('back.transaction.index')); ?>">
            <i class="fas fa-random"></i>
          <p>Payments</p>
        </a>
    </li>
    <?php endif; ?>



  

   

</ul>
<?php /**PATH /opt/lampp/htdocs/paytmtesting/core/resources/views/master/inc/normal.blade.php ENDPATH**/ ?>