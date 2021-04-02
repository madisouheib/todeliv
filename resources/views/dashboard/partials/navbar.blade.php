   
   
   
   <nav class="pcoded-navbar navbar-collapsed">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">


    

                <a href="{{ url('/admin')}}" class="b-brand" >
                    
                    <div class="">
                        <img class="img-responsive" src="{{ url('/dash/assets/images/logo.png')}}" width="50" height="50">
                    </div>
                    <span class="b-title">ToDeliver </span>
                </a>



                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    
                
                    
                    <span></span></a>
            </div>



            <div class="navbar-content scroll-div" id="nav"   >
                <ul class="nav pcoded-inner-navbar">
 @role('admin')

<nav-admin  :user_id='@json( Auth::user()->id )' > </nav-admin>
 @endrole
 @role('client pro')

 <nav-client :user_id='@json( Auth::user()->id )' > </nav-client>
  @endrole

  @role('coordinateur')

 <nav-cord :user_id='@json( Auth::user()->id )' > </nav-cord>
  @endrole
            </div>
        </div>
    </nav>

    <section class="header-user-list">
        <div class="h-list-header">
         
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