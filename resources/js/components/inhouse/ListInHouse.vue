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
                <input type="text" class="form-control" @keyup="onBarcodeScanned"  v-model="codebars" id="validationCust" placeholder=" code a bare   " aria-describedby="inputGroup" required>
                <div class="invalid-feedback">
                    Please choose a code.
                </div>
            </div>
        </div>
    
    
    
    
    </div>
       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

           <a :href="'/admin/exportinhouse'" class="btn btn-glow-success btn-sm btn-success" > Export Excel <i class="fas fa-file-excel"></i></a>
       </div>
  
    </div>            
    
    <div class="row"> 
     
                                                   
                          
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            
                                <div class="form-group">
                               
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                            <select class="custom-select"  @change="FiltreWilaya(wil)"  v-model="wil" >

    <option   value="all" > Tout   </option>
    <option   v-for="wilaya in wilayas " :key="wilaya.key"   > {{ wilaya}}    </option>

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
                            <select class="custom-select" @change="Filtreclient(clt)"  v-model="clt">
                            <option v-for=" client  in clients  " :key="client.id"  :value="client.id"     >  {{ client.full_name }}  </option>
                      
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
                                        <input type="text" id="date" class="form-control" placeholder="Date ">
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
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                            <select class="custom-select" @change="Tentatives(tent)"  v-model="tent">
                            <option value="">Tentatives </option>
            
                            <option value="0">Tentative 0 </option>
                            <option value="1">Tentative 1 </option>
                            <option value="2">Tentative 2 </option>
                            </select>
                                         <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                            </div>



                                                </div>
                        <div class="table-responsive">

                            <table class="table   table-hover ">
   
                                <thead class="">
                                       <tr>
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> Adresse </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> Partenaire </th>
                                        <th class="text-center" ><i class="fas fa-warehouse"></i> HUB </th>
                                             <th class="text-center" ><i class="fas fa-calendar-alt"></i> Date </th>
            
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis" >
       

                             
                                        <td scope="row" class="text-center first" > <label class="badge badge-light" style="font-size:14px;">  #send-{{ col.id_colis }} </label></td>
                                        
                                        <td style=""   class="text-center" > <button  data-toggle="modal" data-target="#Moodalcolisinfo" @click="getColInfos(col.id_colis)"   class="btn   btn-sm shadow-1   btn-primary"><i  style="margin:0px;"  class="fas fa-box-open" ></i></button> 
                                        <a   target="_blank"  :href="'/admin/tracking/'+col.id_colis" class="btn shadow-1 btn-info btn-sm"> <i style="margin:0px;color:#fff;"  class="fas fa-route"></i></a></td>
                                        <td class="text-center" > <label class="badge badge-dark" style="font-size:16px; color:#f1f5f8;">   {{ col.price }}  DA  </label> </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:15px;margin:0px;"> {{ col.wilaya }} <br>  {{  col.commune }}    </label> </td>
                                        <td class="text-center" > {{ col.name }}    </td>
                                        <td class="text-center" >{{ col.nom_hub }}   </td>
                                                                                             <td class="text-center" > <label class="badge badge-light" style="font-size:15px;" >{{ col.created_at | moment    }} <br> ( {{ col.created_at | days    }} jours ) </label>    </td>        
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn shadow-1  btn-success btn-sm " ><i style="margin:0px;font-size:1.3em;"  class=" fas fa-tasks"></i></button>         
                        
                                          
                                        </td>
  
<td class="last">

 <button class=" btn btn-primary shadow-1 btn-sm" style="background-color:#214090;border:1px solid #214090;" @click="GetIDColis(col.id_colis)" data-toggle="modal" data-target="#ModalColisAction" > Dispatcher  <i class=" fas fa-dolly-flatbed"></i>        </button>
                                        </td>

                                     
                                    </tr>
                          
                                </tbody>
                            </table>
                                                 <pagination :data="colis" @pagination-change-page="getColis">

    </pagination>

    <action-colis @colis-added="getColisData(response)"   v-bind:addstats="addstats"  >    </action-colis>
            <view-colis v-bind:ShowColis="ShowColis" ></view-colis>
<stats-colis    ref="childref" >    </stats-colis>


                        </div>

      </div>
    
</template>





<script>

 import ColisInfos from './ColisInfos.vue';
  import Stats from './StatsInfos.vue';
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
     'action-colis':ActionStats

  },

     data(){
 return {

colis:{},
ShowColis: '',
checkcolis :{},
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',
codebars : '',
tent : '',
clients : {},
wilayas : {},
tentative : '',
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


   this.$barcodeScanner.init(this.onBarcodeScanned);
this.getColis();

this.GetWilayas();
this.getClients();


this.getColInfos();
 },
 
 methods:{

getColis(page = 1)
 {
     
   




     axios.get('/api/inhouse/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     this.checkcolis = response.data
 }
     ).catch(err => console.log(err));


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
 Filtreclient(clt){
axios.get('/api/byclienth/'+clt+'/'+this.user_id)
     .then(response =>
     { 
       
   this.colis = response.data
     
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
 FiltreWilaya(wil){

axios.get('/api/bywilayah/'+wil+'/'+this.user_id)
     .then(response =>
     { 
       
   this.colis = response.data
     
 }
     ).catch(err => console.log(err));


 },
 getClients(){

 axios.get('/api/getclients')
     .then(response =>
     { 
       
   this.clients = response.data
     
 }
     ).catch(err => console.log(err));


 },
 Tentatives(tent){

axios.get('/api/bytentative/'+tent+'/user/'+this.user_id)
     .then(response =>
     { 
       
   this.colis = response.data
     
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
axios.get('/api/codehouse/'+code+'/'+this.user_id).then( 
    
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
 GetWilayas(){




 axios.get('/api/getwils')
     .then(response =>
     { 
       
   this.wilayas = response.data
     
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