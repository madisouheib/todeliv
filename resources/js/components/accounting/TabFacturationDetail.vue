<template>

    
<div>
  
    

    <div class="row"> 
     
                 

                     
                          
                     
  
                            
   
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
             <div class="col-3">
                  <button class="btn btn-success btn-glow-success" @click="UpdatePrice()" v-if="ship == true" > Mis à jour <i class="fas fa-check-circle"></i> </button>
                 
                 
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


   #Send-{{ col.id_colis }}
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
                                                               <td> <input name="price"  @keyup="DisplayButton(col.shipping_price,col.id_colis)"  class="form-control" v-model="col.shipping_price" type="number" 
 style="width:100px;" placeholder="Prix.. "> 
 

   </td>


                                     
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
     props: ['url_id'],
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
ShowColis:'',

ship : false , 


livprice :'',
etat:false,

id_colis: '',
newprice : '',

prices : '',
completed:false,
coursiers : {},
idliv : '',
idcolis: ''





 }
  },
 created ()
 {


this.getColis();




 },
 
 
 methods:{

getColis(page = 1)
 {
     
   

     axios.get('/api/comptadetail/'+this.url_id)
     .then(response =>
     { 
       
this.colis = response.data;

     
 }
     ).catch(err => console.log(err));


 } ,
 DisplayButton(val,idcolis){

if(val.length == 0  ){
 this.ship = false ;
this.idcolis = '';
this.newprice = '' ;
}else {
this.ship = true;
this.idcolis = idcolis;
this.newprice = val ;
}

 },
 UpdatePrice(){

axios.patch('/api/updprice/',{
    idcolis: this.idcolis ,
newprice : this.newprice
    
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
 
 getColInfos(id){

 axios.get('/api/getcolisinfos/'+id)
     .then(response =>
     { 
       
   this.ShowColis = response.data

 }
     ).catch(err => console.log(err));


 },
 
 
 
 

 
 
 
 

 
 
 }


     }

 



</script>