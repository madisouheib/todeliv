<template>
        <div>

<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="form-group">
   
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
            </div>
<select class="custom-select"  @change="FiltreClient(clt)" v-model="clt" >
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

<div class="row"> 
 
                                               
                      
                 


                    
                        
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
                                        <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-box"></i> </span>
                                    </div>
                        <select class="custom-select"  @change="FiltreEtat(etat)" v-model="etat">
                        <option value="">Selectionner l'etat </option>
                        <option value="1">Valider</option>
                        <option value="0">Non Valider</option>
                        </select>
                        
                                  
                                    <div class="invalid-feedback">
                                        Please choose a one.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">


<a  :href="'/admin/archrecep'" class="btn btn-dark btn-square">  Archive <i class="fas fa-archive"></i> </a>
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
                                        <th class="text-center"><i class="fas fa-edit"></i> Action </th>
                                        <th class="text-center"><i class="fas fa-save"></i> Exporter </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr v-for=" com  in coms.data" :key="com.id_coms" >
                                 
                                        <th scope="row" class="text-center" >  <a  v-if="com.colis_count >  (com.validate_count + com.signaler_count) " class="pcoded-badge label label-info" style="color:white"  :href="'/admin/addrecp/'+com.id_coms">  <i class="fas fa-folder-open"></i>  #Manif- {{ com.id_coms}}  <i class="fas fa-list"></i>  </a>  <a  v-else class="pcoded-badge label label-success" style="color:white"  :href="'/admin/addrecp/'+com.id_coms">  <i class="fas fa-folder"></i>  #Manif- {{ com.id_coms}}  <i class="fas fa-list"></i>  </a></th>
                                        
                        
                                      <th class="text-center"   > {{ com.prices }} DA   </th>
                                      <th class="text-center" > <span style="color:green;font-weight:bold;"> {{  com.validate_count + com.signaler_count }}     </span>       / <span style="color:black;font-weight:bold;">  {{ com.colis_count}} </span>     </th>
                                    
                                       
                                        <th class="text-center"> ORAN EST    </th>
                                        <td class="text-center" v-if="com.confirmed == null" >  <i style="font-size:1.6em;" class="fas fa-clock"></i>   </td>
                                                                   <td class="text-center" v-else > <i   class="fas fa-check-circle" style="
                                        color:#3CB371;font-size:1.6em;"> </i>  </td>
                        
                                        <td class="text-center"  >
                               

                                            
                                             <button  v-if="com.colis_count ==  (com.validate_count + com.signaler_count) "  data-toggle="modal" data-target="#MdalValidManif" @click="Get(com.id_coms)" style="padding-right:6px;"   class="btn btn-square btn-success  text-center " >  <i class="fas fa-check-circle"></i>  </button> <button v-else   data-toggle="modal" data-target="#MdalClotureManif"  style="padding-right:6px;"  @click="Get(com.id_coms)" class="btn btn-dark btn-square" >
                                        <i class=" fas fa-archive">  </i> </button>
                                        
                                         </td>
                                      
                                        <th class="text-center" > <a  :href="'/admin/export/'+com.id_coms" class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </a> <a target="_blank"  :href="'/admin/print_com/'+com.id_coms"  class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </a>  </th>
                                    </tr>
                                 
                
                                </tbody>
                            
                            </table>
                         <pagination :data="coms"    :per-page="20"
  @pagination-change-page="getManifs">

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
     props: ['user_id'],
     
 components: {
'manif-validate': ValidateManif ,
'manif-cloture': ClotureManif

  },

     data(){
 return {
coms:{},
idcoms : '',
clientpro : {},
clt : '',
etat : ''


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


     axios.get('/api/getmanifs/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.coms= response.data

     
 }
     ).catch(err => console.log(err));

 },
 FiltreClient(code){


     axios.get('/api/manifiltre/'+code)
     .then(response =>
     { 
       
   this.coms= response.data

     
 }
     ).catch(err => console.log(err));


//console.log(this.filtredComs);



 },
  Get(id){


this.idcoms = id ;





 }
,
FiltreEtat(etat){
     axios.get('/api/manifetat/'+etat)
     .then(response =>
     { 
       
   this.coms= response.data

     
 }
     ).catch(err => console.log(err));


}
 
 },
 


     }

      


</script>