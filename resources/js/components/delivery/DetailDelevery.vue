<template>

    
<div>
      
    
<div class="row">
      
   
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup"> <i class="fas fa-barcode"></i> </span>
                </div>
                <input type="text" class="form-control" v-model="codebars"  @keyup="keymonitor"   id="validationCust" placeholder=" code a bare   " aria-describedby="inputGroup" required>
                <div class="invalid-feedback">
                    Please choose a code.
                </div>
            </div>
        </div>
    
    
    
 
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

<button class="btn btn-glow-primary btn-sm btn-primary" data-toggle="modal" data-target="#ModalColisActionGp" @click="GetIDColisGrp()" type="button" > Mise à jour groupée <i class="fas fa-dolly"> </i>  </button>
    </div>
    <div class="col-2"> <label class="badge badge-success" style="font-weight:bold;font-size:18px;padding:5px;background-color:#2dde98;"> <i class="fas fa-money-check-alt"></i> {{ this.UserDetail.prices }} DA  </label></div>
    <div class="col-2"> 
    <label class="badge badge-success" style="font-weight:bold;font-size:18px;padding:5px;background-color:#2dde98;"> <i class="fas fa-money-check-alt"></i> {{ this.FicheDetail.comission }} DA  </label>
    </div>
    <div class="col-3">
    <button v-if="this.UserDetail.totalchnge_count == this.UserDetail.totalexist_count " class="btn btn-square btn-sm btn-outline-success" data-toggle="modal" data-target="#ModalValidFiche"  style=""> Validation groupée  <i class="fas fa-check-circle" ></i></button>

    <button v-else class="btn  btn-glow-dark btn-dark btn-sm " disabled  style=""> Validation groupée  <i class="fas fa-minus-circle" ></i></button>

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
    <option    style="padding:30%;font-weight:bold;"     v-for="wilaya in wilayas " :key="wilaya.key"   > {{ wilaya }}    </option>
    
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
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-list"></i>  </span>
                                        </div>
                            <select class="custom-select"  @change="FiltreFiches(flist)" v-model="flist" >
                          
                            <option style="padding:30%;font-weight:bold;" v-for=" fiche  in listfiche " :key="fiche.id_fiche"  :value="fiche.id_fiche"   > #Fiche - {{ fiche.id_fiche }}  </option>
                      
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
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                            <select class="custom-select" @change="Tentatives(tent)"  v-model="tent">
                            <option  style="padding:30%;font-weight:bold;"  value="all" selected>Tentatives </option>
            
                            <option  style="padding:30%;font-weight:bold;"  value="0"> Tentative 0 </option>
                            <option  style="padding:30%;font-weight:bold;"  value="1"> Tentative 1 </option>
                            <option  style="padding:30%;font-weight:bold;"  value="2"> Tentative 2 </option>
                            </select>
                                         <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                            </div>
   <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" v-if="ShowBtn == true ">
<label class="badge  badge-success" style="font-weight:bold;font-size:18px;padding:5px;background-color:#2dde98;"> <i class="fas fa-file"></i> {{ this.FicheDetail.fprice }} DA  </label>

    <button v-if="this.FicheDetail.ftotal_count == this.FicheDetail.fchtotal_count " class="btn btn-sm  btn-glow-success btn-sm    btn-success" data-toggle="modal" data-target="#ModalFicheValid"  style=""> Validation Par Fiche  <i class="fas fa-check-circle" ></i></button>

    <button v-else class="btn  btn-glow-dark btn-dark btn-sm " disabled  style=""> Validation Par Fiche  <i class="fas fa-minus-circle" ></i></button>

    </div>


                                                </div>
                        <div class="table-responsive">

                            <table class="table table-hover ">
   
                                <thead class="">
                                       <tr>
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> wilaya & commune </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> Partenaire </th>
                                        <th class="text-center" ><i class="fas fa-tasks"></i> Status </th>
                                        <th class="text-center" ><i class="fas fa-calendar-alt"></i> Date </th> 
                                        <th class="text-center"><i class="fas fa-align-left"></i> Suivi </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
             
                                    <tr v-for=" col  in colis.data" :key="col.id_colis"   :style="{ background: col.id_stats == 4 ? '#2dde98'   : '' || col.id_stats == 3 ? '#ff4c4c'  : '' ||   col.id_stats == 10 ? ''  : '#ffc20e'   , color: col.id_stats == 4 ? 'white'  : ''  || col.id_stats == 3 ? 'white'   : '' || col.id_stats == 10 ? ''   : 'white' }"  >
                      <td scope="row" class="text-center" >                 
                          <div class="form-group">
                                    <div  class="checkbox checkbox-fill d-inline" >   
                                    <input   type="checkbox" v-model="mycolis" :value="col.id_colis" :name="'checkbox-fill-'+col.id_colis" :id="'checkbox-fill-'+col.id_colis" >
                                 <label :for="'checkbox-fill-'+col.id_colis" class="cr"> #Send-{{ col.id_colis }}  </label>  
                               </div>
                          </div>        
                        </td>
                                        
         <td class="text-center" >
                                         <button data-toggle="modal" data-target="#ModalColisInfo"  class="btn btn-sm  btn-glow-dark  btn-square   btn-dark" @click="getColInfos(col.id_colis)"><i  style="margin:0px;"  class="fas  fa-user-circle"></i></button>   
       <a  target="_blank"  :href="'/admin/tracking/'+col.id_colis" class="btn  btn-sm  btn-glow-dark btn-dark">
        <i style="margin:0px;font-size:1.4em; color:#FFCC00;"  class="fas fa-box"></i>
         </a>
                                        
                                        </td>
                                        <td class="text-center" > <b class="badge badge-light " style="font-size:16px;"> {{ col.price }} DA     </b> </td>
                                        <td class="text-center" > <b class="badge badge-light" style="font-size:14px;"> {{ col.wilaya }} /  {{  col.commune }}   <i class="fas fa-map-marker-alt"></i></b>  </td>
                                        <td class="text-center" > {{ col.name }}   </td>
                                        <td class="text-center" > <b class="badge badge-light" style="font-size:14px;"> {{ col.field_stats }} <i v-if="col.id_stats == 3" class="fas fa-redo-alt "></i>
                                        <i v-else-if="col.id_stats == 4 " class="fas fa-check-circle"></i>
                                        <i v-else-if="col.id_stats == 10 " class="fas fa-shipping-fast"></i>
                                        <i v-else class="fas fa-history "></i>
                                        
                                        
                                         </b> 
                                        
                                            </td>
                          <td class="text-center"><b class="badge badge-light" style="font-size:14px;">{{ col.created_at | moment    }} <br> ( {{ col.created_at | days    }} jours )    </b>   </td>
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn  btn-sm   btn-square  btn-glow-dark btn-dark " ><i style="margin:0px;"  class=" fas fa-list-ul"></i></button>         
                        
                                          
                                        </td>
                                     
<td>

 <button class=" btn btn-dark btn-glow-dark  btn-sm " @click="GetIDColis(col.id_colis)" data-toggle="modal" data-target="#ModalColisAction" > Mettre à jour  <i class=" fas fa-dolly"></i>        </button>
                                        </td>

                              
                                    </tr>
                          
                                </tbody>
                            </table>
                                                 <pagination :data="colis" @pagination-change-page="getColis">

    </pagination>
    <valid-modal v-bind:id_liv="UserDetail" >  </valid-modal>
<valid-fiche @fiche-validate="reload()"   v-bind:flist="flist">  </valid-fiche>

    <action-colis  @colis-added="refreshData()"  v-bind:addstats="addstats"  >    </action-colis>
<stats-colis    ref="childref" >    </stats-colis>
    <view-colis v-bind:ShowColis="ShowColis" ></view-colis>
<valid-gp   @colis-added="refreshData()"  v-bind:addstatsgp="addstatsgp"  >   </valid-gp>
                        </div>

      </div>
    
</template>





<script>

import ColisInfos from './ColisInfos.vue';
import Stats from '../inhouse/StatsInfos.vue';
import ActionStats from './EtatColis.vue';
import EtatGroupColis from './EtatGroupColis';
import ValidFiche from './ValidDelev.vue';
import ValidByFiche from './ValidFiche.vue';



  export default {
     props: ['url_id','user_id'],
      filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  },
days: function (date){


var a = moment((date));
var b = moment([]);
return b.diff(a, 'days') // 1
/*
var a = moment((date)).format("DD.MM.YYYY");

var b = moment().format("DD.MM.YYYY") ;
return  a.diff(b,'days') // 1
*/

}

  
},
 components: {
    
      'view-colis':   ColisInfos,
     'stats-colis': Stats ,
     'action-colis':ActionStats,
     'valid-modal' : ValidFiche ,
     'valid-gp' : EtatGroupColis,
     'valid-fiche': ValidByFiche


  },

     data(){
 return {
colis:{},
mycolis : [],
ShowColis: '',
codebars :'',
idcom : this.url_id,
userid : this.user_id,
ShowCom:'',
FicheDetail : {},
clients : {},
wilayas : {},
wil : '',
tent : '',
clt:'',
comission : '',
flist :'',
ShowBtn :'',
listfiche : {},
stats : {},
id_colis: '',
addstatsgp:{}
,
addstats :{
id_colis :'',
ShowStats : {},



},
UserDetail : {}
 }
  },
 created ()
 {

this.getColis();
this.GetWilayas();
this.GetStats();
this.getPrice();
this.getFiche();

 },
 
 methods:{

  refreshData(){

        this.getColis();
        this.getPrice();
        this.mycolis = [];


},
getPrice(){

     axios.get('/api/livreurdetail/'+this.url_id)
     .then(response =>
     { 
       
   this.UserDetail = response.data.detail
     this.comission  = response.data.comission
 }
     ).catch(err => console.log(err));

},
reload(){

var page = 1 ; 
   axios.get('/api/delivliste/'+this.url_id)
     .then(response =>
     { 
       
   this.colis = response.data
 this.getFiche();
     
 }
     ).catch(err => console.log(err));

}
,
FiltreFiches(flist){

var page = 1 ; 
 axios.get('/api/filtreflist/'+flist+'?page='+page)
     .then(response =>
     {     
           this.colis = response.data 
      }
     ).catch(err => console.log(err));


     axios.get('/api/livreurfiche/'+this.flist)
     .then(response =>
     { 
    //console.log(response.data)
     this.FicheDetail = response.data
     this.ShowBtn = true ;
     }
     ).catch(err => console.log(err));

this.mycolis = [];
}

,
 
 keymonitor(event) {

 
 if(this.codebars !== '' ){





var  DataAll = this.colis.data ;
var  DataAllExist = this.mycolis ;
var code = this.codebars;  
var valObj = DataAll.filter(function(elem){
    if(elem.id_colis == code ) return true;
});
var existObj = DataAllExist.filter(function(elem){
    if(elem == code ) return true;
});
if(valObj.length > 0) {

if(existObj.length > 0) {

this.codebars = '';

}else {


this.mycolis.push(code);
this.codebars = '';
}




}else {



    
}


}

} 
,
getColis(page = 1)
 {

   if(this.flist !== '') {

this.FiltreFiches(this.flist);

   }else {

   axios.get('/api/delivliste/'+this.url_id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     
 }
     ).catch(err => console.log(err));

 
   }
  


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




 axios.get('/api/wilayaflist/'+this.url_id)
     .then(response =>
     { 
       
   this.wilayas = response.data
     
 }
     ).catch(err => console.log(err));

 },
 getFiche(){

     axios.get('/api/fichelist/'+this.url_id)
     .then(response =>
     { 
       
   this.listfiche = response.data
     
 }
     ).catch(err => console.log(err));


 },
    Tentatives(tent) {
var page = 1 ; 
 axios.get('/api/delivliste/'+this.url_id+'?page='+page)
     .then(response =>
     { 
       
 
  if(tent !== 'all') {
 const  cols  = response.data.data
 this.colis.data =   cols.filter(col => col.stats_count == tent );
  }else {

this.colis = response.data

  }
        
 }
     ).catch(err => console.log(err));

//console.log(this.colis.data);
    
      //return  this.colis = colis.filter(col => col.stats_count == tent)
  } ,
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
 
  GetIDColisGrp(id){

this.addstatsgp.cols = this.mycolis ;

this.addstatsgp.userid = this.user_id ;


 }
 ,
 GetIDColStats(id){


this.id_colis = id  ; 
Stats.methods.getstats(id)

 }
 
 }


     }

      


</script>