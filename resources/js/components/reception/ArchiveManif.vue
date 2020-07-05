<template>
        <div>

<div class="row">
<div class="col-4">
    <div class="form-group">
   
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
            </div>
<select class="custom-select" required>
    <option selected> Selectionner le partenaire </option>
<option     v-for="pro in clientpro " :key="pro.id"  :value="pro.id " > {{ pro.full_name}} </option>

</select>

          
            <div class="invalid-feedback">
                Please choose a type.
            </div>
        </div>
    </div>




</div>



</div>            


            <div class="table-responsive">                 
                
                      <table class="table">
    
                                    <thead>
                                        <tr>
                                            <th class="text-center" > <i class="fas fa-folder-open"></i> manifest-id </th>
                            
                                            <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant Total</th>
                                            <th class="text-center"><i class="fas fa-cubes"></i> Nombre colis  </th>
                        

                                        <th class="text-center" ><i class="fas fa-address-card"></i> Hub </th>
                        
                                        <th class="text-center"><i class="fas fa-align-left"></i> Statuts </th>
                                      
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
                                            Cloture
                                         </td>
                                      
                                        <th class="text-center" > <a  :href="'/admin/export/'+com.id_coms" class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </a> <a target="_blank"  :href="'/admin/print_com/'+com.id_coms"  class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </a>  </th>
                                    </tr>
                                 
                
                                </tbody>
                            
                            </table>
                         <pagination :data="coms" @pagination-change-page="getManifs">

    </pagination>
    <manif-validate v-bind:idcoms="idcoms"  @manif-validate="getManifs" ></manif-validate>
        <manif-cloture v-bind:idcoms="idcoms"  @manif-cloture="getManifs" ></manif-cloture>
                        </div>

</div>
</template>





<script>
import ValidateManif from './ValidateManif' ; 
import ClotureManif from './ClotureManif' ; 
  export default {
     props: ['id_user'],
     
 components: {
'manif-validate': ValidateManif ,
'manif-cloture': ClotureManif

  },

     data(){
 return {
coms:{},
idcoms : '',
clientpro : {}


 }
  },
 created ()
 {



this.getManifs();
this.GetClientPro();
 },
 
 methods:{
  GetClientPro(){

   axios.get('/api/getclientpro/')
     .then(response => {   this.clientpro= response.data })
     .catch(err => console.log(err));





 },
getManifs(page = 1)
 {


     axios.get('/api/getarchivemanifs/?page='+page)
     .then(response =>
     { 
       
   this.coms= response.data

     
 }
     ).catch(err => console.log(err));

 },
  Get(id){


this.idcoms = id ;





 }

 
 }


     }

      


</script>