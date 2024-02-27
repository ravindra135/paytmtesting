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

    <?php if(in_array('Manage Categories',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#category">
            <i class="fas fa-list-alt"></i>
            <p><?php echo e(__('Manage Categories')); ?></p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="category">
            <ul class="nav nav-collapse">
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.category.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Categories')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.subcategory.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Sub categories')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.childcategory.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Child categories')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.brand.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Brands')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <?php endif; ?>

    <?php if(in_array('Manage Products',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#items">
            <i class="fab fa-product-hunt"></i>
            <p><?php echo e(__('Manage TimesQuartz Products')); ?></p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="items">
            <ul class="nav nav-collapse">
                
                <li>
                    <a class="sub-link" href="<?php echo e(url('admin/item/create')); ?>">
                        <span class="sub-item"><?php echo e(__('Add Product')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.item.index')); ?>">
                        <span class="sub-item"><?php echo e(__('All Products')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.item.stock.out')); ?>">
                        <span class="sub-item"><?php echo e(__('Stock Out Products')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.campaign.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Campaign Offer')); ?></span>
                    </a>
                </li>
                <!--<li>
                    <a class="sub-link" href="<?php echo e(route('back.bulk.product.index')); ?>">
                        <span class="sub-item"><?php echo e(__('CSV Import & Export')); ?></span>
                    </a>
                </li> -->
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.review.index')); ?>">
                      <span class="sub-item"><?php echo e(__('Product Reviews')); ?></span></a>
                </li>
            </ul>
        </div>
    </li>
    <?php endif; ?>

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

    <?php if(in_array('Ecommerce',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#ecommerce">
            <i class="fas fa-newspaper"></i>
            <p>Coupon, Shipping & Other</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="ecommerce">
            <ul class="nav nav-collapse">
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.code.index')); ?>">
                      <span class="sub-item"><?php echo e(__('Set Coupons')); ?></span></a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.shipping.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Shipping')); ?></span>
                    </a>
                </li>
                
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.tax.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Tax')); ?></span>
                    </a>
                </li>
                
             <!-- <li>
                    <a class="sub-link" href="<?php echo e(route('back.state.index')); ?>">
                        <span class="sub-item"><?php echo e(__('State Tax')); ?></span>
                    </a>
                </li><li>
                    <a class="sub-link" href="<?php echo e(route('back.currency.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Currency')); ?></span>
                    </a>
                </li>  <li>
                    <a class="sub-link" href="<?php echo e(route('back.setting.payment')); ?>">
                        <span class="sub-item"><?php echo e(__('Payment Options')); ?></span>
                    </a>
                </li> -->
            </ul>
        </div>
    </li>
    <?php endif; ?>



  

    <?php if(in_array('Manage Site',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#content">
            <i class="fas fa-tasks"></i>
            <p><?php echo e(__('Manage Site')); ?></p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="content">
            <ul class="nav nav-collapse">
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.setting.system')); ?>">
                        <span class="sub-item"><?php echo e(__('General Settings')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.homePage')); ?>">
                        <span class="sub-item"><?php echo e(__('Home Page')); ?></span>
                    </a>
                </li>
                <li>
                    <a  class="sub-link" href="<?php echo e(route('back.slider.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Sliders/Banners')); ?></span>
                    </a>
                </li>


              

                <li>
                    <a class="sub-link" href="<?php echo e(route('back.setting.email')); ?>">
                        <span class="sub-item"><?php echo e(__('Email Settings')); ?></span>
                    </a>
                </li>
               
               
               
                <li>
                    <a class="sub-link" href="<?php echo e(route('admin.sitemap.index')); ?>">
                      <span class="sub-item"><?php echo e(__('Sitemap')); ?></span></a>
                </li>

                <!--
                     <li>
                    <a class="sub-link" href="<?php echo e(route('back.setting.sms')); ?>">
                        <span class="sub-item"><?php echo e(__('SMS Settings')); ?></span>
                    </a>
                </li>
               

                <li>
                    <a class="sub-link" href="<?php echo e(route('back.service.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Services')); ?></span>
                    </a>
                </li>
                

                    <li>
                    <a class="sub-link" href="<?php echo e(route('back.setting.section')); ?>">
                        <span class="sub-item"><?php echo e(__('Visibility')); ?></span>
                    </a>
                </li>
                      <li>
                    <a class="sub-link" href="<?php echo e(route('back.setting.social')); ?>">
                        <span class="sub-item"><?php echo e(__('Social Login')); ?></span>
                    </a>
                </li>
                     <li>
                    <a class="sub-link" href="<?php echo e(route('back.subscribers.announcement')); ?>">
                      <span class="sub-item"><?php echo e(__('Announcement')); ?></span></a>
                </li>
                     <li>
                    <a class="sub-link" href="<?php echo e(route('back.cookie.alert')); ?>">
                      <span class="sub-item"><?php echo e(__('Cookies Alert')); ?></span></a>
                </li>

                     <li>
                    <a class="sub-link" href="<?php echo e(route('back.setting.maintainance')); ?>">
                      <span class="sub-item"><?php echo e(__('Maintenance')); ?></span></a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.language.index')); ?>">
                      <span class="sub-item"><?php echo e(__('Language')); ?></span></a>
                </li> -->
            </ul>
        </div>
    </li>
    <?php endif; ?>


    <?php if(in_array('Manages Tickets',$section)): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('back.ticket.index')); ?>">
            <i class="fas fa-comments"></i>
          <p><?php echo e(__('Manages Tickets')); ?></p></a>
    </li>
    <?php endif; ?>

    



    <?php if(in_array('Manage Faqs Contents',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#faqs">
            <i class="fas fa-question-circle"></i>
            <p><?php echo e(__('Manage Faqs')); ?></p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="faqs">
            <ul class="nav nav-collapse">
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.fcategory.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Categories')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.faq.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Faqs')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <?php endif; ?>



   <!-- <?php if(in_array('Manage Blogs',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#post">
            <i class="fas fa-rss-square"></i>
            <p><?php echo e(__('Manage Blogs')); ?></p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="post">
            <ul class="nav nav-collapse">
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.bcategory.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Categories')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.post.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Blogs')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <?php endif; ?> -->

    <?php if(in_array('Manages Pages',$section)): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('back.page.index')); ?>">
            <i class="fas fa-book"></i>
            <p><?php echo e(__('Manages Pages')); ?></p>
        </a>
    </li>
 <!--<li class="nav-item">
        <a href="<?php echo e(route('back.testimonials.index')); ?>">
            <i class="fas fa-book"></i>
            <p>Manual Reviews</p>
        </a>
    </li> -->

    <?php endif; ?>

    <?php if(in_array('Subscribers List',$section)): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('back.subscribers.index')); ?>">
            <i class="fab fa-telegram-plane"></i>
            <p><?php echo e(__('Subscribers List')); ?></p>
        </a>
    </li>
    <?php endif; ?>

    <?php if(in_array('Manage System User',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#user">
            <i class="far fa-user"></i>
            <p><?php echo e(__('System User')); ?></p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="user">
            <ul class="nav nav-collapse">
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.role.index')); ?>">
                        <span class="sub-item"><?php echo e(__('Role')); ?></span>
                    </a>
                </li>
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.staff.index')); ?>">
                        <span class="sub-item"><?php echo e(__('System User')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <?php endif; ?>

    <?php if(in_array('System Backup',$section)): ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#backup">
            <i class="fas fa-hdd"></i>
            <p><?php echo e(__('System Backup')); ?></p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="backup">
            <ul class="nav nav-collapse">
                
                <li>
                    <a class="sub-link" href="<?php echo e(route('back.database.backup')); ?>">
                        <span class="sub-item"><?php echo e(__('Database Backup')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <?php endif; ?>
    <li class="nav-item">
        <a href="<?php echo e(route('front.cache.clear')); ?>">
            <i class="fas fa-broom"></i>
            <p><?php echo e(__('Cache Clear')); ?></p>
        </a>
    </li>

</ul>
<?php /**PATH /var/www/html/core/resources/views/master/inc/normal.blade.php ENDPATH**/ ?>