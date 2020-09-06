<template>
            <div>  
                <div>                
                <table class="table table-responsive ">
    
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
                                       
                                        <th scope="row" class="text-center" > <a class="pcoded-badge label label-info" style="color:white"  :href="'/admin/listcolis/'+com.id_coms">  <i class="fas fa-folder-open"></i>  #Manif- {{ com.id_coms}}  <i class="fas fa-list"></i>  </a></th>
                                     
                                        
                        
                                      <th class="text-center"   > 3500000 DA   </th>
                                      <th class="text-center" >{{ com.colis_count}}    </td>
                                    
                                       
                                        <th class="text-center"> ORAN EST   </th>
                                        <td class="text-center" > 
                                           <i v-if="com.confirmed_user == null"   class="fas fa-clock"></i> 
                                        <i v-else style="color:#2dde98;font-size:1.3em;"  class="fas fa-clipboard-check"></i> 
                                          </td>
                        
                                        <td class="text-center" > <button  v-if="com.confirmed_user == null"   data-toggle="modal" data-target="#MdalRemoveManif" @click="Get(com.id_coms)"  class="btn btn-square btn-danger  " style="padding-right:6px;"  >  <i class="fas fa-trash"></i>  </button> 
                                        <button v-if=" (com.confirmed_user == null ) || ( com.colis_count < 0  ) "  @click="Get(com.id_coms)" 
                                         class="btn btn-success btn-square" data-toggle="modal" data-target="#MdalValidManifUser"  style="padding-right:6px;" > Valider <i class="fas fa-check-circle"></i> </button>
                                         
                                         <h6 style="color:#2dde98;font-weight:bold;" v-if="com.confirmed_user == true"  > Validé </h6>
                                          </td>
                                        <th class="text-center" > <a :href="'/admin/export/'+com.id_coms" class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </a> <a target="_blank" :href="'/admin/print_com/'+com.id_coms" class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </a>  </th>
                                    </tr>
                                 
                  
                                </tbody>
                            
                            </table>
                             </div>
                            <manif-delete v-bind:idcoms="idcoms"  @manif-delete="getComs" > </manif-delete>
                            <manif-validuser v-bind:idcoms="idcoms"  @manif-validuser="getComs" > </manif-validuser>
                         <pagination :data="coms" @pagination-change-page="getComs"> </pagination> 
                      
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