<template>
    





            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Générale</label>
                    </li>
                
                      <li data-username="Animations" class="nav-item"><a :href="'/admin'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Tableau de Bord </span></a></li>



                  
                    <li class="nav-item pcoded-menu-caption">
                        <label>Operation</label>
                    </li>
                

    


  

             <li data-username="Animations" class="nav-item"><a :href="'/admin/addcoms/'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-upload"></i></span><span class="pcoded-mtext"> Importer </span> </a></li>
             <li data-username="Animations" class="nav-item"><a :href="'/admin/commandes/'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-dolly-flatbed"></i></span><span class="pcoded-mtext">Mes Importations </span> </a></li>


              <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu ">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-boxes"></i></span><span class="pcoded-mtext">Mes colis </span></a>
                        <ul class="pcoded-submenu">
                          
                      <li class="  pcoded-trigger"><a :href="'/admin/reception'" class=""> <span  class="pcoded-micon" > <i  class="fas fa-building"></i> </span> Reception <span class="pcoded-badge label label-info">10+</span> </a>
                             </li> 
                               <li class="  pcoded-trigger"><a :href="'/admin/reception'" class="">  <span class="pcoded-micon" > <i class="fas fa-shipping-fast"></i></span>  En livraison  <span class="pcoded-badge label label-primary">10+</span> </a>
                             </li>
                              <li class="  pcoded-trigger"><a :href="'/admin/reception'" class="">   <span class="pcoded-micon" > <i class="fas fa-window-close"></i> </span>   Echoué <span  class="pcoded-badge label label-warning">10+</span> </a>
                             </li>
                              <li class="  pcoded-trigger"><a :href="'/admin/reception'" class=""> <span class="pcoded-micon" > <i class="fas fa-clipboard-check"></i></span>   Colis Livré <span class="pcoded-badge label label-success">10+</span> </a>
                             </li>
                              <li class="  pcoded-trigger"><a :href="'/admin/reception'" class="">   <span class="pcoded-micon"> <i class="fas fa-undo"></i></span> Retour  <span class="pcoded-badge label label-danger">10+</span> </a>
                             </li>
                        </ul>
                        
                    </li>



         <li class="nav-item pcoded-menu-caption">
                        <label>Plus</label>
                    </li>
                



                                   <li data-username="Animations" class="nav-item"><a href="animation.html" class="nav-link"><span class="pcoded-micon"><i class="fas fa-clipboard-check
"></i></span><span class="pcoded-mtext">Statistique</span></a></li>

                                   <li data-username="Animations" class="nav-item"><a :href="'/admin/tracking'" class="nav-link">
                                   <span class="pcoded-micon"><i class="fas fa-project-diagram
"></i></span><span class="pcoded-mtext">Tracking</span></a></li>

                </ul>
            </div>
        




</template>