<template>

    
<div>
  
          <button style="float:right;" @click="getColis()" class="  btn btn-success btn-sm btn-glow-success" type="button"> <i style="margin:0px;padding:2px;font-size:1.3em" class="fas fa-sync-alt"></i> </button>

<div class="row">
 
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup"> <i class="fas fa-barcode"></i> </span>
                </div>
                <input type="text" class="form-control" v-model="codebars" @keyup="onBarcodeScanned(codebars)"    id="validationCust" placeholder=" code a bare ...   " aria-describedby="inputGroup" required>
                <div class="invalid-feedback">
                    Please choose a code.
                </div>
            </div>
        </div>
    
    
    
    
    </div>
    

    </div>            
    
    <div class="row"> 
     
                                                   
                          
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            
                                <div class="form-group">
                               
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                            <select class="custom-select" name="" @change="FiltreWilaya(wil)"  required v-model="wil">
    <option       v-for="wilaya in wilayas " :key="wilaya.key"    > {{ wilaya.name}}    </option>
    
</select>

                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                            </div>
    
    
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            
                                <div class="form-group">
                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
                                        </div>
                            <select class="custom-select" @change="FiltreClient(clt)" v-model="clt">
                            <option v-for=" client  in clients "  :key="client.id"  :value="client.id"      >  {{ client.name }}  </option>
                      
                            </select>
                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a type.
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
                            
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            
                                <div class="form-group">
                         
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-tasks"></i> </span>
                                        </div>
                            <select class="custom-select" @change="FiltreUpdate(idstat)"  v-model="idstat"  >
  <option selected >Mise a jour  </option>
                                 <option       v-for="stat in stats " :key="stat.id_stats"  :value=" stat.id_stats "  > {{ stat.field_stats}}    </option>
                          
                        
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
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                            <select @change="FiltreTentatives(tent)" v-model="tent" class="custom-select" >
                            <option value="">Tentatives </option>
            
                            <option value="0">Tentative 1 </option>
                            <option value="1">Tentative 2 </option>
                            <option value="2">Tentative 3 </option>
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
                                        <th class="text-center" ><i class="fas fa-tasks"></i>  HUB </th>
            <th class="text-center">  <i class="fas fa-calendar-alt"></i> Date </th>
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis"  :style="{ background: col.message !== null ? '#ffb900'   : '' ,color: col.message !== null ? '#fff'   : '' } " >
       

                             
                                        <td scope="row" class="text-center" >#send-{{ col.id_colis }}</td>
                                        
                                        <td class="text-center" > <button data-toggle="modal" data-target="#ModalColisInfo" @click="getColInfos(col.id_colis)"  class="btn  btn-sm  btn-glow-info   btn-info"><i  style="margin:0px;"  class="fas fa-user-circle"></i></button></td>
                                        <td class="text-center" > <label class="badge badge-warning" style="font-size:14px;">  {{ col.price }} DA  </label>   </td>
                                        <td class="text-center" >{{ col.wilaya }} /  {{  col.commune }} </td>
                                        <td class="text-center" > {{ col.name }}   </td>
                                        <td class="text-center" >{{ col.nom_hub }}   </td>
                                                    <td class="text-center"><b class="badge badge-light" style="font-size:14px;">{{ col.created_at | moment    }} <br> ( {{ col.created_at | days    }} jours )    </b>   </td>

                                        <td class="text-center" >
                                            <button v-if="col.message  !== null " data-toggle="modal" data-target="#MessageClient"   class=" btn-sm btn btn-dark btn-glow-dark" @click="MessagePert(col.message)"> <i class="fas fa-bell" style="margin:0px;"></i></button>
                                            <button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn btn-sm btn-success btn-glow-success  btn-success " ><i style="margin:0px;"  class=" fas fa-location-arrow"></i></button>         
                        
                                          
                                        </td>
                                     
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
<message-colis v-bind:Message="Message">  </message-colis>
                        </div>

      </div>
    
</template>





<script>

 import ColisInfos from './ColisInfos.vue';
  import Message from './Message.vue';
  import Stats from '../inhouse/StatsInfos.vue';
   import ActionStats from './EtatColis.vue';

  export default {
     props: ['url_id','user_id'],
         filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  },
days: function (date){


var a = moment((date));
var b = moment([]);
return b.diff(a, 'days') // 1
/*
var a = moment((date)).format("DD.MM.YYYY");

var b = moment().format("DD.MM.YYYY") ;
return  a.diff(b,'days') // 1
*/

}

  
},
 components: {
    
      'view-colis':   ColisInfos,
     'stats-colis': Stats ,
     'action-colis':ActionStats,
          'message-colis':Message

  },

     data(){
 return {
colis:{},
checkcolis:{},
codebars:'',
ShowColis: '',
tent :'',
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',
idstat : '',
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


},
Message: ''
 }
  },
 created ()
 {
  this.$barcodeScanner.init(this.onBarcodeScanned);


this.getColis();

this.GetWilayas();
this.getCLients();
this.GetStats();


 } ,destroyed () {
      // Remove listener when component is destroyed
      this.$barcodeScanner.destroy()
    },
 
 methods:{

getColis(page = 1)
 {
     
     axios.get('/api/datafailed/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     this.checkcolis = response.data
 }
     ).catch(err => console.log(err));


 },
 FiltreWilaya(wil){

     
     axios.get('/api/failedwilaya/'+this.user_id+'/'+wil)
     .then(response =>
     { 
       
   this.colis = response.data
     this.checkcolis = response.data
 }
     ).catch(err => console.log(err));


 },
  FiltreUpdate(idstat){

     
     axios.get('/api/failedupdate/'+this.user_id+'/'+idstat)
     .then(response =>
     { 
       
   this.colis = response.data
     this.checkcolis = response.data
 }
     ).catch(err => console.log(err));


 },
  FiltreTentatives(tent){
console.log(tent);

     axios.get('/api/failedtentativ/'+this.user_id+'/'+tent)
     .then(response =>
     { 
       
   this.colis = response.data
     this.checkcolis = response.data
 }
     ).catch(err => console.log(err));


 },
 onBarcodeScanned(codebars) {
this.resetBarcode();



 if(this.codebars !== '' ){





var  DataAll = this.checkcolis.data ;
var code = this.codebars;  
var valObj = DataAll.filter(function(elem){
    if(elem.id_colis == code ) return true;
});
if(valObj.length > 0) {

 if(this.timer) {
                // So we clear and null it so it doesn't contact the api
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                // contact your endpoint here
axios.get('/api/undivcode/'+this.user_id+'/'+code).then( 
    
    response =>
     { 
       
   this.colis = response.data,
     this.codebars = ''
 }
    




).catch(error => console.log(error))
                // Assuming your scanner can emit keystrokes
                // within 100 milliseconds from one another
                // otherwise increase this value as necessary
            }, 100);



}









}
 },
  resetBarcode () {
        let codebars = this.$barcodeScanner.getPreviousCode()
        // do something...
      },
 getColisData(id){


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
       
   this.clients = response.data
     
 }
     ).catch(err => console.log(err));


 },
 FiltreClient(clt){


     axios.get('/api/datafailfiltre/'+this.user_id+'/'+clt)
     .then(response =>
     { 
       
   this.colis = response.data
     
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
MessagePert(mess){

this.Message = mess ;




 } ,
 GetIDColStats(id){


this.id_colis = id  ; 
Stats.methods.getstats(id)

 }
 
 }


     }

      


</script>