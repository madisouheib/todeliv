<template>

    
<div>
  
          <button style="float:right;" @click="getColis()" class="  btn btn-success btn-sm btn-glow-success" type="button"> <i style="margin:0px;padding:2px;font-size:1.3em" class="fas fa-sync-alt"></i> </button>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"> <i class="fab fa-searchengin"></i> </span>
                </div>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder=" Tracking id ...  "  @keyup="onBarcodeScanned"  v-model="codebars"  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a traciing.
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
                            <select class="custom-select" name=""  @change="FiltreWilaya(wil)" required v-model="wil">
    <option       v-for="wilaya in wilayas " :key="wilaya.key"   > {{ wilaya.name}}    </option>
    
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
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tag"></i> </span>
                                            </div>
                                <select class="custom-select" required v-model="idliv" @change="FiltreRetour(idliv)">
                                <option value="">Coursier </option>
                            <option v-for=" liv  in coursiers" :key="liv.id"  :value="liv.id"> {{ liv.name }}  </option>
                                </select>
                                
                                          
                                            <div class="invalid-feedback">
                                                Please choose a Coursier.
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
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                            <select v-model="tent" @change="FiltreTentatives(tent)" class="custom-select" required>
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
                       
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

<button class="btn btn-danger" data-toggle="modal" data-target="#ModalValidRetour"  type="submit" > validation groupée <i class="fas fa-check-circle"></i> </button>

</div>


                                                </div>
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered">
   
                                <thead class="thead-dark">
                                       <tr>
                                                   <th class="text-center" > </th>
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> Infos</th>
                                                    <th class="text-center" ><i class="fas fa-user-circle"></i> Client</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> Wilaya  </th>
                            
        <th class="text-center"><i class="fas fa-calendar-alt"></i> Date Validation </th>
            
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" col  in colis" :key="col.id_colis" >
       
<td> 
    <div  class="checkbox checkbox-fill d-inline" >   
                                         <input   type="checkbox" :name="'checkbox-fill-'+col.id_colis" :id="'checkbox-fill-'+col.id_colis" >
                                                         <label :for="'checkbox-fill-'+col.id_colis" class="cr"></label>  


</div>
      </td>
                             
                                        <td scope="row" class="text-center" > <label class="badge badge-light" style="font-size:14px;">  #send-{{ col.id_colis }} </label></td>
                                        
                                        <td class="text-center" > <button data-toggle="modal" data-target="#ModalColisInfo" @click="getColInfos(col.id_colis)"   class="btn btn-sm   btn-glow-primary   btn-primary"><i  style="margin:0px;font-size:1.3em;"  class="fas fa-search-plus" ></i></button> 
                                        <a  target="_blank"  :href="'/admin/tracking/'+col.id_colis" class="btn btn-glow-dark btn-sm  btn-dark"> <i style="margin:0px;font-size:1.4em; color:#FFCC00;"  class="fas fa-box"></i></a></td>
                                                  <td class="text-center" > <label class="badge badge-light" style="padding:10px;font-size:14px;">  {{ col.nom_client }}  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-danger" style="font-size:16px;">   {{ col.price }}  DA  </label> </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:15px;"> {{ col.wilaya }}   <i class="fas fa-map-marker-alt"></i>  </label> </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:15px;" >{{ col.updated_at | moment   }} </label>    </td>
                              
                          
                                        <td class="text-center" >
                                            <button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn btn-glow-success  btn-sm btn-success " ><i style="margin:0px;font-size:1.3em;"  class=" fas fa-tasks"></i></button>         
                                                                    <button data-toggle="modal" data-target="#ModalCashByOne" @click="$refs.childcash.dataAction(col.id_colis,userid)" class="btn btn-sm btn-glow-success  btn-success " ><i style="margin:0px;padding:2px;font-size:1.3em;"  class=" fas fa-money-check-alt"></i></button>         

                                          
                                        </td>
                                     


                                     
                                    </tr>
                          
                                </tbody>
                            </table>
                          


   <view-colis v-bind:ShowColis="ShowColis" ></view-colis>
           
<stats-colis    ref="childref" >    </stats-colis>
<valid-retour @fiche-edited="getColis()" >    </valid-retour>
                        </div>

      </div>
    
</template>





<script>

 import ColisInfos from './ColisInfos.vue';
 import ValidRetour from './ValidRetour.vue';

  import Stats from './StatsInfos.vue';


  export default {
     props: ['url_id','user_id'],
         filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},
 components: {
    
      'view-colis':   ColisInfos,
     'stats-colis': Stats ,
     'valid-retour': ValidRetour 



  },

     data(){
 return {
colis:{},
codebars:'',
ShowColis: {},
checkcolis:{},
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',
tent :'',
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
colisvalid :{
id_colis :'',
iduser :''



},
colisvalidgp:{
idliv :'',
iduser :''



},
prices : '',
coursiers : {},
idliv : ''



 }
  },
 created ()
 {


 this.$barcodeScanner.init(this.onBarcodeScanned);
this.getColis();

this.GetWilayas();
this.getCLients();
this.GetStats();
this.getCoursier();

 },
 
 methods:{

getColis(page = 1)
 {
     
   




     axios.get('/api/returned/'+this.user_id)
     .then(response =>
     { 
       
this.colis = response.data['colis'];
this.prices = response.data['amount'];
     this.checkcolis =response.data['colis'];
 }
     ).catch(err => console.log(err));


 },

FiltreTentatives(tent){




     axios.get('/api/refiltrtent/'+tent+'/'+this.user_id)
     .then(response =>
     { 
       
this.colis = response.data['colis'];
this.prices = response.data['amount']
     
 }
     ).catch(err => console.log(err));


}
 ,
 
 
 FiltreWilaya(wil){




     axios.get('/api/retourwils/'+wil+'/'+this.user_id)
     .then(response =>
     { 
       
this.colis = response.data['colis'];
this.prices = response.data['amount']
     
 }
     ).catch(err => console.log(err));


}
 
 ,
 
 FiltreRetour(id){




     axios.get('/api/retourliv/'+id+'/'+this.user_id)
     .then(response =>
     { 
       
this.colis = response.data['colis'];
this.prices = response.data['amount']
     
 }
     ).catch(err => console.log(err));


}
 
 ,
 getColisData(id){


this.getColis();
 },
 
onBarcodeScanned(codebars) {
this.resetBarcode();



 if(this.codebars !== '' ){





var  DataAll = this.checkcolis ;
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
axios.get('/api/coderetour/'+code).then( 
    
    response =>
     { 
       
   this.colis = response.data['colis'],
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
 getColInfos(id){

 axios.get('/api/getcolisinfos/'+id)
     .then(response =>
     { 
       
   this.ShowColis = response.data

 }
     ).catch(err => console.log(err));


 },
 getCoursier()
 {



     axios.get('/api/getlivreur/'+this.user_id)
     .then(response =>
     { 
       
   this.coursiers= response.data
   
     
 }
     ).catch(err => console.log(err));


 }
 ,
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

 GetIDColiGP(){

this.colisvalidgp.idliv = this.idliv ;

this.colisvalidgp.iduser = this.user_id ;


 },
 GetIDColStats(id){


this.id_colis = id  ; 
Stats.methods.getstats(id)

 }
 
 }


     }

      


</script>