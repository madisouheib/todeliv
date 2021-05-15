<template>
    <div>
      <button style="float:right;" @click="getFroute()" class="  btn btn-success btn-sm shadow-1" type="button"> <i style="margin:0px;padding:2px;font-size:1.3em" class="fas fa-sync-alt"></i> </button>

<div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="float-right">
        <button class="btn shadow-1 btn-success btn-sm"  data-toggle="modal" data-target="#Modaladdfroute"  > Ajouter une Feuille de route   <i class="fas fa-plus-square"></i> </button>
    </div>
    </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-tasks"></i> </span>
            </div>
<select class="custom-select" @change="getFrouteFiltre(idstatfiche)"  v-model="idstatfiche" required>
<option value="">Etat  </option>
<option value="1">Valider</option>
<option value="2">Non Valider</option>
<option value="3">archiver</option>
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
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-shipping-fast"></i> </span>
            </div>
<select class="custom-select" v-model="livr" @change="FiltreFicheLivr(livr)" required>
<option v-for=" liv  in livreur" :key="liv.id"  :value="liv.id"> {{ liv.name }}  </option>

</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>
</div>
<div v-if="this.user_id == 3" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
     
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
                            <table class="table table-hover">
                                <thead class="">
                                    <tr >
                                        <th class="text-center" ># Froute-id </th>
                                        <th class="text-center" ><i class="fas fa-calendar-minus"></i> Date Sortie </th>
                                        <th class="text-center" ><i class="fas fa-calendar-check"></i> Date Cloture  </th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant total</th>
                                        <th class="text-center" ><i class="fas fa-clipboard-list"></i> Nombre </th>
                   

                                        <th class="text-center" ><i class="fas fa-shipping-fast"></i> Livreur </th>


                                        <th class="text-center"><i class="fas fa-edit"></i> Validation </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Exportation </th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr  v-for=" fiche  in froute.data" :key="fiche.id_fiche" >
                                        <td scope="row" class="text-center" >
                                            
                                            
                                            
                            <a  v-if="fiche.valid_fiche == false" :href="'/admin/listdelivery/'+fiche.id_fiche" class="pcoded-badge btn btn-glow-warning btn-warning" style="color:white" >#Froute- {{ fiche.id_fiche }}   <i class="fas fa-list"></i> <i class="fas fa-clock"></i> </a>

                            <a  v-else  class="pcoded-badge btn-primary btn-glow-primary btn" style="color:white" >#Froute- {{ fiche.id_fiche }}   <i class="fas fa-list"></i>  <i class="fas fa-boxes"></i> </a>
                            
                            
                             </td>
                                        
                                        <td class="text-center" > {{  fiche.created_at | moment  }}</td>
                                            <td class="text-center" > <i class="fas fa-clock" style="color:#ffc845;font-size:1.6em;"></i> </td>
                                      <td class="text-center"   v-if="fiche.prices == null " > Fiche vide  </td>
                                           <td class="text-center"   v-else > {{fiche.prices }} DA  </td>
                                      <td class="text-center"   >{{fiche.fichecolis_count }}   </td>
                                        <td class="text-center" > {{ fiche.livreur }} </td>
                                
                                     
                                        <td class="text-center" >
                                            <button  v-if="fiche.valid_fiche == false && fiche.fichecolis_count > 0  "   data-toggle="modal" data-target="#ModalValidFiche"   class="btn btn-glow-success btn-success" @click="GetIdFiche(fiche.id_fiche)" > valider <i class="fas fa-check-circle"></i></button>

                                            <button  v-if=" fiche.fichecolis_count == 0  "    class="btn btn-glow-dark btn-dark" disabled > valider <i class="fas fa-check-circle"></i></button>

                                  <h6 v-if="fiche.valid_fiche == true " style="color:green; color:#2dde98;">  <b>  Valider <i class=" fas fa-check-circle"></i>  </b> </h6>
                                        </td>
                                        <td class="text-center" > <a class="btn btn-outline-success" :href="'/admin/exportfiche/'+fiche.id_fiche"  > <i  style="margin:0px"  class="fas fa-file-excel"></i> </a> <a target="_blank"  :href="'/admin/fichepdf/'+fiche.id_fiche"   class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </a>  </td>
                                     
                                    </tr>



                                 
                      
                                </tbody>
                            </table>
                   <valid-fiche  @fiche-edited="getFroute()" v-bind:id_fiche="id_fiche">    </valid-fiche>
                        <add-fiche @fiche-added="getFroute()" v-bind:id_user="id_user">   </add-fiche>
<unlink-fiche @fiche-edited="getFroute()" v-bind:id_fiche="id_fiche"  >   </unlink-fiche>
       <pagination :data="froute" 
  @pagination-change-page="getFroute"> </pagination>        
                        </div>
                   

</div>
</template>




<script>

 import AddFiche from './AddFiche.vue';
  import ValidFiche from './ValidFiche.vue';
  import UnlinkFiche from './UnlinkFiche.vue';
  export default {
     props: ['user_id'],
     filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},
 components: {
'add-fiche': AddFiche ,
'valid-fiche': ValidFiche,
'unlink-fiche':UnlinkFiche
  },

     data(){
 return {
froute:{},
livreur: {},
livr:'',
hubs : {},
id_user : this.user_id ,
id_fiche : '',
idstatfiche : ''



 }
  },
 created ()
 {



this.getFroute();
this.getLivreur();
this.GetHubs();
 },
 
 methods:{

getFroute(page = 1)
 {


     axios.get('/api/getfroute/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.froute= response.data
   
     
 }
     ).catch(err => console.log(err));

 },
 getFrouteFiltre(id,page = 1 ){

  axios.get('/api/getfiltrefroute/'+id+'?page='+page)
     .then(response =>
     { 
       
   this.froute= response.data
   
     
 }
     ).catch(err => console.log(err));


 },
 FiltreFicheLivr(livr){

 axios.get('/api/getfichebyliv/'+livr)
     .then(response =>
     { 
       
   this.froute= response.data
   
     
 }
     ).catch(err => console.log(err));



 }
 
 
 ,
 
 getLivreur()
 {


     axios.get('/api/getlivreur/'+this.user_id)
     .then(response =>
     { 
       
   this.livreur= response.data
   
     
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