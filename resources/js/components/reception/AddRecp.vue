<template>
<div>
<div class="row">
 
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="form-group">
  
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-barcode"></i> </span>
                </div>
                <input type="text" class="form-control"  @keyup="keymonitor"  id="validationCustomUsername" placeholder=" code a bare   "  v-model="codebars" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a code.
                </div>
            </div>
        </div>
    

  
    
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

     <div class="form-group">

  <div class="switch switch-danger d-inline m-r-10">
<label> Signaler</label>
<input type="checkbox" id="switch-d-1" v-model="SignalStats" >
<label class="cr" for="switch-d-1">   </label>

    </div>


     </div>

    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <button class="btn btn-success shadow-1" data-toggle="modal" data-target="#ModalvalidGp"   > Validation groupée   <i class="fas fa-check-circle" ></i></button>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <button class="btn btn-danger shadow-1" data-toggle="modal" data-target="#Modalsign"   > Signaler  <i class="fas fa-exclamation" ></i></button>
        </div>
    </div>            
    
    
    
<div>

                        <div class="table-responsive">

                            <table class="table">
           <thead>
                                    <tr>
                                        <th class=""  style="width:10px;"> </th>
                                        <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> wilaya & commune </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> partenaire </th>

                                        <th class="text-center"><i class="fas fa-align-left"></i> Etat </th>
                                        <th class="text-center"><i class="fas fa-tasks"></i> action  </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis" >
                         
                                        <td scope="" class="" >
                                            <div class="form-group">

<div v-if="col.tmp_validation == null && col.tmp_signaler == null">
<div  class="checkbox checkbox-fill d-inline" >   
                                         <input   type="checkbox" :name="'checkbox-fill-'+col.id_colis" :id="'checkbox-fill-'+col.id_colis" >
                                                         <label :for="'checkbox-fill-'+col.id_colis" class="cr"></label>  


</div></div>
<div e-else>


       <div  v-if="col.tmp_validation  == true  && col.validation == false "  class="checkbox checkbox-fill d-inline">
                                    <input   type="checkbox" name="checkbox-fill-1" :id="'checkbox-fill-'+col.id_colis" checked >
                                                <label :for="'checkbox-fill-'+col.id_colis"  class="cr"></label>

                         </div>

   <div  v-if="col.tmp_validation  == true  && col.validation == true "  class="checkbox d-inline">
                                    <input   type="checkbox" name="checkbox-fill-1" :id="'checkbox-'+col.id_colis" checked >
                                                <label :for="'checkbox-'+col.id_colis"  class="cr"></label>

                         </div>


 <div  v-if="col.tmp_signaler  == true && col.signaler == false  "  class="checkbox checkbox-fill   checkbox-danger d-inline">
                                    <input   type="checkbox" name="checkbox-fill-1" :id="'checkbox-fill-'+col.id_colis" checked >
                                                <label :for="'checkbox-fill-'+col.id_colis"  class="cr"></label>

                         </div>
                         <div  v-if="col.tmp_signaler  == true  && col.signaler == true "  class="checkbox    checkbox-danger d-inline">
                                    <input   type="checkbox" name="checkbox-fill-1" :id="'checkbox-'+col.id_colis" checked >
                                                <label :for="'checkbox-'+col.id_colis"  class="cr"></label>

                         </div>

</div>



                                            </div>        
                                                                                               
                                        </td>

                                        <td scope="row" class="text-center" > #send- {{ col.id_colis  }}</td>

                                        
                                        <td class="text-center" > <button data-toggle="modal" data-target="#Moodalcolisinfo" @click="getColInfos(col.id_colis)"  class="btn btn-sm    shadow-1   btn-info"><i  style="margin:0px;"  class="fas fa-box-open"></i></button>
                                        </td>
                                      <td class="text-center"   > {{ col.price  }} DA    </td>
                                        <td class="text-center" >  {{ col.wilaya }}</td>
                                        <td class="text-center" > {{ col.name }} </td>

                                        <td class="text-center" >
       
                                            
                                            
                                            <span v-if="col.tmp_validation == true  && col.validation == false    " class="pcoded-badge label shadow-1 label-warning">En attente   <i class="fas fa-hourglass-half"></i> </span>
                                                                                    <span v-if="col.tmp_validation ==  false  &&  col.validation == false && col.signaler == false    " class="pcoded-badge label shadow-1  label-danger"> En attente    <i class="fas fa-hourglass-half"></i> </span>
                                                                                                                            <span  v-if="col.tmp_validation == true  &&  col.validation == true     "  class="pcoded-badge shadow-1  label label-success"> Validé   <i class="fas fa-check-circle"></i> </span>
                                                                                                                                                                                                                                                        <span  v-if="col.tmp_signaler == true  &&  col.signaler == true     "  class="pcoded-badge label label-danger"> Signaler   <i class="fas fa-check-circle"></i> </span>
                                            
                                            
                                            
                                            
                                            </td>

                                        <td class="text-center"> <button   data-toggle="modal" data-target="#ModalsignByone"   class="btn shadow-1 btn-sm  btn-danger" @click="GiveIdColis(col.id_colis)"><i  style="margin:0px;" class="fas fa-exclamation-triangle"></i> </button> <button @click="GiveIdColis(col.id_colis)"  data-toggle="modal" data-target="#ModalValidByone"   class="btn shadow-1  btn-sm btn-success"><i style="margin:0px;"  class="fas fa-check-circle"></i> </button> </td>
                                    </tr>
                          
                                </tbody>
                            </table>
                           
                                             
                        </div>
                        <valid-one  @colis-edit="getColis"   v-bind:id_colis="id_colis"  > </valid-one>
                        <signal-one   @colis-signaler="getColis"     v-bind:id_colis="id_colis"  >    </signal-one>
                         <validation-gp @colis-edit="getColis" v-bind:idcoms="idcoms"  >       </validation-gp>
    <pagination :data="colis" @pagination-change-page="getColis"></pagination>
<signal-gp  @colis-signaler="getColis" v-bind:idcoms="idcoms"  >    </signal-gp>
 <infos-colis v-bind:ShowColis="ShowColis"  >    </infos-colis> 

 
      </div>
     </div>
</template>





<script>

 import ColisInfos from './ColisInfos.vue';
  import ValidGp from './ValidationGp.vue';
    import SignalGrp from './SignalGrp.vue';
        import SignalByOne from './SignalByOne.vue';
             import ValidByOne from './ValidByOne.vue';
  export default {
     props: ['url_id','user_id'],
 components: {
       'infos-colis':   ColisInfos,
              'validation-gp':   ValidGp,
              'signal-gp':SignalGrp ,
              'signal-one': SignalByOne ,
              'valid-one': ValidByOne
     
  },

     data(){
 return {
colis:{},
colisrecp:{},
ShowColis:{} ,
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',
codebars : '',
idcoms : this.url_id,
SignalStats : '',
id_colis : ''
 }
  },
 created ()
 {



this.getColis();
this.getColisInHouse();
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


     axios.get('/api/getcolisvaldiation/'+id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     
 }
     ).catch(err => console.log(err));

 },
getColisInHouse(page = 1)
 {
     
   




     axios.get('/api/inhouse?page='+page)
     .then(response =>
     { 
       
   this.colisrecp = response.data
     
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


 },
 keymonitor(event) {

 let keyMessage = 'keyup: ';
 if(this.codebars !== '' ){



if(this.SignalStats !== "") {

var  DataAll = this.colis.data ;
var code = this.codebars;  
var valObj = DataAll.filter(function(elem){
    if(elem.id_colis == code ) return true;
});
if(valObj.length > 0) {

axios.patch('/api/tmpsignalergrp/',{

id : this.codebars


}).then( 
    
    response =>
     { 
       
   this.colis = response.data,
     this.codebars = ''
 }
    




).catch(error => console.log(error))
}




}else {


var  DataAllValid = this.colis.data ;
var code = this.codebars;  
var valObjValid = DataAllValid.filter(function(elem){
    if(elem.id_colis == code ) return true;
});
if(valObjValid.length > 0) {




axios.patch('/api/tmpcolisv/', {

id : this.codebars


}).then( 
   response =>
     { 
       
   this.colis = response.data,
     this.codebars = ''
 }
    

).catch(error => console.log(error))

}

}







}
 },
 GiveIdColis(id){

this.id_colis = id ; 


 }
 }


     }

      


</script>

