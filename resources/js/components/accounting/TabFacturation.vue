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



</div>
    
    <div class="row"> 
     
                              <div class="col-2">

<div class="form-group">
                         
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
                                            </div>
                                <select class="custom-select" @change="GetCompta(idprt)" required v-model="idprt" >
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
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-id-card-alt"></i> </span>
                                            </div>
                                <select class="custom-select" @change="Displaystats(etat)" required v-model="etat" >
                                <option value="">Etat </option>
                                    <option value="0">Non Validé </option>
                                        <option value="1">Validé </option>
                                </select>
                                
                                          
                                            <div class="invalid-feedback">
                                                Please choose a Coursier.
                                            </div>
                                        </div>
                                    </div>

    </div>

                     
  <div class="col-3">

<button class="btn btn-primary btn-glow-primary" data-toggle="modal" data-target="#Modaladdfacture"  > <i class="fas fa-plus"> </i> Ajouter une Facture </button>

  </div>
              
                    
                           
                            
                       

                                                </div>
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered">
   
                                <thead class="thead-dark">
                                       <tr>
                                         
                                   <th class="text-center" ># Compta-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> Infos</th>
                                                    <th class="text-center" ><i class="fas fa-user-circle"></i> Partenaire</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant total</th>
                                        
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> Livré / Retour  </th>
                            
        <th class="text-center"><i class="fas fa-calendar-alt"></i> Date  </th>
        <th class="text-center"> Detail </th>
                <th class="text-center"><i class="fas fa-pdf"></i> Export </th>
            
                               

                                        <th class="text-center"><i class="fas fa-cog"></i> Action </th>

                                     
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" fich  in fiches.data" :key="fich.id_accounting" >
       

                             
                                        <td scope="row" class="text-center align-middle " >
<a class="badge badge-primary " :href="'/admin/facturation/'+fich.id_accounting" style="font-size:16px;">

<i class="fas fa-list-alt"> </i>
compta - #{{ fich.id_accounting }}
</a>
  

                                        </td>
                                        
                                        <td class="text-center align-middle " > 
                                            <b class="badge badge-light " style="font-size:12px;"> 
                                            {{  fich.field_account }}
                                            </b>
                                          </td>


                                                                               
                                        <td class="text-center align-middle " > 
                                            <b class="badge badge-dark " style="font-size:14px;"> <i class="fas fa-user-circle"></i>
            {{  fich.name }}
                                            </b>
                                        </td>
                                        <td class="text-center align-middle " >
                                      <b class="badge badge-primary " style="font-size:16px;margin-bottom:2px;">
                                                     <i class="fas fa-user-circle"></i>   {{  fich.prices   }} DA 
                                                        
                                                        
                                                        </b>
                                                        <br>

                                                                                            <b class="badge badge-danger " style="font-size:16px;margin-bottom:2px;">
                                                     <i class="fas fa-user-circle"></i>   {{   calc(fich.prices,fich.encaiss )   }}.00 DA 
                                                        
                                                        
                                                        </b>
                                                        
                                                        
                                                         <br>

                                                         <b class="badge badge-success " style="font-size:16px;">
                                                     <i class="fas fa-truck-loading"></i>   {{  fich.encaiss }} DA 
                                                        
                                                        
                                                        </b>
                                              </td>
                              

                                        <td class="text-center align-middle " >
      
                                            <b class="badge badge-light " style="font-size:16px;"> 
                                           <span style="color:#00c16e;"> 

                                               <i class=" fas fa-arrow-circle-up "> </i>  {{  fich.delivred }} DA   </span>  / 
                                                
                                                  <span style="color:#e01f3d;">   {{  fich.nodeliv }} DA  <i class=" fas fa-arrow-circle-down "> </i>
                                               
                                                </span>
                                            </b>                         

                                          
                                        </td>

                                        <td class="text-center align-middle " >
      
                                               <b class="badge badge-light " style="font-size:16px;"> 
{{  fich.created_at | moment  }}
                                               </b>                        

                                          
                                        </td>

<td class="text-center align-middle ">

<a class="btn btn-primary btn-sm btn-glow-primary"  :href="'/admin/facturation/'+fich.id_accounting">   <i style="margin:0px;font-size:14px"  class="fas fa-list-alt"></i> </a>

</td>
                                        <td class="text-center align-middle" >
                    <b class="badge badge-light " style="font-size:16px;"> 
<a :href="'/admin/facturepdf/'+fich.id_accounting" class="btn btn-outline-danger "> <i  style="font-size:1.2em;margin:0px;" class="fas fa-file-pdf"></i></a>
                    </b>
                                                                   

                                          
                                        </td>


                                            <td class="text-center align-middle " v-if="fich.etat == false " >
      
                                                      <button v-if="fich.total_count > 0" class="btn btn-sm btn-glow-success btn-success " data-toggle="modal" data-target="#Modalvalidfacture" @click="Giveid(fich.id_accounting)"  > validation <i class="fas fa-check-circle"></i> </button>           
                                                         <button v-else class="btn btn-sm btn-glow-dark   btn-dark " disabled > validation <i class="fas fa-times-circle"></i> </button>             

                                          
                                        </td>
                                                              
 <td   class="text-center align-middle " v-else  >
                                     Validé
 </td>
                                    </tr>
                          
                                </tbody>
                            </table>
                          

       <add-facture @facture-added="getFiches()"  >   </add-facture>
     <valid-facture @facture-valid="getFiches()"  v-bind:id_facture="id_facture"  >   </valid-facture>

                        </div>

      </div>
    
</template>





<script>

 import AddFacture from './AddFacture.vue';
  import ValidFacture from './ValidFacture.vue';

  export default {
     props: ['user_id'],
         filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},

 
 components: {
    
'add-facture':AddFacture,
'valid-facture':ValidFacture 



  },

     data(){
 return {

fiches:{},
idprt :'',
clients :{},
encaiss :null,
total : null,
id_facture : '',
etat :''




 }
  },
 created ()
 {


this.getCLients();
this.getFiches();




 },
 
 
 methods:{

getFiches(page = 1)
 {
     
   

     axios.get('/api/fichescompta')
     .then(response =>
     { 
       
this.fiches = response.data;

     
 }
     ).catch(err => console.log(err));


 } ,
 Displaystats(val){


     axios.get('/api/fichescomptas/'+val)
     .then(response =>
     { 
       
this.fiches = response.data;

     
 }
     ).catch(err => console.log(err));
 },
GetCompta(idprt){

 axios.get('/api/fichescompta/'+idprt)
     .then(response =>
     { 
       
this.fiches = response.data
     
 }
     ).catch(err => console.log(err));


 },

 calc(valone,valtwo){

return  parseInt(valone) - parseInt(valtwo) ;
  },
  Giveid(val){


this.id_facture = val ;
  },
getCLients(){

 axios.get('/api/getclients')
     .then(response =>
     { 
       
this.clients = response.data
     
 }
     ).catch(err => console.log(err));


 },

 

 

 
 }

     }

 



</script>