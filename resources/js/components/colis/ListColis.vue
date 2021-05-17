<template>

    
<div>
      
    
    <div v-if="ShowCom.confirmed_user == null "   class="row"> 
     
                                                   
                          
                     
    
    
                        
                            
                      
                            
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">
                            
                                <div class="form-group">
                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-box"></i> </span>
                                        </div>
                            <select class="custom-select" required>
                            <option value="">Selectionner l'etat </option>
                            <option value="1">Valider</option>
                            <option value="1">Non Valider</option>
                            </select>
                            
                                      
                                        <div class="invalid-feedback">
                                            Please choose a one.
                                        </div>
                                    </div>
                                </div>
                            </div>


<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">

<a class="btn btn-dark shadow-1" :href="'/admin/addcoms/'+url_id" >  Importer des Colis <i class="fas fa-upload"></i> </a>

</div>

<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">

    <button class="btn btn-info shadow-1"  data-toggle="modal" data-target="#ModaladdColis"  > AJOUTER Un Colis <i class="fas fa-plus"></i></button>
</div>

                            
                                              



</div>
                        <div class="table-responsive">

                            <table class="table">
   
                                <thead>
                                    <tr>
                                        <th class="text-center" > <i class="fas fa-shop"></i> Colis-id </th>
                        
                                        <th class="text-center" ><i class="fas fa-address-card"></i> Nom du Client</th>
                                        <th class="text-center"><i class="fas fa-cubes"></i> Quantité  </th>
                        
 <th class="text-center" ><i class="fas fa-address-card"></i> Wilaya </th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Prix </th>
                        
                                       
                                        <th class="text-center"><i class="fas fa-edit"></i> Action </th>
                                         <th class="text-center"><i class="fas fa-align-left"></i> Statuts </th>
                                        <th class="text-center"><i class="fas fa-save"></i> Exporter </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis" >

<td class="text-center" > {{ col.id_colis}}   </td>
<td class="text-center"> {{ col.nom_client}}   </td>
<td class="text-center"> {{ col.qte}}   </td>
<td class="text-center" > {{ col.wilaya}}   </td>
<td class="text-center" > {{ col.price}}   </td>
<td class="text-center" >   <button data-toggle="modal" data-target="#ModalColisInfo" class="btn btn-square  btn-primary " @click="getColInfos(col.id_colis)"  ><i style="margin:0px;"  class=" fas fa-plus-circle"></i></button> 

<button v-if="ShowCom.confirmed_user == null " data-toggle="modal" data-target="#ModalDelColis"  class="btn btn-square  btn-danger " @click="getColInfos(col.id_colis)"   ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
  </td>
<td v-if="col.confirmed ==  null " > En attente</td>
<td v-else >Livré</td>
<td class="text-center"> <a target="_blank"  :href="'/admin/print-pdf/'+col.id_colis" class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </a>    </td>

                                    </tr>
                          
                                </tbody>
                            </table>
                                                 <pagination :data="colis" @pagination-change-page="getColis">

    </pagination>
<delete-colis v-bind:ShowColis="ShowColis"  @colis-delete="getColis" > </delete-colis>
    <view-colis v-bind:ShowColis="ShowColis" ></view-colis>
       <add-colis @colis-added="getColis" v-bind:GetInf="GetInf" ></add-colis>
                        </div>

      </div>
    
</template>





<script>
 import AddColis from './AddColis.vue';
 import ColisInfos from './ColisInfos.vue';
 import ColisDelete from './DeleteColis.vue' ; 
  export default {
     props: ['url_id','user_id'],
 components: {
    
      'view-colis':   ColisInfos,
      'add-colis':AddColis ,
      'delete-colis' : ColisDelete
  },

     data(){
 return {
colis:{},

ShowColis: '',
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',
GetInf  : {
idcom : this.url_id,
userid : this.user_id


}
 }
  },
 created ()
 {



this.getColis();
this.getColInfos();
this.getComInfos();
 },
 
 methods:{

getColis(page = 1)
 {
     
     if(this.url_id == 'all'){

var id = this.user_id ; 
     }else {

var id = this.url_id ; 

     }


     axios.get('/api/getcolis/'+id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     
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
 getComInfos(){

 axios.get('/api/getCominfos/'+this.idcom)
     .then(response =>
     { 
       
   this.ShowCom = response.data
     
 }
     ).catch(err => console.log(err));


 }
 }


     }

      


</script>