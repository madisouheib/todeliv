<template>

    
<div>
      
    
<div class="row">
    <div class="col-3">
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
    <div class="col-3">
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
    <div class="col-2"> <label class="badge badge-success" style="font-weight:bold;font-size:18px;padding:10px;"> <i class="fas fa-money-check-alt"></i> {{ this.UserDetail.prices }} DA </label></div>
    <div class="col-3">
    <button class="btn btn-square btn-outline-success" data-toggle="modal" data-target="#ModalValidFiche"  style=""> Validation groupée  <i class="fas fa-check-circle" ></i></button>
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
                        <div class="table-responsive ">

                            <table class="table table-hover table-bordered">
   
                                <thead class="thead-dark">
                                       <tr>
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> wilaya & commune </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> Partenaire </th>
                                        <th class="text-center" ><i class="fas fa-tasks"></i> Status </th>
            
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
             
                                    <tr v-for=" col  in colis.data" :key="col.id_colis"   :style="{ background: col.id_stats == 4 ? '#2dde98'   : '' || col.id_stats == 3 ? '#ff4c4c'  : '' ||   col.id_stats == 10 ? ''  : '#ffc20e'   , color: col.id_stats == 4 ? 'white'  : ''  || col.id_stats == 3 ? 'white'   : '' || col.id_stats == 10 ? ''   : 'white' }"  >
       

                             
                                        <th scope="row" class="text-center" > <b class="badge badge-light" style="font-size:14px;"> #Send-{{ col.id_colis }}   </b> </th>
                                        
                                        <th class="text-center" > <button data-toggle="modal" data-target="#Moodalcolisinfo"  class="btn  btn-glow-dark  btn-square   btn-dark"><i  style="margin:0px;"  class="fas fa-plus"></i></button>   
                                             <a  target="_blank"  :href="'/admin/tracking/'+col.id_colis" class="btn btn-glow-dark btn-dark"> <i style="margin:0px;font-size:1.4em; color:#FFCC00;"  class="fas fa-box"></i></a>
                                        
                                        </th>
                                        <th class="text-center" > <b class="badge badge-light " style="font-size:16px;"> {{ col.price }} DA     </b> </th>
                                        <th class="text-center" > <b class="badge badge-light" style="font-size:14px;"> {{ col.wilaya }} /  {{  col.commune }}   <i class="fas fa-map-marker-alt"></i></b>  </th>
                                        <th class="text-center" > {{ col.name }}  </th>
                                        <th class="text-center" > <b class="badge badge-light" style="font-size:14px;"> {{ col.field_stats }} <i v-if="col.id_stats == 3" class="fas fa-redo-alt "></i>
                                        <i v-else-if="col.id_stats == 4 " class="fas fa-check-circle"></i>

                                        <i v-else-if="col.id_stats == 10 " class="fas fa-shipping-fast"></i>
                                         <i v-else class="fas fa-history "></i>
                                        
                                        
                                         </b> 
                                        
                                            </th>
                          
                                        <th class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn btn-square  btn-glow-dark btn-dark " ><i style="margin:0px;"  class=" fas fa-list-ul"></i></button>         
                        
                                          
                                        </th>
                                     
<td>

 <button class=" btn btn-dark btn-glow-dark" @click="GetIDColis(col.id_colis)" data-toggle="modal" data-target="#ModalColisAction" > Mettre à jour  <i class=" fas fa-dolly"></i>        </button>
                                        </td>

                              
                                    </tr>
                          
                                </tbody>
                            </table>
                                                 <pagination :data="colis" @pagination-change-page="getColis">

    </pagination>
    <valid-modal v-bind:id_liv="UserDetail" >  </valid-modal>
    <action-colis  @colis-added="refreshData()"  v-bind:addstats="addstats"  >    </action-colis>
<stats-colis    ref="childref" >    </stats-colis>
    <view-colis v-bind:ShowColis="ShowColis" ></view-colis>

                        </div>

      </div>
    
</template>





<script>

 import ColisInfos from '../colis/ColisInfos.vue';
  import Stats from '../inhouse/StatsInfos.vue';
   import ActionStats from './EtatColis.vue';
    import ValidFiche from './ValidDelev.vue';

  export default {
     props: ['url_id','user_id'],
 components: {
    
      'view-colis':   ColisInfos,
     'stats-colis': Stats ,
     'action-colis':ActionStats,
     'valid-modal' : ValidFiche 

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
ShowStats : {},



},
UserDetail : {}
 }
  },
 created ()
 {



this.getColis();

this.GetWilayas();
this.getCLients();
this.GetStats();
this.getPrice();

 },
 
 methods:{

     refreshData(){

this.getColis();
this.getPrice();

     },



getPrice(){


     axios.get('/api/livreurdetail/'+this.url_id)
     .then(response =>
     { 
       
   this.UserDetail = response.data
     
 }
     ).catch(err => console.log(err));



},
getColis(page = 1)
 {
     
   




     axios.get('/api/delivliste/'+this.url_id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     
 }
     ).catch(err => console.log(err));


 },

 getColInfos(id){

 axios.get('/api/getColisinfos/'+id)
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
console.log(this.userid);
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