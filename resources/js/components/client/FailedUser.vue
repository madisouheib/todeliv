<template>

    
<div>
  
    
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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

    
  
    </div>            
    
    <div class="row"> 
     
                                                   
                          
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            
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
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            
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
                        <div class="">

                            <table class="table table-hover table-bordered table-dark">
   
                                <thead class="thead-dark">
                                       <tr>
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> infos</th>
                                                    <th class="text-center" ><i class="fas fa-user-circle"></i> Client</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> wilaya & commune </th>
                            
        <th class="text-center"><i class="fas fa-calendar-alt"></i> Status </th>
            
                               

                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                         <th class="text-center"><i class="fas fa-bell"></i> Recalamation </th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis" >
       

                             
                                        <td scope="row" class="text-center" > <label class="badge badge-light" style="font-size:14px;">  #send-{{ col.id_colis }} </label></td>
                                        
                                        <td class="text-center" > <button data-toggle="modal" data-target="#ModalColisInfo" @click="getColInfos(col.id_colis)"   class="btn   btn-glow-primary btn-sm    btn-primary"><i  style="margin:0px;font-size:1.3em;"  class="fas fa-search-plus" ></i></button> 
                                        <a  target="_blank"  :href="'/admin/tracking/'+col.id_colis" class="btn btn-glow-dark btn-dark btn-sm "> <i style="margin:0px;font-size:1.4em; color:#FFCC00;"  class="fas fa-box"></i></a></td>
                                                  <td class="text-center" > <label class="badge badge-light" style="padding:10px;font-size:14px;">  {{ col.nom_client }}  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-warning" style="font-size:16px;">   {{ col.price }}  DA  </label> </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:15px;"> {{ col.wilaya }} /  {{  col.commune }}    <i class="fas fa-map-marker-alt"></i>  </label> </td>
                                        <td class="text-center" > <label class="badge badge-warning" style="padding:5px;"> {{ col.field_stats }}   <i class="fas fa-undo"></i> </label>   </td>
                              
                          
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn btn-glow-success btn-sm  btn-success " ><i style="margin:0px;font-size:1.3em;"  class=" fas fa-tasks"></i></button>         
                        
                                          
                                        </td>
                                           <td class="text-center" >
                                               
                                        <button v-if="col.message == null" data-toggle="modal" data-target="#ModaladdReclamation"  class="btn btn-glow-warning  btn-warning btn-sm  " @click="GetMessage(col.id_stats_colis,col.message)" > Récalamation <i style="margin:0px;font-size:1.2em;"  class=" fas fa-bell"></i></button>         
                                                                <button v-else data-toggle="modal" data-target="#ModaladdReclamation"  class="btn btn-glow-primary  btn-primary  btn-sm  " @click="GetMessage(col.id_stats_colis,col.message)"  > Récalamation <i style="margin:0px;font-size:1.2em;"  class=" fas fa-bell"></i></button>         

                                          
                                        </td>
                                     


                                     
                                    </tr>
                          
                                </tbody>
                            </table>
                                                 <pagination :data="colis" @pagination-change-page="getColis">

    </pagination>

<message-colis @stats-added="getColis()" v-bind:Message="Message"  >   </message-colis>
            <view-colis v-bind:ShowColis="ShowColis" ></view-colis>
<stats-colis    ref="childref" >    </stats-colis>


                        </div>

      </div>
    
</template>





<script>

 import ColisInfos from './ColisInfos.vue';
  import Stats from './StatsInfos.vue';
    import MessageUser from './MessageUser.vue';


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
     'message-colis': MessageUser 


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


},

Message : {

field : '',
idstats : ''


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
     
   




     axios.get('/api/userechouer/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     
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




 axios.get('/api/getstatsclient')
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

 },

 GetMessage(id,message){


this.Message.field = message ;
this.Message.idstats = id ;


 }
 
 }


     }

      


</script>