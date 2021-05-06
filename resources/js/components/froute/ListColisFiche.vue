<template>
<div>
<div class="row">
 
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="form-group">
  
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-barcode"></i> </span>
                </div>
                <input type="text" class="form-control"  @keyup="onBarcodeScanned(codebars)"  id="validationCustomUsername" placeholder=" code a bare   "  v-model="codebars" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a code.
                </div>
            </div>
        </div>
    

  
    
    </div>
   
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

     <div class="form-group">

  <div class="switch switch-danger d-inline m-r-10">
<label> Unselect</label>
<input type="checkbox" id="switch-d-1" v-model="SignalStats" >
<label class="cr" for="switch-d-1">   </label>

    </div>


     </div>

    </div>
    
  
    </div>            
    
    
    
<div>

                        <div class="table-responsive">

                            <table class="table table-hover">
           <thead class=" ">
                                    <tr>
                                
                                        <th class="text-center" colspan="2" ># Tracking-id </th>
                                        <th class="text-center" ><i class="fas fa-user-circle"></i> Infos</th>
                                        <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant</th>
                                        <th class="text-center"><i class="fas fa-map-marker-alt"></i> wilaya & commune </th>
                                        <th class="text-center" ><i class="fas fa-address-card"></i> Partenaire </th>

                                        <th class="text-center"><i class="fas fa-align-left"></i> Etat </th>
                                        <th class="text-center"><i class="fas fa-tasks"></i> Action  </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for=" col  in colis.data" :key="col.id_colis" >
                         
                                        <td scope="" class="" >
                                            <div class="form-group">
  <div   class="checkbox d-inline">
                                    <input   type="checkbox" name="checkbox-fill-1" :id="'checkbox-'+col.id_colis" checked >
                                                <label :for="'checkbox-'+col.id_colis"  class="cr"></label>

                         </div>


                                            </div>        
                                                                                               
                                        </td>

                                        <td scope="row" class="text-center" >#send- {{ col.id_colis  }}</td>

                                        
                                        <td class="text-center" > <button data-toggle="modal" data-target="#ModalColisInfo" @click="getColInfos(col.id_colis)"  class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-plus"></i></button>
                                        </td>
                                      <td class="text-center"   > {{ col.price  }} DA    </td>
                                        <td class="text-center" >  {{ col.wilaya }}</td>
                                        <td class="text-center" > {{ col.partenaire }} </td>

                                        <td class="text-center" >
       
                                            <button data-toggle="modal" data-target="#ModalColisSuivi" @click="$refs.childref.getstats(col.id_colis)" class="btn btn-square  btn-success " ><i style="margin:0px;"  class=" fas fa-list-ul"></i></button>  
                                            

                                            
                                            
                                            
                                            
                                            </td>

                                        <td class="text-center"> <button   data-toggle="modal" data-target="#ModalDeleteColis"   class="btn btn-square btn-danger" @click="GiveIdColis(col.id_delivery)"><i  style="margin:0px;" class="fas fa-exclamation-triangle"></i> </button>  </td>
                                    </tr>
                          
                                </tbody>
                            </table>
                           
                                             
                        </div>
              
    <pagination :data="colis" @pagination-change-page="getColis"></pagination>

<stats-colis    ref="childref" >    </stats-colis>
 <delete-colis @colis-deleted="getColis" v-bind:id_delivery="id_delivery" >   </delete-colis>
  <view-colis v-bind:ShowColis="ShowColis" ></view-colis>
      </div>
     </div>
</template>





<script>
  import Stats from '../inhouse/StatsInfos.vue';
    import DelFcolis from './DeleteColisFiche.vue';
      import ColisInfos from './ColisInfos.vue';

  export default {
     props: ['url_id','user_id'],
 components: {
       'stats-colis': Stats,
       'delete-colis': DelFcolis,
       'view-colis': ColisInfos 
     
  },

     data(){
 return {
colis:{},
colishouse: {},
ShowColis:{} ,
userid : this.user_id,
ShowCom:'',
codebars : '',
idfiche : this.url_id,
SignalStats : '',
id_colis : '',
goga : {},
id_delivery : ''
 }
  },
 created ()
 {

 this.$barcodeScanner.init(this.onBarcodeScanned);

this.getColis();
this.getColisInHouse();
 },
 
 methods:{

getColis(page = 1)
 {
    


     axios.get('/api/getcolisfiche/'+this.idfiche+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     
 }
     ).catch(err => console.log(err));

 },
 getColisInHouse(page = 1)
 {
     
   




     axios.get('/api/inhousedata')
     .then(response =>
     { 
       
   this.colishouse = response.data
     
 }
     ).catch(err => console.log(err));


 }
 ,

 getColInfos(id){

 axios.get('/api/getcolisinfos/'+id)
     .then(response =>
     { 
       
   this.ShowColis = response.data
     
 }
     ).catch(err => console.log(err));


 },


 onBarcodeScanned(codebars) {
this.resetBarcode();





 if(this.codebars !== '' ){


if(this.SignalStats != "") {
this.goga = this.colis.data.find(d => d.id_colis == this.codebars) ;

var  DataAll = this.colis.data ;
var code = this.codebars;  
var valObj = DataAll.filter(function(elem){
    if(elem.id_colis == code ) return true;
});
if(valObj.length > 0) {
 if(this.timer) {
                // So we clear and null it so it doesn't contact the api
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
axios.delete('/api/deletecolisfiche/'+this.goga.id_delivery).then(
 this.getColis(),
this.codebars = ''


).catch(error => console.log(error))
 }, 100);

}
}else {


var  DataAllValid = this.colishouse ;
var code = this.codebars;  
var valObjValid = DataAllValid.filter(function(elem){
    if(elem.id_colis == code ) return true;
});



if(valObjValid.length > 0) {

 if(this.timer) {
                // So we clear and null it so it doesn't contact the api
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                // contact your endpoint here

axios.post('/api/addcolisfiche/', {

idcolis : this.codebars,
idfiche : this.idfiche , 
iduser : this.userid 


}).then( response =>
     { 
         this.colis = response.data ,
         this.codebars = ''
         
 
         } ).catch(error => console.log(error))
                // Assuming your scanner can emit keystrokes
                // within 100 milliseconds from one another
                // otherwise increase this value as necessary
            }, 100);



}







}












}
 },
  resetBarcode () {
        let codebars = this.$barcodeScanner.getPreviousCode()
        // do something...
      }
,
 GiveIdColis(id){

this.id_delivery = id ;

 }


 }


     }

      


</script>

