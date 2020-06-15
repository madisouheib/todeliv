<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('webs/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('webs/css/template.css') }}" rel="stylesheet">
        <link href="{{ asset('webs/css/icomoon.css') }}" rel="stylesheet">
        <link href="{{ asset('webs/modules/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('webs/modules/slick/slick-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('webs/modules/Magnific-Popup/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('webs/modules/vertical-timeline/css/style.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:100,300,400,700" rel="stylesheet">
        <link href="{{ asset('webs/modules/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('webs/modules/revolution/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('webs/modules/revolution/css/settings.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>


@include('web.core.header')

  



            @yield('content')


  @include('web.core.footer')

    <a href="#" class="totop">HAUT</a> <!--/.totop -->

    <script src="{{ asset('webs/js/src/plugins/jquery-1.11.1.min.js') }} "></script>
    <script src="{{ asset('webs/js/src/plugins/jquery-1.11.1.min.js') }} js/src/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('webs/modules/slick/slick.js') }}"></script>
    <script src="{{ asset('webs/modules/Magnific-Popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('webs/js/src/plugins/jquery.countTo.js') }}"></script>
    <script src="{{ asset('webs/modules/vertical-timeline/js/modernizr.js') }}"></script>
    <script src="{{ asset('webs/modules/vertical-timeline/js/main.js') }}"></script>
    <script src="{{ asset('webs/modules/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('webs/modules/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.kenburn.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.layeranimation.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.migration.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.navigation.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.parallax.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.slideanims.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('webs/modules/revolution/js/extensions/revolution.extension.video.min.js') }} "></script>
    <script type="text/javascript">function setREVStartSize(e){
            try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
                if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
            }catch(d){console.log("Failure at Presize of Slider:"+d)}
        };
    </script>
    <script src="{{ asset('webs/js/src/script.js') }} "></script>


</body>
</html>
