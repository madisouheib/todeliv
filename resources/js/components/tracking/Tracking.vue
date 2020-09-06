<template>
<div>
                <div class="text-center" style="margin:10px;">   </div>
               <div class="row text-center">    
                   
           <input class="form-control input-lg col-6" value="" type="text" placeholder="Recherche numero de tracking ... "> <button class=" btn btn-glow-success btn-success" style="margin-left:10px;"> Recherche  <i class="fas fa-search text-center" ></i>  </button>        
                   
                   
                   </div>        

<div class="row" style="margin-top:2%;">

 <div class="col-xl-4 col-md-4">
                                    <div class="card" style="border-right:2px dashed #fbbc05; ">
                                        <div class="card-block">
                                            <div class="text-center m-b-30">
                                                <img class="img-fluid rounded-circle" width="100px" height="100px" src="/dash/assets/images/clients/client_pro.png" alt="dashboard-user">
                                                      <h5 class="mt-3">{{ userPartenaire.name }}  </h5>
                                                <span class="d-block"> HUB : {{ userPartenaire.nom_hub }}  </span>
                                            </div>
                                  <table class="table table-hover">

<tr>
<th> <i class="fas fa-envelope"></i> Email :   </th>
<td>  {{ userPartenaire.email }} </td>
</tr>
<tr>
<th> <i class="fas fa-phone-square"></i> Tel :  </th>
<td>  {{ userPartenaire.phone }} </td>
</tr>
<tr>
<th> <i class="fas fa-phone-square"></i> Service Client :  </th>
<td>  {{ userPartenaire.service_client }} </td>
</tr>
<tr>
<th> <i class="fas fa-map-marker-alt"></i>  Adresse  :  </th>
<td> {{ userPartenaire.adresse }}  </td>
</tr>

                                  </table>
                                         
                                            <div class="row m-t-30">
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-xl-4 col-md-6">
                                    <div class="card" style="border-left:2px dashed #fbbc05;border-right:2px dashed #fbbc05;">
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                   
                                                </div>
                                                <div class="col">
                                                    <h5>  {{ this.Client.nom_client }}  </h5>
                                                    <span>Tracking </span>
                                                </div>
                                            </div>
                                            <ul class="task-list">
                                                
                                                  <li  >
                                                    <i class="task-icon bg-c-blue"></i>
                                                    <h6> Created at  <span class="float-right text-muted">14 MAY</span></h6>
                                                    <p class="text-muted">Par </p>
                                                </li>
                                                <li   v-for="stat in tracking " :key="stat.id_stats_colis"  :value=" stat.id_stats_colis  "  >
                                                    <i class="task-icon bg-c-green"></i>
                                                    <h6> {{ stat.field_stats }} <span class="float-right text-muted">14 MAY</span></h6>
                                                    <p class="text-muted">par : {{ stat.name }}</p>
                                                </li>
                                           
                                            </ul>
                                        </div>
                                    </div>
                                </div>
 <div class="col-xl-4 col-md-4">
                                    <div class="card" style="border-left:2px dashed #fbbc05;">
                                        <div class="card-block">
                                            <div class="text-center m-b-30">
                                                <img class="img-fluid rounded-circle" width="100px" height="100px"   src="/dash/assets/images/clients/client_finale.png" alt="dashboard-user">
                                                <h5 class="mt-3">  {{ this.Client.nom_client }}    </h5>
                                                <span class="d-block"> HUB : OUEST ALGERIE </span>
                                            </div>
                                      
                                         
                                            <div class="row ">
                               

<div  class="col-4"> <h6> <i class="fas fa-box"></i> Produit  :   </h6>  </div>
<div class="col-8">  <p> {{ this.Client.produit }}    </p>   </div>


<div class="col-4"> <h6>  <i class="fas fa-sort-numeric-down"></i> Quantité  :  </h6>  </div>
<div class="col-8">  {{ this.Client.qte }}   </div>


<div class="col-4">  <h6> <i class="fas fa-money-bill"></i> Prix   : </h6> </div>
<div class="col-8">  {{ this.Client.price }}   </div>


<div class="col-4">   <h6> <i class="fas fa-phone-square"></i> Tel :  </h6> </div>
<div class="col-8">   {{ this.Client.tel }}   </div>

<div class="col-4"> <h6>  <i class="fas fa-map-signs"></i> Wilaya / Commune  : </h6>   </div>
<div class="col-8">   {{ this.Client.wilaya }}  /  {{ this.Client.commune }}   </div>

<div class="col-4"> <h6>  <i class="fas fa-map-marker-alt"></i>  Adresse  :  </h6>  </div>
<div class="col-8">  <p style="  word-break: break-all;">  {{ this.Client.adress }}  </p>    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
</div>
</div>
</template>

<script>
export default {
    props:['url_id']  ,
       data(){
 return {
tracking:{},
userPartenaire :{},
Client :{},

idcolis: this.url_id



 }
  },
  
 created ()
 {



this.getTracking();



 },
    methods : {


getTracking(id){


axios.get('/api/track/'+this.idcolis)
     .then(response =>
     { 
       
   
this.userPartenaire = response.data.partenaire
this.Client = response.data.colis
this.tracking = response.data.stats
 
     
 }
     ).catch(err => console.log(err));



}





    }  


}
</script>