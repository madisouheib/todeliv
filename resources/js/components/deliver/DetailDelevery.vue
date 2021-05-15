<template>

    
<div>
      <div class="d-lg-none d-md-none ">

          <button @click="turnCamera()" class="btn btn-primary col-12 btn-glow-primary mb-4 " style="font-size:22px;"> SCANNER QR CODE <i class="fas fa-qrcode"> </i></button>
      </div>

   <qrcode-stream @decode="onDecode"  v-if="camera == true "></qrcode-stream>

     <div class="row mt-4">

                <div class="col-md-3 col-xl-3 col-xs-5 col-sm-5 col-6">
                    <div class="card table-card">
                        <div class="row-table bg-white">
                            <div class="col-auto theme-init text-white p-t-40 p-b-40">
                                <i class="feather icon-package f-30"></i>
                            </div>
                            <div class="col text-center">
                                <span class="text-uppercase d-block m-b-10">Non livré</span>
                                <h3 class="f-w-300">30</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xl-3 col-xs-5 col-sm-5 col-6">
                    <div class="card table-card">
                        <div class="row-table bg-white ">
                            <div class="col-auto theme-failed text-white p-t-40 p-b-40">
                                <i class="feather icon-alert-triangle f-30"></i>
                            </div>
                            <div class="col text-center">
                                <span class="text-uppercase d-block m-b-10">Echouée </span>
                                <h3 class="f-w-300">6</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xl-3 col-xs-5 col-sm-5 col-6 "  >
                    <div class="card table-card ">
                        <div class="row-table bg-white">
                            <div class="col-auto theme-retour text-white p-t-40 p-b-40">
                                <i class="feather icon-refresh-ccw f-30"></i>
                            </div>
                            <div class="col text-center ">
                                <span class="text-uppercase d-block m-b-10">Retour</span>
                                <h3 class="f-w-300">5</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xl-3 col-xs-5 col-sm-5 col-6">
                    <div class="card table-card">
                        <div class="row-table bg-white ">
                            <div class="col-auto theme-bg text-white p-t-40 p-b-40">
                                <i class="feather icon-check-circle f-30"></i>
                            </div>
                            <div class="col text-center">
                                <span class="text-uppercase d-block m-b-10">livré</span>
                                <h3 class="f-w-300">4</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<div class="row">
      
   
    <div class=" col-8 col-lg-3 col-md-6 col-sm-6 col-xs-6">
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
   
   <div class="col-4 col-lg-3 col-md-3 col-sm-4 col-xs-4">
                <button class="btn btn-success shadow-1"> trouver <i class="fas fa-search-plus"></i></button>
            </div>



    </div>            
    

                        <div class="table-responsive">

                            <table class="table table-hover ">
   
                                <thead class="">
                                       <tr>
                                   <th class="text-center" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>

                                    


            
    
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

                                        <td class="text-center" > {{ col.name }}   </td>
                                        <td class="text-center" > <b class="badge badge-light" style="font-size:14px;"> {{ col.field_stats }} <i v-if="col.id_stats == 3" class="fas fa-redo-alt "></i>
                                        <i v-else-if="col.id_stats == 4 " class="fas fa-check-circle"></i>

                                        <i v-else-if="col.id_stats == 10 " class="fas fa-shipping-fast"></i>
                                         <i v-else class="fas fa-history "></i>
                                        
                                        
                                         </b> 
                                        
                                            </td>
                       
                                     
<td>

 <button class=" btn btn-dark btn-glow-dark  btn-sm " @click="GetIDColis(col.id_colis)" data-toggle="modal" data-target="#ModalColisAction" > Mettre à jour  <i class=" fas fa-dolly"></i>        </button>
                                        </td>

                              
                                    </tr>
                          
                                </tbody>
                            </table>
                                                 <pagination :data="colis" @pagination-change-page="getColis">

    </pagination>



    <action-colis  @colis-added="refreshData()"   v-bind:addstats="addstats"  >    </action-colis>
<stats-colis    ref="childref" >    </stats-colis>
    <view-colis v-bind:ShowColis="ShowColis" ></view-colis>

                        </div>

      </div>
    
</template>





<script>
import { QrcodeStream, QrcodeCapture } from 'vue-qrcode-reader'

import ColisInfos from './ColisInfos.vue';
import Stats from '../inhouse/StatsInfos.vue';
import ActionStats from './EtatColis.vue';





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
      QrcodeStream,
    QrcodeCapture





  },

     data(){
        return {
        colis:{},
        mycolis : [],
        ShowColis: '',
        codebars :'',
        camera:false ,
        idcom : this.url_id,
        userid : this.user_id,
        ShowCom:'',
        FicheDetail : {},
        clients : {},
        wilayas : {},
        wil : '',
        tent : '',
        clt:'',
        flist :'',
        ShowBtn :'',
        listfiche : {},
        stats : {},
        id_colis: '',
        addstatsgp:{},
        addstats  :{
        id_colis  :'',
        userid : '',
        ShowColis:{}
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
turnCamera(){

this.camera = true ;
},
 onDecode (result) {
            console.log(result);
            this.camera = false ; 
            // let element = this.$refs.ModalColisAction.$el
            $('#ModalColisAction').modal('show');
            this.addstats.id_colis = result ;
            this.addstats.userid = this.user_id ;
            axios.get('/api/getcolisinfos/'+result)
                .then(response =>
                { 
                
            this.addstats.ShowColis = response.data
                
            }
                ).catch(err => console.log(err));

            // $(element).modal('show');

    },
getPrice(){


     axios.get('/api/livreurdetail/'+this.url_id)
     .then(response =>
     { 
       
   this.UserDetail = response.data
     
 }
     ).catch(err => console.log(err));



},
GetStats(){

     axios.get('/api/livreurstats/'+this.user_id)
     .then(response =>
     { 
       
   this.UserDetail = response.data
     
 }
     ).catch(err => console.log(err));

},
reload(){

var page = 1 ; 
   axios.get('/api/deliverylist/'+this.user_id+'?page='+page)
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
     {       this.colis = response.data  }
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

                    }

}

} 
,
getColis(page = 1)
 {


            if(this.flist !== '') {

            this.FiltreFiches(this.flist);

            }else {

            axios.get('/api/deliverylist/'+this.user_id+'?page='+page)
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