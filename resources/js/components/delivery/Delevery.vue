<template>
<div>  
    <div class="row">

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
     
   <div class="form-group">
                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
                                        </div>
                            <select class="custom-select" @change="Filtreclient(coursier)"  v-model="coursier">
                            <option v-for=" liv  in livreur  " :key="liv.id"  :value="liv.id"     >  {{ liv.name }}  </option>
                      
                            </select>
                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <a :href="'/admin/exportdeliv'" class="btn btn-success"> Export Excel <i class="fas fa-file-excel"></i> </a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
<select class="custom-select" required>
<option v-for=" hub  in hubs" :key="hub.id_hub"  :value="hub.id_hub"> {{ hub.nom_hub }}  </option>

</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="form-group">
             
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-calendar-alt"></i> </span>
            </div>
            <input type="text" id="date" class="form-control" placeholder="Date">
            <div class="invalid-feedback">
                Please choose a date.
            </div>
        </div>
    </div>
</div>


  
</div>
     <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" ><i class="fas fa-shipping-fast"></i> Livreur </th>
                                       
                                        <th class="text-center" ><i class="fas fa-calendar-minus"></i> Date Sortie </th>
                                        <th class="text-center" ><i class="fas fa-calendar-check"></i> Date Cloture  </th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant total</th>
                                        <th class="text-center" ><i class="fas fa-clipboard-list"></i> Nombre Colis </th>
                   
                                        <th class="text-center"><i class="fas fa-align-left"></i> Statut </th>
                                         <th class="text-center" ># Exporter </th>
                             
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr v-for=" livreur  in deliv.data" :key="livreur.id"  >
                                        <th scope="row" class="text-center" style="width:140px;"   ><a  :href="'/admin/listenliv/'+livreur.id"   style="width:250px;"  class="pcoded-badge btn btn-glow-primary btn-primary"> <i class=" fas fa-list"> </i>  {{  livreur.name  }}   <i class="fas fa-shipping-fast"></i> </a> </th>
                                        
                                        <th class="text-center" > {{ livreur.created_at | moment }}   </th>
                                            <th class="text-center" > <i class="fas fa-clock"></i> </th>
                                      <th class="text-center"   >  <label class="badge badge-warning " style="font-size:16px;">   {{ livreur.prix }}  DA     </label>  </th>
                                      <th class="text-center"  >  <label class="badge badge-dark " style="font-size:14px;">    {{ livreur.deliv_count }} </label></th>
                                                                              <td class="text-center" ><span class="pcoded-badge label label-success label-glow-success">En Livraison   <i class="fas fa-shipping-fast"></i> </span></td>
                                                                               <th class="text-center" > <a :href="'/admin/exportondeliv/'+livreur.id" class="btn btn-outline-success"> <i  style="margin:0px;"  class="fas fa-file-excel"></i> </a> <a target="_blank"  :href="'/admin/fichepdf/'+livreur.id"   class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </a>  </th>

                                



                                     
                                    </tr>
                              
                                 
                      
                                </tbody>
                            </table>
                        </div>
</div>
</template>


<script>


  export default {
     props: ['user_id'],
     filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},
 components: {

  },

     data(){
 return {
deliv:{},
livreur: {},
hubs : {},
coursier : '',
id_user : this.user_id ,
id_fiche : '',
idliv : '',
hubs : {}



 }
  },
 created ()
 {



this.getDelivery();
this.getLivreur();
this.GetHubs();
this.getStats();
 },
 
 methods:{

getDelivery(page = 1)
 {
var id = this.id_user ; 

     axios.get('/api/ondelevery/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.deliv= response.data
   
     
 }
     ).catch(err => console.log(err));

 }
 ,
 GetHubs()
 {


     axios.get('/api/huball')
     .then(response =>
     { 
       
   this.hubs= response.data
   
     
 }
     ).catch(err => console.log(err));

 },
 Filtreclient(coursier){

     axios.get('/api/fetchdeliv/'+coursier)
     .then(response =>
     { 
       
   this.deliv= response.data
   
     
 }
     ).catch(err => console.log(err));
 },
 getLivreur()
 {


     axios.get('/api/getlivreur/'+this.user_id)
     .then(response =>
     { 
       
   this.livreur= response.data
   
     
 }
     ).catch(err => console.log(err));

 },
 
 
  getStats(id)
 {


     axios.get('/api/enlivstats/'+id)
     .then(
         
          function (response){
          return response.data; 
      }
         
    
     ).catch(err => console.log(err));

 },

GetHubs()
 {


     axios.get('/api/huball')
     .then(response =>
     { 
       
   this.hubs= response.data
   
     
 }
     ).catch(err => console.log(err));

 }

 ,
   Get(id){


this.idcoms = id ;





 },
 GetIdFiche(id){

this.id_fiche = id ; 

 }

 }


     }

      


</script>
