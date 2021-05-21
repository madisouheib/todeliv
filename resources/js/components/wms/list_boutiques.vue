<template>

    
<div>
  

         
    
    <div class="row"> 
     
                                                   
                          
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            
                                <div class="form-group">
                               
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-warehouse"></i> </span>
                                        </div>
                            <select class="custom-select"  @change="FiltreWilaya(wil)"  v-model="wil" >

    <option   value="all" > Hubs   </option>
    <option   v-for="wilaya in wilayas " :key="wilaya.key"   > {{ wilaya}}    </option>

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
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-dolly"></i> </span>
                                        </div>
                            <select class="custom-select" @change="Tentatives(tent)"  v-model="tent">
                            <option value="">Arrivages </option>
            
                            <option value="0"> ON  </option>
                            <option value="1"> OFF </option>
      
                            </select>
                                         <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                            </div>



                                                </div>
                        <div class="table-responsive">

                            <table class="table   table-hover ">
   
                                <thead class="">
                                       <tr>
                                   <th class="text-center" ># Brand </th>
                                        <th class="text-center" ><i class="fas fa-store"></i> Boutique</th>
                                        <th class="text-center" ><i class="fas fa-stopwatch-20"></i> total produits </th>
                                        <th class="text-center"><i class="fas fa-warehouse"></i> en stock </th>
                                        <th class="text-center" ><i class="fas fa-truck-loading"></i> en livraison </th>
                                        <th class="text-center" ><i class="fas fa-calendar-alt"></i> Derniere mise à jour </th>
                                        <th class="text-center"><i class="fas fa-list-alt"></i> liste produits </th>
                                        <th class="text-center"><i class="fas fa-truck"></i> Arrivages </th>
                                       <th class="text-center"><i class="fas fa-cog"></i> option </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
       

                             
                                        <td scope="row" class="text-center first" > <img :src="'/img/stores/ecom.png'" style="width:70px;height:50px;" class="img-circle"> </td>
                                                                                <td   class="text-center" > <label class="badge badge-light" style="font-size:14px; "> Ecommerce Web  </label>  </td>
                                        <td   class="text-center" > <label class="badge badge-dark" style="font-size:14px; "> 13  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-primary" style="font-size:14px; "> 430  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-success" style="font-size:14px; "> 20  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:14px;"> 2020-05-20  </label>    </td>
                                        <td class="text-center" > <a style="color:#fff;" class="btn btn-primary btn-sm shadow-1"> liste des produits <i class="fas fa-boxes"></i> </a>  </td>
                                          <td class="text-center" > <a style="color:#fff;"  class="btn btn-warning btn-sm shadow-1"> <i class="fas fa-"></i> Arrivages <label class="badge badge-light" style="font-size:12px;" >3</label>  </a>  </td>        
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" class="btn shadow-1  btn-success btn-sm " ><i style="margin:0px;font-size:1.3em;"  class=" fab fa-whmcs"></i></button>         
                        
                                          
                                        </td>


                                     
                                    </tr>

                                                   <tr>
       

                             
                                        <td scope="row" class="text-center first" > <img :src="'/img/stores/ecom.png'" style="width:70px;height:50px;" class="img-circle"> </td>
                                                                                <td   class="text-center" > <label class="badge badge-light" style="font-size:14px; "> Ecommerce Web  </label>  </td>
                                        <td   class="text-center" > <label class="badge badge-dark" style="font-size:14px; "> 13  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-primary" style="font-size:14px; "> 430  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-success" style="font-size:14px; "> 20  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:14px;"> 2020-05-20  </label>    </td>
                                        <td class="text-center" > <a style="color:#fff;" class="btn btn-primary btn-sm shadow-1"> liste des produits <i class="fas fa-boxes"></i> </a>  </td>
                                          <td class="text-center" > <a style="color:#fff;"  class="btn btn-warning btn-sm shadow-1"> <i class="fas fa-"></i> Arrivages <label class="badge badge-light" style="font-size:12px;" >3</label>  </a>  </td>        
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" class="btn shadow-1  btn-success btn-sm " ><i style="margin:0px;font-size:1.3em;"  class=" fab fa-whmcs"></i></button>         
                        
                                          
                                        </td>


                                     
                                    </tr>

                                                   <tr>
       

                             
                                        <td scope="row" class="text-center first" > <img :src="'/img/stores/ecom.png'" style="width:70px;height:50px;" class="img-circle"> </td>
                                                                                <td   class="text-center" > <label class="badge badge-light" style="font-size:14px; "> Ecommerce Web  </label>  </td>
                                        <td   class="text-center" > <label class="badge badge-dark" style="font-size:14px; "> 13  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-primary" style="font-size:14px; "> 430  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-success" style="font-size:14px; "> 20  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:14px;"> 2020-05-20  </label>    </td>
                                        <td class="text-center" > <a style="color:#fff;" class="btn btn-primary btn-sm shadow-1"> liste des produits <i class="fas fa-boxes"></i> </a>  </td>
                                          <td class="text-center" > <a style="color:#fff;"  class="btn btn-warning btn-sm shadow-1"> <i class="fas fa-"></i> Arrivages <label class="badge badge-light" style="font-size:12px;" >3</label>  </a>  </td>        
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" class="btn shadow-1  btn-success btn-sm " ><i style="margin:0px;font-size:1.3em;"  class=" fab fa-whmcs"></i></button>         
                        
                                          
                                        </td>


                                     
                                    </tr>


                                                   <tr>
       

                             
                                        <td scope="row" class="text-center first" > <img :src="'/img/stores/ecom.png'" style="width:70px;height:50px;" class="img-circle"> </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:14px; "> Ecommerce Web  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-dark" style="font-size:14px; "> 13  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-primary" style="font-size:14px; "> 430  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-success" style="font-size:14px; "> 20  </label>  </td>
                                        <td class="text-center" > <label class="badge badge-light" style="font-size:14px;"> 2020-05-20  </label>    </td>
                                        <td class="text-center" > <a style="color:#fff;" class="btn btn-primary btn-sm shadow-1"> liste des produits <i class="fas fa-boxes"></i> </a>  </td>
                                        <td class="text-center" > <a style="color:#fff;"  class="btn btn-warning btn-sm shadow-1"> <i class="fas fa-"></i> Arrivages <label class="badge badge-light" style="font-size:12px;" >3</label>  </a>  </td>        
                                        <td class="text-center" ><button data-toggle="modal" data-target="#ModalColisSuivi" class="btn shadow-1  btn-success btn-sm " ><i style="margin:0px;font-size:1.3em;"  class=" fab fa-whmcs"></i></button>         
                        
                                          
                                        </td>


                                     
                                    </tr>
                          
                                </tbody>
                            </table>
 

 


                        </div>

      </div>
    
</template>





<script>



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

    


  },

     data(){
 return {





}
 }
  ,
 created ()
 {


 },
 
 methods:{

getColis(page = 1)
 {
     
   

/*


     axios.get('/api/inhouse/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.colis = response.data
     this.checkcolis = response.data
 }
     ).catch(err => console.log(err));

*/
 },
 getColisData(id){


this.getColis();
 },

 getColInfos(id){

 axios.get('/api/getcolisinfos/'+id)
     .then(response =>
     { 
       
   this.ShowColis = response.data
     
 }
     ).catch(err => console.log(err));


 },
 Filtreclient(clt){
axios.get('/api/byclienth/'+clt+'/'+this.user_id)
     .then(response =>
     { 
       
   this.colis = response.data
     
 }
     ).catch(err => console.log(err));


 },
 


 
  


 
 
 }


     }

      


</script>