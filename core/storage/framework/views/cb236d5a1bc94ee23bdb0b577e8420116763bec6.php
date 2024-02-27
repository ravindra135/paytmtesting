   <!DOCTYPE html>
   <html lang="en">
     <head>
       <meta charset="utf-8"> <?php if(url()->current() == route('front.index')): ?> <title><?php echo $__env->yieldContent('hometitle'); ?></title> <?php else: ?> <title><?php echo $__env->yieldContent('title'); ?>-<?php echo e($setting->title); ?></title> <?php endif; ?>

       <meta name="theme-color" content="#dd0202" />
<META NAME="robots" CONTENT="noindex,nofollow">

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

       <!-- SEO Meta Tags--> <?php echo $__env->yieldContent('meta'); ?>
       <meta name="author" content="<?php echo e($setting->title); ?>">
       <meta name="distribution" content="web">
       <!-- Mobile Specific Meta Tag-->
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
       <!-- Favicon Icons-->
       <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/'.$setting->favicon)); ?>">
       <link rel="stylesheet" media="screen" href="<?php echo e(asset('assets/front/css/plugins.min.css')); ?>">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

        <?php echo $__env->yieldContent('styleplugins'); ?>
       <link id="mainStyles" rel="stylesheet" media="screen" href="<?php echo e(asset('assets/front/css/styles.min.css')); ?>">
       <!-- Color css -->
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.6.3/css/ionicons.min.css">
       <?php echo e($setting->custom_css); ?>

       <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,200;1,400&display=swap" rel="stylesheet">
       <script src="<?php echo e(asset('assets/front/js/modernizr.min.js')); ?>"></script>

       <!-- Modernizr-->
     </head>
     <!-- Body-->
     <body class="">
       <!-- Header-->
       <header class="header header_other navbar-fixed-top">
        

          <div class="menu-top-area">
           <div class="container">
             <div class="row">
               <div class="col-md-12">
                <div class="top-bar-carousel owl-carousel ">
                 <div class="header_p text-center">
                   <p> Free Shipping on All Order Above <i class="fa fa-rupee-sign"></i> 2000 </p>
                 </div>
                  <div class="header_p text-center">
                   <p> Get 10% Off on Selected Watches - TIMES10 </p>
                 </div>
               </div>
               </div>
             </div>
           </div>
         </div>

         
         <div class="container">
           <div class="wrapper">
             <div class="header-item-left">
               <a href="<?php echo e(route('front.index')); ?>" class="brand">
                 <img src="<?php echo e(asset('assets/images/'.$setting->logo)); ?>" alt="<?php echo e($setting->title); ?>">
               </a>
             </div>
             <!-- Section: Navbar Menu -->
           </div>
         </div>
         <div class="container pt-1 menu_icon_header">
           <div class="wrapper">
             <!-- Section: Navbar Menu -->
             <div class="header-item-center">
               <div class="overlay"></div>
               <nav class="menu">
                 <div class="menu-mobile-header">
                   <button type="button" class="menu-mobile-arrow">
                     <i class="ion ion-ios-arrow-back"></i>
                   </button>
                   <div class="menu-mobile-title"></div>
                   <button type="button" class="menu-mobile-close">
                     <i class="ion ion-ios-close"></i>
                   </button>
                 </div>
                 <ul class="menu-section">
                   <li>
                     <a href="<?php echo e(url('/')); ?>">Home</a>
                   </li>
                   <li class="menu-item-has-children">
                     <a href="#">Shop <i class="ion ion-ios-arrow-down"></i>
                     </a>
                     <div class="menu-subs menu-mega menu-column-4 ScrollStyle"> <?php $categories = App\Models\Category::with('subcategory')->whereStatus(1)->orderby('serial','asc')->take(8)->get(); ?> <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <div class="list-item text-center">
                         <a href="<?php echo e(route('front.catalog').'?category='.$pcategory->slug); ?>">
                           <img src="<?php echo e(asset('assets/images/'.$pcategory->photo)); ?>" class="responsive" alt="New Product">
                           <h4 class="title"><?php echo e($pcategory->name); ?></h4>
                         </a>
                       </div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
                   </li>
                   <!-- <li class="menu-item-has-children"><a href="#">Products <i class="ion ion-ios-arrow-down"></i></a><div class="menu-subs menu-mega menu-column-4"><div class="list-item"><h4 class="title">Men's Fashion</h4><ul><li><a href="#">Product List</a></li><li><a href="#">Product List</a></li><li><a href="#">Product List</a></li><li><a href="#">Product List</a></li></ul><h4 class="title">Kid's Fashion</h4><ul><li><a href="#">Product List</a></li><li><a href="#">Product List</a></li><li><a href="#">Product List</a></li><li><a href="#">Product List</a></li></ul></div><div class="list-item"><img src="https://source.unsplash.com/dWyXjbac4tc/361x467" class="responsive" alt="Shop Product"></div></div></li> -->
                   <li>
                     <a href="<?php echo e(url('times-quartz/special-offer')); ?>">Special Offers</a>
                   </li>
                   <li>
                     <a target="_blank" href="https://timesquartz.shiprocket.co">Track Your Order</a>
                   </li>
                   <li>
                     <a href="<?php echo e(url('contact')); ?>">Support</a>
                   </li>
 <?php if(Auth::user()): ?>
                   <li class="hidden-md-up">
                  
                  <a href="<?php echo e(route('user.dashboard')); ?>"><i class="icon-user"></i> My Account</a>

                   </li>

                   <?php else: ?>
<li class="hidden-md-up">
   <a href="<?php echo e(url('login')); ?>"><i class="fa fa-lock"></i> Login</a>
                      </li>

                   <?php endif; ?>


                   <li>
                     <div class="header-item-right hidden-md-down">
                       <!-- homepage icon menu -->
                       <a href="#" title="Search Products" class="menu-icon search_o">
                         <i class="icon-search"></i>
                       </a> <?php if(!Auth::user()): ?> <a title="Account" href="<?php echo e(route('user.login')); ?>" class="menu-icon menu-icon">
                         <i class="icon-user"></i>
                       </a>
                       <a title="Wishlist" href="<?php echo e(route('user.wishlist.index')); ?>" class="menu-icon  menu-icon">
                         <i class="icon-heart"></i>
                       </a> <?php else: ?> <a title="Customer Dashboard" href="<?php echo e(route('user.dashboard')); ?>" class="menu-icon  menu-icon">
                         <i class="icon-user"></i>
                       </a>
                       <a title="Wishlist" href="<?php echo e(route('user.wishlist.index')); ?>" class="menu-icon menu-icon">
                         <i class="icon-heart"></i>
                         <span class="count-label cart_count wishlist_count">
                          <?php echo e(Auth::user()->wishlists->count()); ?></span>
                       </a> <?php endif; ?> <a title="Your Cart" href="<?php echo e(route('front.cart')); ?>" class="menu-icon menu-icon">
                         <i class="icon-shopping-cart"></i>
                         <span class="count-label cart_count cart_count">
                         <?php echo e(Session::has('cart') ? count(Session::get('cart')) : '0'); ?></span>
                       </a>
                       <!-- homepage icon menu -->
                       <div class="toolbar-dropdown cart-dropdown widget-cart  cart_view_header" id="header_cart_load" data-target="<?php echo e(route('front.header.cart')); ?>">  </div>
                     </div>
                   </li>
                 </ul>
               </nav>
             </div>
           </div>
             <div class="header-item-right  hidden-md-up">
<div class="header-item-left2">
              <div class="ok">
                 <button type="button" class="menu-mobile-trigger">
                   <span></span>
                   <span></span>
                   <span></span>
                   <span></span>
                 </button>
               </div>
             </div>
               <a href="#" class="menu-icon search_o">
                 <i class="icon-search"></i>
               </a> <?php if(!Auth::user()): ?> <a href="<?php echo e(route('user.login')); ?>" class="menu-icon">
                 <i class="icon-user"></i>
               </a>
               <a title="Wishlist" href="<?php echo e(route('user.wishlist.index')); ?>" class="menu-icon  menu-icon">
                 <i class="icon-heart"></i>
               </a> <?php else: ?> <a href="<?php echo e(route('user.dashboard')); ?>" class="menu-icon">
                 <i class="icon-user"></i>
               </a>
               <a title="Wishlist" href="<?php echo e(route('user.wishlist.index')); ?>" class="menu-icon menu-icon">
                 <i class="icon-heart"></i>
                 <span class="count-label cart_count wishlist_count"><?php echo e(Auth::user()->wishlists->count()); ?></span>
               </a> <?php endif; ?> <a href="<?php echo e(route('front.cart')); ?>" class="menu-icon">
                 <div>
                   <span class="cart-icon">
                     <i class="icon-shopping-cart"></i>
                     <span class="count-label cart_count"><?php echo e(Session::has('cart') ? count(Session::get('cart')) : '0'); ?> </span>
                   </span>
                 </div>
               </a>

             </div>
             <div class="cover">
               <div class="contents">
                 <form class="input-group" id="header_search_form" action="<?php echo e(route('front.catalog')); ?>" method="get">
                   <input type="hidden" name="category" value="" id="search__category">
                   <span class="input-group-btn">
                     <button type="submit">
                       <i class="icon-search"></i>
                     </button>
                   </span>
                   <input class="form-control form_trl" type="text" data-target="<?php echo e(route('front.search.suggest')); ?>" id="__product__search" name="search" placeholder="<?php echo e(__('Search By Product Name')); ?>">
                   <div class="serch-result d-none">
                     
                   </div>
                 </form>
                 <span class="close">X</span>
               </div>
             </div>
         </div>
         </div>
       </header><?php /**PATH /opt/lampp/htdocs/timesquartzold/core/resources/views/front/common/header.blade.php ENDPATH**/ ?>