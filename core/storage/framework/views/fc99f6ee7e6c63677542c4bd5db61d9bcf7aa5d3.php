<div class="wrapper">
  <div id="main-div">
    <div id="main-button" class="wave open">
      <i class="fa fa-times"></i>
    </div>
    <a href="<?php echo e(url('contact')); ?>" title="Call Now" class="telegram-color wave">
      <i class="fa fa-paper-plane"></i>
    </a>
    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo e($setting->support_phone); ?>&amp;text=Hi,%20Timesquartz%20Team,%20I%20want%20to%20contact%20you%20for%20" class="whatsapp-color wave">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a href="tel:<?php echo e($setting->footer_phone); ?>" class="messenger-color wave">
      <i class="fa fa-phone"></i>
    </a>
  </div>
</div>
<div class="fastest_Growing text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <p>India's leading & fastet growing Watch & Bagpacks brand. We offers vast range of Mens/Women Watches, Trolley Bags, Rucksack & Duffle Bags. Crafting Trends, Packing Futures: Your Go-To Destination for Watches & Bagpacks. </p>
      </div>
    </div>
  </div>
</div>
<!-- Site Footer-->
<footer class="site-footer">
  <div class="container">
    <div class="col-lg-12 ">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-gd">
          <!-- Contact Info-->
          <section class="widget widget-links widget-light-skin">
            <!-- <a href="<?php echo e(route('front.index')); ?>" class="brand"><img width="70%" src="<?php echo e(asset('assets/images/'.$setting->logo)); ?>" alt="<?php echo e($setting->title); ?>"></a><br/><br/> -->
            <h3 class="widget-title">About Company</h3>
            <ul>
              <li>
                <a href="<?php echo e(url('about-us')); ?>">About us</a>
              <li>
                <a href="<?php echo e(url('faq')); ?>">FAQs</a>
              </li>
              <li>
                <a class="" href="<?php echo e(url('/page/where-to-buy')); ?>">Where To Buy?</a>
              </li>

              <li>
                <a href="<?php echo e(url('brands')); ?>">Our Brands</a>
              </li>

                <li>
                <a href="<?php echo e(url('times-tvc')); ?>">Times TVC</a>
              </li>

              <li>
                <a href="<?php echo e(url('career')); ?>">Careers</a></li>
              <li>
                <a class="" href="<?php echo e(url('corporate-enquiries')); ?>">Corporate Enquiries</a>
              </li>
            </ul>
          </section>
        </div>
        <div class="col-lg-3 col-sm-6 col-gd">
          <!-- Customer Info-->
          <div class="widget widget-links widget-light-skin custome">
            <h3 class="widget-title ">Useful Links</h3>
            <ul>
              <li>
                <a href="<?php echo e(url('return-policy')); ?>">Return Policy</a>
              <li>
                <a href="<?php echo e(url('refund-policy')); ?>">Refund Policy</a>
              <li>
                <a href="<?php echo e(url('shipping-policy')); ?>">Shipping Policy </a>
              <li>
                <a href="<?php echo e(url('privacy-policy')); ?>">Privacy Policy</a>
              </li>
              <li>
                <a href="<?php echo e(url('terms-and-condition')); ?>">Terms & Condition</a>
              </li>
             
              <li>
                <a target="_blank" href="https://timesquartz.shiprocket.co/">Track Order</a>
              </li>
             
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 ">
          <!-- Customer Info-->
          <div class="widget widget-links widget-light-skin ">
            <h3 class="widget-title">Customer Care</h3>
            <ul>
              <li> Toll Free: <a class="underline" href="tel:<?php echo e($setting->footer_phone); ?>"><?php echo e($setting->footer_phone); ?></a>
              </li>
              <li> Support Number: <a class="underline" href="tel:<?php echo e($setting->support_phone); ?>"><?php echo e($setting->support_phone); ?></a>
              </li>
              <li>Email: <a class="underline" href="mailto:<?php echo e($setting->footer_email); ?>"><?php echo e($setting->footer_email); ?></a>
              </li>
                            <li>Operating Hours: : 10 AM to 6 PM (Mon-Sat)</li>

              <li> Want Help? <a class="underline" target="_blank"  href="https://api.whatsapp.com/send?phone=%20<?php echo e($setting->support_phone); ?>&text=Hi,%20Timesquartz%20Team,%20I%20want%20to%20contact%20you%20for%20">
                  <b>Click Here</b>
                </a> to Chat With us on Whatsapp <i class="fab fa-whatsapp"></i>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <!-- Subscription-->
          <section class="widget">
            <h3 class="widget-title">Sign Up & Save</h3>
            <div class="col-lg-12">
              <p class="text-sm opacity-80"><?php echo e(__('Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.')); ?></p>
            </div>
            <form class="row subscriber-form" action="<?php echo e(route('front.subscriber.submit')); ?>" method="post"> <?php echo csrf_field(); ?> <div class="col-sm-12">
                <div class="input-group">
                  <input class="form-control" type="email" name="email" placeholder="<?php echo e(__('Enter Your e-mail')); ?>">
                  <span class="input-group-addon">
                    <i class="icon-mail"></i>
                  </span>
                </div>
                <div aria-hidden="true">
                  <input type="hidden" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                </div>
              </div>
              <div class="col-sm-12">
                <button class="btn  btn-block mt-2" type="submit">
                  <span><?php echo e(__('Subscribe')); ?></span>
                </button>
              </div>
            </form>
            <br />
            <h5>Connect With Us !</h5>
            <div class="footer-social-links">
              <a class="facebook" href="https://www.facebook.com/timesquartz">
                <span>
                  <i class="fab fa-facebook-f"></i>
                </span>
              </a>
              <a class="twitter" href="https://twitter.com/timesquartz">
                <span>
                  <i class="fab fa-twitter"></i>
                </span>
              </a>
              <a class="instagram" href="https://www.instagram.com/timesquartz/">
                <span>
                  <i class="fab fa-instagram"></i>
                </span>
              </a>
              <a class="linkedin-in" href="">
                <span>
                  <i class="fab fa-linkedin-in"></i>
                </span>
              </a>
            </div>
<br/>
          
        
          </section>
        </div>
         <div class="row"> <img class="d-block gateway_image" src="<?php echo e($setting->footer_gateway_img ? asset('assets/images/'.$setting->footer_gateway_img) : asset('system/resources/assets/images/placeholder.png')); ?>"></div>
      </div>
    </div>
    <!-- Copyright-->
    <p class="footer-copyright"> Copyright © All Rights Reserved to Timesquartz | Website Managed By <a href="https://webhouseindia.com/ " rel="noopener noreferrer nofollow" target="_blank">Webhouseindia.com</a>
    </p>
  </div>
</footer>

<!-- Backdrop-->
<div class="site-backdrop"></div>

<!-- Cookie alert dialog  -->
<?php if($setting->is_cookie == 1): ?>
<?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!-- Cookie alert dialog  -->


<?php
    $mainbs = [];
    $mainbs['is_announcement'] = $setting->is_announcement;
    $mainbs['announcement_delay'] = $setting->announcement_delay;
    $mainbs['overlay'] = $setting->overlay;
    $mainbs = json_encode($mainbs);
?>

<script>
    var mainbs = <?php echo $mainbs; ?>;
    var decimal_separator = '<?php echo $setting->decimal_separator; ?>';
    var thousand_separator = '<?php echo $setting->thousand_separator; ?>';
</script>

<script>
    let language = {
        Days : '<?php echo e(__('Days')); ?>',
        Hrs : '<?php echo e(__('Hrs')); ?>',
        Min : '<?php echo e(__('Min')); ?>',
        Sec : '<?php echo e(__('Sec')); ?>',
    }

  

</script>
<script>
    
      var mainDiv = document.getElementById('main-button');
mainDiv.addEventListener('click', function(){
  this.children.item(0).classList.toggle('fa-headphones');
  this.classList.toggle('open');
});


</script>


<!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
<script type="text/javascript" src="<?php echo e(asset('assets/front/js/plugins.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/front/js/scripts.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/front/js/lazy.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/front/js/lazy.plugin.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/front/js/myscript.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
<script>

    $(function(){
  $(".search_o").click(function(){
    $(".cover").fadeIn("300");
  })
  $(".cover,.close").click(function(){
    $(".cover").fadeOut("300");
  })
  $(".contents").click(function(e){
    e.stopPropagation();
  })
})
</script>
<?php if($setting->is_facebook_messenger == '1'): ?>
 <?php echo $setting->facebook_messenger; ?>

<?php endif; ?>



<script type="text/javascript">
    let mainurl = 'http://localhost/timesquartz';

    let view_extra_index = 0;
      // Notifications
      function SuccessNotification(title){
            $.notify({
                title: ` <strong>${title}</strong>`,
                message: '',
                icon: 'fas fa-check-circle'
                },{
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class'
            });
        }

        function DangerNotification(title){
            $.notify({
                // options
                title: ` <strong>${title}</strong>`,
                message: '',
                icon: 'fas fa-exclamation-triangle'
                },{
                // settings
                element: 'body',
                position: null,
                type: "danger",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class'
            });
        }
        // Notifications Ends
    </script>

    <?php if(Session::has('error')): ?>
    <script>
      $(document).ready(function(){
        DangerNotification('<?php echo e(Session::get('error')); ?>')
      })

    </script>
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
    <script>
      $(document).ready(function(){
        SuccessNotification('<?php echo e(Session::get('success')); ?>');
      })

    </script>
    <?php endif; ?>

    <script>
const menu=document.querySelector('.menu');const menuSection=menu.querySelector('.menu-section');const menuArrow=menu.querySelector('.menu-mobile-arrow');const menuClosed=menu.querySelector('.menu-mobile-close');const menuTrigger=document.querySelector('.menu-mobile-trigger');const menuOverlay=document.querySelector('.overlay');let subMenu;menuSection.addEventListener('click',(e)=>{if(!menu.classList.contains('active')){return;}
if(e.target.closest('.menu-item-has-children')){const hasChildren=e.target.closest('.menu-item-has-children');showSubMenu(hasChildren);}});menuArrow.addEventListener('click',()=>{hideSubMenu();});menuTrigger.addEventListener('click',()=>{toggleMenu();});menuClosed.addEventListener('click',()=>{toggleMenu();});menuOverlay.addEventListener('click',()=>{toggleMenu();});function toggleMenu(){menu.classList.toggle('active');menuOverlay.classList.toggle('active');}
function showSubMenu(hasChildren){subMenu=hasChildren.querySelector('.menu-subs');subMenu.classList.add('active');subMenu.style.animation='slideLeft 0.5s ease forwards';const menuTitle=hasChildren.querySelector('i').parentNode.childNodes[0].textContent;menu.querySelector('.menu-mobile-title').innerHTML=menuTitle;menu.querySelector('.menu-mobile-header').classList.add('active');}
function hideSubMenu(){subMenu.style.animation='slideRight 0.5s ease forwards';setTimeout(()=>{subMenu.classList.remove('active');},300);menu.querySelector('.menu-mobile-title').innerHTML='';menu.querySelector('.menu-mobile-header').classList.remove('active');}
window.onresize=function(){if(this.innerWidth>991){if(menu.classList.contains('active')){toggleMenu();}}};



    </script>


</body>
</html>
<?php /**PATH /opt/lampp/htdocs/timesquartzold/core/resources/views/front/common/footer.blade.php ENDPATH**/ ?>