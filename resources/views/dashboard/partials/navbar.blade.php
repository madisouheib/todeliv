    <nav class="pcoded-navbar navbar-collapsed">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">Send Express</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Générale</label>
                    </li>
                
                      <li data-username="Animations" class="nav-item"><a href="{{ url('/admin') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Tableau de Bord </span></a></li>
                      @role('admin')   
                      <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/users') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-users"></i></span><span class="pcoded-mtext">Utilisateurs </span></a></li>
                                <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/profiles') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-address-card"></i></span><span class="pcoded-mtext">Profiles </span></a></li>


                    <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu ">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-warehouse"></i></span><span class="pcoded-mtext">Stations</span></a>
                        <ul class="pcoded-submenu">
                          
                      <li class="  pcoded-trigger"><a href="{{ url('/admin/hub') }}" class="">Hub <span class="pcoded-badge label label-info">100+</span> </a>
                             </li>
                               <li class="  pcoded-trigger"><a href="{{ url('/admin/wilaya') }}" class="">Wilayas</a>
                             </li>
                        </ul>
                    </li>
                    @endrole
                    <li class="nav-item pcoded-menu-caption">
                        <label>Operation</label>
                    </li>
                

                    @role('admin')  

             <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/rec') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-building"></i></span><span class="pcoded-mtext">Reception </span><span class="pcoded-badge label label-info">900+</span> </a></li>
             @endrole

             @role('coordinateur')  

             <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/rec') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-building"></i></span><span class="pcoded-mtext">Reception </span><span class="pcoded-badge label label-info">900+</span> </a></li>
             @endrole
             @role('client pro')
             <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/addcoms/') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-upload"></i></span><span class="pcoded-mtext"> Importer </span> </a></li>
             <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/commandes/') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-boxes"></i></span><span class="pcoded-mtext">Mes Importations </span> </a></li>
             <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/listcolis/all') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-dolly-flatbed"></i></span><span class="pcoded-mtext">Colis  </span> </a></li>
             @endrole
             @role('admin')
                <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu ">
                    <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-sitemap"></i></span><span class="pcoded-mtext">Transit</span></a>
                    <ul class="pcoded-submenu">
                      
                  <li class="  pcoded-trigger"><a href="{{ url('/admin/transitenvoie') }}" class="">Envoie <span class="pcoded-badge label label-info">0</span> </a>
                         </li>
                           <li class="  pcoded-trigger"><a href="{{ url('/admin/transitretour') }}" class="">Retour <span class="pcoded-badge label label-danger">0</span>  </a>
                         </li>
                    </ul>
                </li>

       <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/inhouse') }}" class="nav-link"><span class="pcoded-micon"><i class=" fas fa-boxes"></i></span><span class="pcoded-mtext">IN HOUSE  </span> <span class="pcoded-badge label label-info">100+</span> </a></li>


                                  <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/ondelivery') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-clipboard-list"></i></span><span class="pcoded-mtext">Feuille de route  </span> <span class="pcoded-badge label label-success">10+</span> </a></li>

                                   <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/livraison') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-shipping-fast"></i></span><span class="pcoded-mtext">En Livraison </span><span class="pcoded-badge label label-success">10+</span> </a></li>

  <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/echlivraison') }}" class="nav-link"><span class="pcoded-micon"><i class=" fas fa-window-close
"></i></span><span class="pcoded-mtext">Livraison echouée   </span> <span class="pcoded-badge label label-info">100+</span> </a></li>


                                   <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/retours') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-undo"></i></span><span class="pcoded-mtext">Retour </span> <span class="pcoded-badge label label-danger">80+</span>    </a></li>

                                   <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/livre') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-clipboard-check
"></i></span><span class="pcoded-mtext">Colis Livrée</span> <span class="pcoded-badge label label-success">100+</span>  </a></li>

   <li class="nav-item pcoded-menu-caption">
                        <label>Plus </label>
                    </li>


                                   <li data-username="Animations" class="nav-item"><a href="animation.html" class="nav-link"><span class="pcoded-micon"><i class="fas fa-clipboard-check
"></i></span><span class="pcoded-mtext">Statistique</span></a></li>

                                   <li data-username="Animations" class="nav-item"><a href="{{ url('/admin/tracking') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-clipboard-check
"></i></span><span class="pcoded-mtext">Tracking</span></a></li>
@endrole
                </ul>
            </div>
        </div>
    </nav>

    <section class="header-user-list">
        <div class="h-list-header">
            <div class="input-group">
                <input type="text" id="search-friends" class="form-control" placeholder="Search Friend . . .">
            </div>
        </div>
        <div class="h-list-body">
            <a href="#!" class="h-close-text"><i class="feather icon-chevrons-right"></i></a>
            <div class="main-friend-cont scroll-div">
                </div>
        </div>
    </section>
    <!-- [ chat user list ] end -->

    <!-- [ chat message ] start -->
    <section class="header-chat">
        <div class="h-list-header">
            <h6>Send Express</h6>
            <a href="#!" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
        </div>
        <div class="h-list-body">
            <div class="main-chat-cont scroll-div">
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5" src="/dash/assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">hello Datta! Will you tell me something</p>
                                <p class="chat-cont">about yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5" src="/dash/assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">can you help me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-list-footer">
            <div class="input-group">
                <input type="file" class="chat-attach" style="display:none">
                <a href="#!" class="input-group-prepend btn btn-success btn-attach">
                    <i class="feather icon-paperclip"></i>
                </a>
                <input type="text" name="h-chat-text" class="form-control h-send-chat" placeholder="Write hear . . ">
                <button type="submit" class="input-group-append btn-send btn btn-primary">
                    <i class="feather icon-message-circle"></i>
                </button>
            </div>
        </div>
    </section>