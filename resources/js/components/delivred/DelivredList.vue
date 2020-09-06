<template>
<div>  
    <div class="row">
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-tasks"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">Etat  </option>
<option value="1">Valider</option>
<option value="1">Non Valider</option>
<option value="1">archiver</option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-shipping-fast"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">Livreur  </option>
<option value="1">Bilal</option>
<option value="1">Moustapha</option>
<option value="1">Djamel </option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">HUB  </option>
<option value="1">Bilal</option>
<option value="1">Moustapha</option>
<option value="1">Djamel </option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div class="col col-2">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" ><i class="fas fa-shipping-fast"></i> Livreur </th>
                                       
                                        <th class="text-center" ><i class="fas fa-calendar-minus"></i> Date Sortie </th>
                                        <th class="text-center" ><i class="fas fa-calendar-check"></i> Date Cloture  </th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant total</th>
                                        <th class="text-center" ><i class="fas fa-clipboard-list"></i> Nombre Colis </th>
                   
                                        <th class="text-center" ># Froute-id </th>
                                  

                                        <th class="text-center"><i class="fas fa-align-left"></i> Statut </th>
                                        <th class="text-center"><i class="fas fa-edit"></i> Validation </th>

                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr v-for=" livreur  in deliv.data" :key="livreur.id"  >
                                        <th scope="row" class="text-center" style="width:140px;"   ><a  :href="'/admin/listenliv/'+livreur.id"   style="width:100px;border-radius:0px;"  class="btn btn-primary btn-glow-primary">{{  livreur.name  }}   <i class="fas fa-shipping-fast"></i> </a> </th>
                                        
                                        <th class="text-center" > {{ livreur.created_at | moment  }}   </th>
                                            <th class="text-center" > <i class="fas fa-clock"></i> </th>
                                      <th class="text-center"   > 3600000 DA   </th>
                                      <th class="text-center"  >   {{  livreur.fiche_count  }} </th>
                                        <th class="text-center" > {{ livreur.fiche_count }} {{ livreur.prices }}   </th>
                                
                                        <td class="text-center" ><span class="pcoded-badge label label-warning">En instance   <i class="fas fa-clock"></i> </span></td>
                                        <th class="text-center" ><button class="btn btn-square btn-success btn-sm"> valider <i class="fas fa-check-circle"></i></button></th>

                                     
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
id_user : this.user_id ,
id_fiche : ''



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

     axios.get('/api/getdelivred?page='+page)
     .then(response =>
     { 
       
   this.deliv= response.data
   
     
 }
     ).catch(err => console.log(err));

 },
 
 getLivreur()
 {


     axios.get('/api/getlivreur')
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
