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
            <li><a class="active" href="index.html"><span>Home</span></a></li>
            <li class="cg__res-submenu">
                <span class="cg__res-submenu-trigger glyphicon glyphicon-chevron-right"></span>
                <a href="#"><span>YM PLANNER V2 </span></a>
                <ul class="cg__subMenu">
                    <li class="cg__resMenu-back">
                        <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="#" class="cg__resMenu-backLink">revenir </a>
                    </li>
                    <li><a href="about.html"><span>A propos </span></a></li>
                    <li><a href="history.html"><span>Nos Valeurs</span></a></li>
                    <li><a href="services.html"><span>Nos services </span></a></li>
                    <li><a href="careers.html"><span>CAREERS</span></a></li>
                  
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
                                <a href="index.html">
                                    <img src="" alt="" class="cg__logoImg">
                                </a>
                            </div>
                            <div class="cg__separator visible-xs"></div>
                            <div class="cg__topBar">
                                <div class="cg__topMenu-wrapper">
                                    <span class="cg__topMenu-trigger"></span>
                                    <ul class="cg__topMenu cg__topBar-component clearfix">
                                        <li><a href="services.html"></a></li>
                                        <li><a href="news.html"></a></li>
                                        <li><a href="Contact.html"></a></li>
                                    </ul><!--/.cg__topMenu-->
                                </div><!--/.cg__topMenu-wrapper-->
                                <ul class="cg__topBar-component cg__loginPanel cg__single-component clearfix">
                                    <li>
                                        <a href="{{ url('/login')}}">
                                            <i class="glyphicon glyphicon-log-in visible-xs"></i>
                                                 <i class="cg__elem--white glyphicon glyphicon-log-in"></i>
                                            <span class="hidden-xs">LOGIN</span>
                                        </a>
                                    </li>
                                </ul><!--/.cg__loginPanel-->
                                <ul class="cg__topBar-component cg__languages cg__single-component clearfix">
                                    <li>
                                    <a href="{{ url('/register')}}" class="cg__languages-link">
                                            <i class="cg__elem--white glyphicon glyphicon glyphicon-user"></i>
                                            <span class="cg__hidden-xs cg__hidden-sm">INSCRIPTION</span>
                                        </a><!--/.cg__languages-link-->
                                     
                                    </li>
                                </ul><!--/.cg__languages-->
                                <ul class="cg__topBar-component cg__socialIcons clearfix">
                                    <li><a href="#" title="Facebook" class="cg__icon-facebook"></a></li>
                                  
                                    <li><a href="#" title="LinkedIn" class="cg__icon-linkedin"></a></li>
                                </ul>
                                <div class="cg__search">
                                    <a href="#" class="cg__searchBtn">
                                        <span class="glyphicon glyphicon-search cg__elem--white"></span>
                                    </a>
                                    <div class="cg__search-container">
                                  
                                    </div><!--/.cg__search-->
                                </div><!--/.cg__search-->
                            </div><!--/.cg__topBar-->
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
                                        <li><a href="global.html"><span>NOS VALEURS</span></a></li>
                                        <li><a href="news.html"><span>NOS SERVICES</span></a></li>
                                        <li><a href="contact.html"><span>Contactez Nous </span></a></li>
                                    </ul><!--/.cg__mainMenu-->
                                </div><!--/.cg__menuWrapper-->
                                <div class="cg__ctaButton">
                                <a href="{{ url('/register')}}" class="cg__btn"><span> Inscription </span></a>
                                </div>
                            </div><!--/.cg__menuBar-->
                        </div><!--/.col-xs-12-->

                    </div><!--/.row-->
                </div><!--/.cg__headerContainer-->
            </div><!--/.cg__headerNavbar-->
        </header>