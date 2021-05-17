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
                

    


  

             <li data-username="Animations" class="nav-item"><a :href="'/admin/manaddcom/'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-plus"></i></span><span class="pcoded-mtext"> Ajouter une commande </span> </a></li>
                          <li data-username="Animations" class="nav-item"><a :href="'/admin/addcoms/'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-upload"></i></span><span class="pcoded-mtext"> Importer Excel </span> </a></li>
             <li data-username="Animations" class="nav-item"><a :href="'/admin/commandes/'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-dolly-flatbed"></i></span><span class="pcoded-mtext">Mes Commandes  </span> </a></li>


              <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu ">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-boxes"></i></span><span class="pcoded-mtext">Mes colis </span></a>
                        <ul class="pcoded-submenu">
                          
                      <li class="   pcoded-trigger"><a :href="'/admin/recpuser'" class=""> <span  class="pcoded-micon" > <i  class="fas fa-building"></i> </span> Reception <span class="pcoded-badge label label-info">{{ stats.rec }}</span> </a>
                             </li> 
                               <li class="  pcoded-trigger"><a :href="'/admin/enlivuser'" class="">  <span class="pcoded-micon" > <i class="fas fa-shipping-fast"></i></span>  En livraison  <span class="pcoded-badge label label-primary"> {{ stats.enliv }} </span> </a>
                             </li>
                              <li class="  pcoded-trigger"><a :href="'/admin/echoueuser'" class="">   <span class="pcoded-micon" > <i class="fas fa-window-close"></i> </span>   Echoué <span  class="pcoded-badge label label-warning">{{ stats.ech }}</span> </a>
                             </li>
                              <li class="  pcoded-trigger"><a :href="'/admin/livreuser'" class=""> <span class="pcoded-micon" > <i class="fas fa-clipboard-check"></i></span>   Colis Livré <span class="pcoded-badge label label-success">{{ stats.livre }}</span> </a>
                             </li>
                              <li class="  pcoded-trigger"><a :href="'/admin/retouruser'" class="">   <span class="pcoded-micon"> <i class="fas fa-undo"></i></span> Retour  <span class="pcoded-badge label label-danger">{{ stats.retour }}</span> </a>
                             </li>
                        </ul>
                        
                    </li>



         <li class="nav-item pcoded-menu-caption">
                        <label>Plus</label>
                    </li>
                




                                   <li data-username="Animations" class="nav-item"><a :href="'/admin/tracking'" class="nav-link">
                                   <span class="pcoded-micon"><i class="fas fa-project-diagram
"></i></span><span class="pcoded-mtext">Tracking</span></a></li>

                </ul>
            </div>
        




</template>


<script>

// Choose Locale

export default {
  props: ['user_id'],
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

this.getstatsuser();
 },

 
 
    methods : {

           moment(arg) {
             return moment(arg);
         } ,
 getstatsuser(){


axios.get('/api/statsuser/'+this.user_id)
     .then(response =>
     { 
       
   this.stats = response.data
     
 }
     ).catch(err => console.log(err));


}

    }  


}
</script>