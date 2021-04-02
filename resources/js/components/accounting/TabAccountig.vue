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
                    Please choose a tracking.
                </div>
            </div>
        </div>
    
    
    
    
    </div>
<div class="col-2">

     <span class="badge badge-success badge-glow-success" style="font-size:16px;padding:10px;"> T-Payé :  {{ this.prices }} DA <i class="fas fa-money-check"></i>  </span>

</div>
<div class="col-3">

     <span class="badge badge-danger badge-glow-danger" style="font-size:16px;padding:10px;margin-left:4px;"> T-Retour :  {{ this.retour }} DA <i class="fas fa-money-check"></i>  </span>

</div>
<div class="col-3">

<input class="form-control" type="number" name=""  @focusout="PushAll(livprices)" v-model="livprices" placeholder="Saisie prix de livraison global .. ">
</div>
    
</div>
    
    <div class="row"> 
     
                              <div class="col-2">

<div class="form-group">
                         
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
                                            </div>
                                <select class="custom-select" required @change="getColis()" v-model="idprt" >
                                <option value="">Partenaire </option>
                            <option v-for=" client  in clients" :key="client.id"  :value="client.id"> {{ client.name }}  </option>
                                </select>
                                
                                          
                                            <div class="invalid-feedback">
                                                Please choose a Coursier.
                                            </div>
                                        </div>
                                    </div>

    </div>

                     
                          
                            <div class="col-2">
                            
                                <div class="form-group">
                               
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                            <select class="custom-select" name="" @change="getColis()" required v-model="wil">
    <option       v-for="wilaya in wilayas " :key="wilaya.key"   > {{ wilaya.name}}    </option>
    
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
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-lightbulb  "></i> </span>
                                            </div>
                                <select class="custom-select" @change="getColis()"  v-model="etat" required >
                                <option value="">Etat </option>
                                <option value="13">  Retour </option>
                                          <option value="12">  Livré </option>
                                </select>
                                
                                          
                                            <div class="invalid-feedback">
                                                Please choose a Coursier.
                                            </div>
                                        </div>
                                    </div>

    </div>

 
<div  v-if="showbtn == true && datainsert.length > 0  "  class="col-3" >
    

<div class="form-group">
                         
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-lightbulb  "></i> </span>
                                            </div>
                                <select class="custom-select" @change="ChangeVal()"  v-model="idaccount" required >
                                   <option       v-for="part in partenaires " :key="part.key " :value="part.id_accounting"   > #Facture-{{ part.id_accounting }} {{ part.name}}    </option>
                                </select>
                                
                                          
                                            <div class="invalid-feedback">
                                                Please choose a Coursier.
                                            </div>
                                        </div>
                                    </div>

</div>
   <div class="col-2">
<button v-if="ShowUpdate == true"  class="btn btn-success btn-glow-success" @click="UpdateFacture()"> Mis à jour <i class="fas fa-sync"></i> </button>


</div>
                            
                           
                            
                       

                                                </div>
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered">
   
                                <thead class="thead-dark">
                                       <tr>
                                         
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> Infos</th>
                                                    <th class="text-center" ><i class="fas fa-user-circle"></i> Client</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> Wilaya  </th>
                            
        <th class="text-center"><i class="fas fa-calendar-alt"></i> Date validation </th>
            
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>

                                        <th class="text-center"><i class="fas fa-money-check"></i> Tarif </th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis" >
       

                             
                                        <td scope="row" class="text-center" >


  <div class="form-group">
                                    <div  class="checkbox checkbox-fill d-inline" >   
                                         <input   type="checkbox" 
   v-model="datainsert" :value="{'key':col.id_colis , 'price':col.shipping_price }  " :name="'checkbox-fill-'+col.id_colis" :id="'checkbox-fill-'+col.id_colis" >
                                 <label :for="'checkbox-fill-'+col.id_colis" class="cr"> #Send-{{ col.id_colis }}  </label>  
                               </div>
                          </div>   

                                        </td>
                                        
                                        <td class="text-center" > <button data-toggle="modal" data-target="#ModalColisInfo" @click="getColInfos(col.id_colis)"   class="btn btn-sm  btn-glow-primary   btn-primary"><i  style="margin:0px;font-size:1.3em;"  class="fas fa-user-circle" ></i></button> 
                                        <a  target="_blank"  :href="'/admin/tracking/'+col.id_colis" class="btn  btn-sm btn-glow-dark btn-dark"> <i style="margin:0px;font-size:1.4em; color:#FFCC00;"  class="fas fa-box"></i></a></td>
                                                  <td class="text-center" > <label class="badge badge-light" style="padding:10px;font-size:14px;">  {{ col.nom_client }}  </label>  </td>

                                        <td  v-if="col.id_stats == 12" class="text-center" > <label class="badge badge-success" style="font-size:16px;">   {{ col.price }}  DA  </label> </td>
                                                                                <td  v-if="col.id_stats == 13" class="text-center" > <label class="badge badge-danger" style="font-size:16px;">   {{ col.price }}  DA  </label> </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:15px;"> {{ col.wilaya }}   <i class="fas fa-map-marker-alt"></i>  </label> </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:15px;" >{{ col.updated_at | moment   }} </label>    </td>
                              

                                        <td class="text-center" >
                                            <button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn btn-glow-success btn-sm  btn-success " ><i style="margin:0px;font-size:1.3em;"  class=" fas  fa-location-arrow"></i></button>         
                                                                   

                                          
                                        </td>
                                                               <td> <input name="price"  @blur="PushData(col.id_colis,col.shipping_price)"  class="form-control" v-model="col.shipping_price" type="number" 
 style="width:100px;" placeholder="Prix.. ">   </td>


                                     
                                    </tr>
                          
                                </tbody>
                            </table>
                          


   <view-colis v-bind:ShowColis="ShowColis" ></view-colis>
           
<stats-colis    ref="childref" >    </stats-colis>

                        </div>

      </div>
    
</template>





<script>

 import ColisInfos from './ColisInfos.vue';

  import Stats from './StatsInfos.vue';


  export default {
     props: ['user_id'],
         filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},

 
 components: {
    
      'view-colis':   ColisInfos,
     'stats-colis': Stats 



  },

     data(){
 return {
colis:{},
datainsert : [],
ShowColis: {},
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',

seenfiches: false , 
idprt:false,
clients : {},
wilayas : {},
ShowUpdate :false ,
wil : false,
retour:'',
clt:'',
showbtn:false,
livprice :'',
etat:false,
stats : {},
id_colis: '',
fiches : {},
colisvalid :{
id_colis :'',
iduser :''
},
colisvalidgp:{
idliv :'',
iduser :''
},
prices : '',
completed:false,
coursiers : {},
idliv : '',
livprices:'',
idaccount:'',
partenaires:{},
filteredLivreur: []



 }
  },
 created ()
 {

this.GetWilayas();
this.getCLients();
this.GetStats();

this.getColis();




 },
 
 
 methods:{

getColis(page = 1)
 {
     
   if(this.idprt !== false){

       this.showbtn = true ;
       this.GetPartenaire(this.idprt);
   }

     axios.get('/api/afterdelivred/'+this.idprt+'/'+this.etat+'/'+this.wil)
     .then(response =>
     { 
       
this.colis = response.data['colis'];
this.prices = response.data['amount']
this.retour = response.data['retour']
     
 }
     ).catch(err => console.log(err));


 } ,
 ChangeVal(){
this.ShowUpdate = true ;

 },
 UpdateFacture(){

axios.patch('/api/updprices/',{
    idaccount: this.idaccount ,
data : this.datainsert
    
    }).then(
this.getColis()

    ).catch(error => console.log(error))

 },
 getColisData(id){


this.getColis();
 },
 GetNewlist(idliv){

     axios.get('/api/deliv/'+idliv)
     .then(response =>
     { 
       
this.colis = response.data['colis'];
this.prices = response.data['amount']
     
 }
     ).catch(err => console.log(err));


 },
 PushData (key,price){

var status = this.datainsert.filter(function(elem){
    if(elem.key == key ) 
    {

   return true;
    }else {

   return false;
    }
 
});

if(status == false ){

    
 
    if(price.length == 0  ){

this.datainsert.pop({ 'key':key , 'price':price });


    }else {

this.datainsert.push({ 'key':key , 'price':price });


    }

}else{
if( price.length == 0  ){

this.datainsert.pop({'key':key,'price':price});


}

}


 },
PushAll (vars){

var i;
for (i = 0; i < this.colis.data.length; i++) {

this.datainsert.push({'key':this.colis.data[i].id_colis, 'price':vars });
this.colis.data[i].shipping_price = vars ;
}




},
GetPartenaire(id){


 axios.get('/api/fichpart/'+id)
     .then(response =>
     { 
       
   this.partenaires = response.data

 }).catch(err => console.log(err));


} ,
 getColInfos(id){

 axios.get('/api/getcolisinfos/'+id)
     .then(response =>
     { 
       
   this.ShowColis = response.data

 }
     ).catch(err => console.log(err));


 },LivreurFilter(id){




     axios.get('/api/getlivreur/')
     .then(response =>
     { 
       
   this.coursiers= response.data
   
     
 }
     ).catch(err => console.log(err));





 },
 getCoursier()
 {



     axios.get('/api/getlivreur')
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

 
 GetIDColStats(id){

this.id_colis = id  ; 
Stats.methods.getstats(id);


 }
 
 }


     }

 



</script>