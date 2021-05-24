<template>

<div> 
  <div class="row">
<div class="col-md-3 col-lg-3">
<button class="btn btn-info" data-toggle="modal" style="float:right;" data-target="#ModaladdCom" > Ajouter une commande <i class="fas fa-plus"></i> </button>

</div>

  </div>
            <div class="table-responsive">  
                          
                <table class="table table-hover ">
    
                                    <thead>
                                        <tr>
                                            <th class="text-center" > <i class="fas fa-folder-open"></i> manifest-id </th>
                            
                                            <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant Total</th>
                                            <th class="text-center"><i class="fas fa-cubes"></i> Nombre colis  </th>
                        

                                        <th class="text-center" ><i class="fas fa-address-card"></i> Hub </th>
                        
                                        <th class="text-center"><i class="fas fa-align-left"></i > Statuts </th>
                                        <th class="text-center"><i class="fas fa-edit"></i> Action </th>
                                        <th class="text-center"><i class="fas fa-save"></i> Exporter </th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                            
                 <tr v-for=" com  in coms.data" :key="com.id_coms" >
                                       
                                        <td scope="row" class="text-center" > <a class="btn btn-info btn-glow-info" style="color:white"  :href="'/admin/listcolis/'+com.id_coms">  <i class="fas fa-folder-open"></i>  #Manif- {{ com.id_coms}}  <i class="fas fa-list"></i>  </a></td>
                                     
                                        
                        
                                      <td class="text-center"   > <label class="badge badge-warning" style="font-size:14px;padding:10px;"> {{ com.prices }}  DA   </label>  </td>
                                      <td class="text-center" >{{ com.colis_count}}    </td>
                                    
                                       
                                        <td class="text-center">  {{ com.nom_hub }}   </td>
                                        <td class="text-center" > 
                                           <i v-if="com.confirmed_user == null"   class="fas fa-clock"></i> 
                                        <i v-else style="color:#2dde98;font-size:1.3em;"  class="fas fa-clipboard-check"></i> 
                                          </td>
                        
                                        <td class="text-center" > <button  v-if="com.confirmed_user == null"   data-toggle="modal" data-target="#MdalRemoveManif" @click="Get(com.id_coms)"  class="btn shadow-1 btn-danger  " style="padding-right:6px;"  >  <i class="fas fa-trash-alt"></i>  </button> 
                                        <button v-if=" (com.confirmed_user == null ) || ( com.colis_count < 0  ) "  @click="Get(com.id_coms)" 
                                         class="btn btn-success  shadow-1" data-toggle="modal" data-target="#MdalValidManifUser"  style="padding-right:6px;" > Valider <i class="fas fa-check-circle"></i> </button>
                                         
                                         <h6 style="color:#2dde98;font-weight:bold;" v-if="com.confirmed_user == true"  > Validé </h6>
                                          </td>
                                        <td class="text-center" > <a :href="'/admin/export/'+com.id_coms" class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </a> <a target="_blank" :href="'/admin/print_com/'+com.id_coms" class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </a>  </td>
                                    </tr>
                                 
                  
                                </tbody>
                            
                            </table>
                      

                                          <manif-delete v-bind:idcoms="idcoms"  @manif-delete="getComs" > </manif-delete>
                            <manif-validuser v-bind:idcoms="idcoms"  @manif-validuser="getComs" > </manif-validuser>
                         <pagination :data="coms" @pagination-change-page="getComs"> </pagination>    
      </div>
      
</div>
</template>





<script>
import ValidateComs from './ValidateComs.vue' ; 
 import ComsDelete from './DeleteComs.vue' ; 
  export default {
     props: ['id_user'],
     
 components: {
'manif-validuser': ValidateComs ,
'manif-delete': ComsDelete
  },

     data(){
 return {
coms:{},
idcoms:''


 }
  },
 created ()
 {
this.getComs();
 },
 
 methods:{

getComs(page = 1)
 {
var id = this.id_user ; 

     axios.get('/api/getcoms/'+id+'?page='+page)
     .then(response =>
     { 
       
   this.coms= response.data
   console.log(response.data)
     
 }
     ).catch(err => console.log(err));

 },
   Get(id){


this.idcoms = id ;





 }

 }


     }

      


</script>