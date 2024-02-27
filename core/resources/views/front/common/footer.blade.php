

<!-- Backdrop-->
<div class="site-backdrop"></div>

<!-- Cookie alert dialog  -->
@if ($setting->is_cookie == 1)
@include('cookieConsent::index')
@endif

<!-- Cookie alert dialog  -->


@php
    $mainbs = [];
    $mainbs['is_announcement'] = $setting->is_announcement;
    $mainbs['announcement_delay'] = $setting->announcement_delay;
    $mainbs['overlay'] = $setting->overlay;
    $mainbs = json_encode($mainbs);
@endphp

<script>
    var mainbs = {!! $mainbs !!};
    var decimal_separator = '{!! $setting->decimal_separator !!}';
    var thousand_separator = '{!! $setting->thousand_separator !!}';
</script>

<script>
    let language = {
        Days : '{{__('Days')}}',
        Hrs : '{{__('Hrs')}}',
        Min : '{{__('Min')}}',
        Sec : '{{__('Sec')}}',
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
<script type="text/javascript" src="{{asset('assets/front/js/plugins.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/scripts.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/lazy.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/lazy.plugin.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/myscript.js')}}"></script>
@yield('script')
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
@if($setting->is_facebook_messenger == '1')
 {!!  $setting->facebook_messenger !!}
@endif



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

    @if(Session::has('error'))
    <script>
      $(document).ready(function(){
        DangerNotification('{{Session::get('error')}}')
      })

    </script>
    @endif
    @if(Session::has('success'))
    <script>
      $(document).ready(function(){
        SuccessNotification('{{Session::get('success')}}');
      })

    </script>
    @endif

    <script>
const menu=document.querySelector('.menu');const menuSection=menu.querySelector('.menu-section');const menuArrow=menu.querySelector('.menu-mobile-arrow');const menuClosed=menu.querySelector('.menu-mobile-close');const menuTrigger=document.querySelector('.menu-mobile-trigger');const menuOverlay=document.querySelector('.overlay');let subMenu;menuSection.addEventListener('click',(e)=>{if(!menu.classList.contains('active')){return;}
if(e.target.closest('.menu-item-has-children')){const hasChildren=e.target.closest('.menu-item-has-children');showSubMenu(hasChildren);}});menuArrow.addEventListener('click',()=>{hideSubMenu();});menuTrigger.addEventListener('click',()=>{toggleMenu();});menuClosed.addEventListener('click',()=>{toggleMenu();});menuOverlay.addEventListener('click',()=>{toggleMenu();});function toggleMenu(){menu.classList.toggle('active');menuOverlay.classList.toggle('active');}
function showSubMenu(hasChildren){subMenu=hasChildren.querySelector('.menu-subs');subMenu.classList.add('active');subMenu.style.animation='slideLeft 0.5s ease forwards';const menuTitle=hasChildren.querySelector('i').parentNode.childNodes[0].textContent;menu.querySelector('.menu-mobile-title').innerHTML=menuTitle;menu.querySelector('.menu-mobile-header').classList.add('active');}
function hideSubMenu(){subMenu.style.animation='slideRight 0.5s ease forwards';setTimeout(()=>{subMenu.classList.remove('active');},300);menu.querySelector('.menu-mobile-title').innerHTML='';menu.querySelector('.menu-mobile-header').classList.remove('active');}
window.onresize=function(){if(this.innerWidth>991){if(menu.classList.contains('active')){toggleMenu();}}};



    </script>


</body>
</html>
