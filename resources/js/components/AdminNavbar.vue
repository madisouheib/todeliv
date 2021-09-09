<template>
    



            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label> Config </label>
                    </li>
                
                      <li data-username="Animations" class="nav-item"><a :href="'/admin'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Tableau de Bord </span></a></li>
              
                      <li data-username="Animations" class="nav-item"><a :href="'/admin/users'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-users"></i></span><span class="pcoded-mtext">Utilisateurs </span></a></li>
                                <li data-username="Animations" class="nav-item"><a :href="'/admin/bordereau'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-address-card"></i></span><span class="pcoded-mtext">Bordereau </span></a></li>
                                                                <li data-username="Animations" class="nav-item"><a :href="'#'" class="nav-link"><span class="pcoded-micon"><i class="fab fa-usb"></i></span><span class="pcoded-mtext">Extentions </span></a></li>


                    <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu ">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-pallet"></i></span><span class="pcoded-mtext">Dépots</span></a>
                        <ul class="pcoded-submenu">
                   
  <li class="  pcoded-trigger"><a :href="'/admin/hub'" class="">Hub <span class="pcoded-badge label label-info">9</span> </a>
                             </li>
                  
                               <li class="  pcoded-trigger"><a :href="'/admin/wilaya'" class="">Wilayas</a>
                             </li>
                        </ul>
                    </li>
                  
                    <li class="nav-item pcoded-menu-caption">
                        <label>Expédition des colis</label>
                    </li>
                

    

             <li data-username="Animations" class="nav-item"><a :href="'/admin/rec'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-truck-loading"></i></span><span class="pcoded-mtext">Reception </span><span class="pcoded-badge label label-info">{{ stats.rec }}</span> </a></li>
  
<!--
                <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu ">
                    <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-sitemap"></i></span><span class="pcoded-mtext">Transit</span></a>
                    <ul class="pcoded-submenu">
                      
                  <li class="  pcoded-trigger"><a :href="'/admin/transitenvoie'" class="">Envoie des colis  <span class="pcoded-badge label label-info">{{ stats.trenv }}</span> </a>
                         </li>
                           <li class="  pcoded-trigger"><a :href="'/admin/transitretour'" class="">Reception des colis  <span class="pcoded-badge label label-danger"> {{ stats.trecp }}</span>  </a>
                         </li>
                    </ul>
                </li>
-->
       <li data-username="Animations" class="nav-item"><a :href="'/admin/inhouse'" class="nav-link"><span class="pcoded-micon"><i class=" fas fa-boxes"></i></span><span class="pcoded-mtext">Prêt à livrer  </span> <span class="pcoded-badge label label-info">{{ stats.inhouse }}</span> </a></li>


                                  <li data-username="Animations" class="nav-item"><a :href="'/admin/ondelivery'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-clipboard-list"></i></span><span class="pcoded-mtext">Feuille de route  </span> <span class="pcoded-badge label label-success"> {{ stats.countfiche}} </span> </a></li>

                                   <li data-username="Animations" class="nav-item"><a :href="'/admin/livraison'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-shipping-fast"></i></span><span class="pcoded-mtext">En Livraison </span><span class="pcoded-badge label label-success">{{ stats.enliv }}</span> </a></li>

  <li data-username="Animations" class="nav-item"><a :href="'/admin/echlivraison'" class="nav-link"><span class="pcoded-micon"><i class=" fas fa-window-close
"></i></span><span class="pcoded-mtext">Livraison echouée   </span> <span class="pcoded-badge label label-warning">{{ stats.ech }}</span> </a></li>


                                   <li data-username="Animations" class="nav-item"><a  :href="'/admin/retours'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-undo"></i></span><span class="pcoded-mtext">Retour </span> <span class="pcoded-badge label label-danger">{{ stats.retour }}</span>    </a></li>

                                   <li data-username="Animations" class="nav-item"><a :href="'/admin/livre'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-check-circle
"></i></span><span class="pcoded-mtext">Colis Livrée</span> <span class="pcoded-badge label label-success"> {{ stats.livre }}</span>  </a></li>

   <li class="nav-item pcoded-menu-caption">
                        <label>Plus </label>
                    </li>



 <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu ">
                    <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-money-check"></i></span><span class="pcoded-mtext">Comptabilité</span></a>
                    <ul class="pcoded-submenu">
                      
                  <li class="  pcoded-trigger"><a :href="'/admin/accounting'" class=""><i class="fas fa-calculator"></i>  Saisies <span class="pcoded-badge label label-primary">{{ stats.compta }}</span> </a>
                         </li>
                           <li class="  pcoded-trigger"><a :href="'/admin/facturation'" class=""> <i class="fas fa-file-alt"></i> Facturation  <span class="pcoded-badge label label-success">{{ stats.facture }}</span>  </a>
                         </li>
                    </ul>
                </li>

                                   <li data-username="Animations" class="nav-item"><a :href="'/admin/tracking'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-clipboard-check
"></i></span><span class="pcoded-mtext">Tracking</span></a></li>

                </ul>
            </div>
  
</template>


<script>

// Choose Locale

export default {
props:['user_id'],
filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},
     data(){
 return {
stats : {},



 }
  },
     created ()
{

this.getstats();
 },

 
 
    methods : {

           moment(arg) {
             return moment(arg);
         } ,
 getstats(){


axios.get('/api/stats/'+this.user_id)
     .then(response =>
     { 
       
   this.stats = response.data
     
 }
     ).catch(err => console.log(err));


}

    }  


}
</script>