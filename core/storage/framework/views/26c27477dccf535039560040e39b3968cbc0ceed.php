

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
<?php /**PATH /opt/lampp/htdocs/paytmtesting/core/resources/views/front/common/footer.blade.php ENDPATH**/ ?>