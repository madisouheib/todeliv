<template>

    
<div>
  
    
<div class="row">
    <div class="col-4">
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"> <i class="fab fa-searchengin"></i> </span>
                </div>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder=" tracking id  " aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a traciing.
                </div>
            </div>
        </div>
    
    
    
    
    </div>
    <div class="col-4">
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup"> <i class="fas fa-barcode"></i> </span>
                </div>
                <input type="text" class="form-control" id="validationCust" placeholder=" code a bare   " aria-describedby="inputGroup" required>
                <div class="invalid-feedback">
                    Please choose a code.
                </div>
            </div>
        </div>
    
    
    
    
    </div>
    
    <div class="col-3">
    <button class="btn btn-square btn-outline-success" style=""> Validation groupée  <i class="fas fa-check-circle" ></i></button>
    </div>
    </div>            
    
    <div class="row"> 
     
                                                   
                          
                            <div class="col-2">
                            
                                <div class="form-group">
                               
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                            <select class="custom-select" name="" required v-model="wil">
    <option       v-for="wilaya in wilayas " :key="wilaya.key"  :value=" wilaya.key  "  > {{ wilaya.name}}    </option>
    
</select>

                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                            </div>
    
    
                            <div class="col-2">
                            
                                <div class="form-group">
                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
                                        </div>
                            <select class="custom-select" required v-model="clt">
                            <option v-for=" client  in clients " :key="client.id"  :value="client.id"      >  {{ client.name }}  </option>
                      
                            </select>
                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-2">
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
                            
                            <div class="col-2">
                            
                                <div class="form-group">
                         
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-tasks"></i> </span>
                                        </div>
                            <select class="custom-select" required>
  <option selected >Mise a jour  </option>
                                 <option       v-for="stat in stats " :key="stat.id_stats"  :value=" stat.id_stats "  > {{ stat.field_stats}}    </option>
                          
                        
                            </select>
                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a one.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                            
                                <div class="form-group">
                       
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                            <select class="custom-select" required>
                            <option value="">Tentatives </option>
            
                            <option value="1">Tentative 1 </option>
                            <option value="2">Tentative 2 </option>
                            <option value="3">Tentative 3 </option>
                            </select>
                                         <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                            </div>



                                                </div>
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered">
   
                                <thead class="thead-dark">
                                       <tr>
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> Infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> Wilaya & commune </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> Partenaire </th>
                                        <th class="text-center" ><i class="fas fa-tasks"></i> Valider par HUB </th>
            
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis" >
       

                             
                                        <th scope="row" class="text-center" >#send-{{ col.id_colis }}</th>
                                        
                                        <th class="text-center" > <button data-toggle="modal" data-target="#ModalColisInfo" @click="getColInfos(col.id_colis)"  class="btn  btn-sm  btn-glow-info   btn-info"><i  style="margin:0px;"  class="fas fa-plus"></i></button></th>
                                        <th class="text-center" > <label class="badge badge-warning" style="font-size:14px;">  {{ col.price }} DA  </label>   </th>
                                        <th class="text-center" >{{ col.wilaya }} /  {{  col.commune }} </th>
                                        <th class="text-center" > {{ col.name }}   </th>
                                        <th class="text-center" >{{ col.nom_hub }}   </th>
                          
                                        <th class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn btn-sm btn-success btn-glow-success  btn-success " ><i style="margin:0px;"  class=" fas fa-list-ul"></i></button>         
                        
                                          
                                        </th>
                                     
<td>

 <button class=" btn btn-dark btn-glow-dark btn-sm" @click="GetIDColis(col.id_colis)" data-toggle="modal" data-target="#ModalColisAction" > Dispatcher  <i class=" fas fa-dolly-flatbed"></i>        </button>
                                        </td>

                                     
                                    </tr>
                          
                                </tbody>
                            </table>
                                                 <pagination :data="colis" @pagination-change-page="getColis">

    </pagination>
    <action-colis @colis-added="getColisData(response)"   v-bind:addstats="addstats"  >    </action-colis>
<stats-colis    ref="childref" >    </stats-colis>
    <view-colis v-bind:ShowColis="ShowColis" ></view-colis>

                        </div>

      </div>
    
</template>





<script>

 import ColisInfos from './ColisInfos.vue';
  import Stats from '../inhouse/StatsInfos.vue';
   import ActionStats from './EtatColis.vue';

  export default {
     props: ['url_id','user_id'],
 components: {
    
      'view-colis':   ColisInfos,
     'stats-colis': Stats ,
     'action-colis':ActionStats

  },

     data(){
 return {
colis:{},

ShowColis: '',
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',
clients : {},
wilayas : {},
wil : '',
clt:'',
stats : {},
id_colis: '',
addstats :{
id_colis :'',
userid: '',
ShowStats : {},
success: '' ,
danger : '' ,
warning : '' 


}
 }
  },
 created ()
 {



this.getColis();

this.GetWilayas();
this.getCLients();
this.GetStats();


 },
 
 methods:{

getColis(page = 1)
 {
     
   




     axios.get('/api/datafailed?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     
 }
     ).catch(err => console.log(err));


 },
 getColisData(id){
console.log(id);

this.getColis();
 },

 getColInfos(id){

 axios.get('/api/getcolisinfos/'+id)
     .then(response =>
     { 
       
   this.ShowColis = response.data
     
 }
     ).catch(err => console.log(err));


 },
 getComInfos(){

 axios.get('/api/getCominfos/'+this.idcom)
     .then(response =>
     { 
       
   this.ShowCom = response.data
     
 }
     ).catch(err => console.log(err));


 }
 ,
 getCLients(){

 axios.get('/api/getclients')
     .then(response =>
     { 
       
   this.cLients = response.data
     
 }
     ).catch(err => console.log(err));


 },
 GetWilayas(){




 axios.get('/api/getwilayas')
     .then(response =>
     { 
       
   this.wilayas = response.data
     
 }
     ).catch(err => console.log(err));

 },
  GetStats(){




 axios.get('/api/getstats')
     .then(response =>
     { 
       
   this.stats = response.data
     
 }
     ).catch(err => console.log(err));

 },

 GetIDColis(id){

this.addstats.id_colis = id ;

this.addstats.userid = this.user_id ;


 },
 GetIDColStats(id){


this.id_colis = id  ; 
Stats.methods.getstats(id)

 }
 
 }


     }

      


</script>