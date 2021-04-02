  <!-- Page preloader start -->
    <div id="cg__page-loading" class="cg__pageLoading cg__preloaderBreath">
        <div class="cg__pageLoading-inner">
            <img src="{{ url('webs/img-assets/loader.gif') }}" alt="">
        </div>
    </div><!--/.sh__page-loading-->
    <!-- Page preloader end -->

    <div id="page_wrapper">

        <!-- Responsive menu start -->
        <ul class="cg__resMenu">
            <li class="cg__resMenu-back">
                <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="#" class="cg__resMenu-backLink">Back</a>
            </li>
            <li><a class="active" href="index.html"><span>Acceuil</span></a></li>
            <li class="cg__res-submenu">
                <span class="cg__res-submenu-trigger glyphicon glyphicon-chevron-right"></span>
                <a href="#"><span> Send express </span></a>
                <ul class="cg__subMenu">
                    <li class="cg__resMenu-back">
                        <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="#" class="cg__resMenu-backLink">revenir </a>
                    </li>
                    <li><a href="about.html"><span>A propos </span></a></li>
                    <li><a href="history.html"><span>Nos Valeurs</span></a></li>
                    <li><a href="services.html"><span>Nos services </span></a></li>
                    <li><a href="careers.html"><span>Contactez-nous</span></a></li>
                  
                </ul>
            </li>
         
        </ul>

        <!-- Restponsive menu end -->

        <!-- Header start -->
        <header>
            <div class="cg__headerNavbar">
                <div class="container cg__headerContainer">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="cg__logoContainer">
                            <a href="{{ url('/')}}">
                            <img src="{{ url('/dash/assets/images/logoexp.png')}}" alt="" class="cg__logoImg">
                                </a>
                            </div>
                           
                            <div class="cg__separator visible-xs"></div>
                            <div class="cg__menuBar">
                                <div class="cg__menuWrapper">
                                    <div class="cg__mainMenu-trigger">
                                        <a href="#" class="cg__menuBurger">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div><!--/.cg__mainMenu-trigger-->
                                    <ul class="cg__mainMenu clearfix">
                                        <li><a class="active" href="index.html"><span>Acceuil</span></a></li>
                                        <li class="has-submenu">
                                            <a href="#"><span>A PROPOS </span></a>
                                    
                                        </li><!--/.has-submenu-->
                                        <li><a href="#"><span>NOS VALEURS</span></a></li>
                                        <li><a href="#"><span>NOS SERVICES</span></a></li>
                                        <li><a href="#"><span>Contactez Nous </span></a></li>
                                    </ul><!--/.cg__mainMenu-->
                                </div><!--/.cg__menuWrapper-->
                                <div class="cg__ctaButton">
                                <a href="{{ url('/admin/login')}}" class="cg__btn"><span> connectez-vous </span></a>
                                </div>
                            </div><!--/.cg__menuBar-->
                        </div><!--/.col-xs-12-->

                    </div><!--/.row-->
                </div><!--/.cg__headerContainer-->
            </div><!--/.cg__headerNavbar-->
        </header>