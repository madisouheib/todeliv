
<template>
<div class="wil" >

    <div class="row">

<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">

<button class="btn btn-primary shadow-1 btn-sm" data-toggle="modal" data-target="#ModaladdDeliver"   > <i class="fas fa-shipping-fast"></i> Ajouter un livreur <i class="fas fa-plus"></i>    </button>

</div>

    </div>
       <table class="table" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center" ><i class="fas fa-map-signs"></i> Nom de la zone </th>
                                        <th class="text-center" ><i class="fas fa-shipping-fast"></i> Nom de livreur</th>
                                       <th class="text-center" ><i class="fas fa-sort-amount-up-alt"></i> Max</th>
                                       <th class="text-center" ><i class="fas fa-sort-amount-down-alt"></i> Min</th>
                                       <th class="text-center" ><i class="fas fa-sort-numeric-down-alt"></i>Order </th>
                                       <th class="text-center" ><i class="fas fa-toggle-on"></i>Etat </th>

                                      

                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" zonedeliv  in zondelivers.data" :key="zonedeliv.zone_deliver" >

                                          <td scope="row">           {{ zonedeliv.zone_deliver  }}    </td>
                                          <td class="text-center" >  {{ zonedeliv.field_zone }}       </td>
                                          <td class="text-center" >  {{ zonedeliv.name   }}          </td>
                                          <td class="text-center" >  {{ zonedeliv.max_deliver   }}    </td>
                                          <td class="text-center" >  {{ zonedeliv.min_deliver   }}    </td>
                                          <td class="text-center" >  {{ zonedeliv.order_deliver   }}  </td>
                                          <td class="text-center" > 
                                          <button v-if="zonedeliv.deliver_stats == true" class="btn btn-sm shadow-1 btn-dark"  @click="DisableDeliver(zonedeliv.zone_deliver)"  >  Desactivé <i class="fas fa-times-circle"></i>  </button>
                                          <button v-else class="btn btn-sm shadow-1 btn-success"  @click="EnableDeliver(zonedeliv.zone_deliver)"  >  Activé  <i class="fas fa-check-square"></i> </button>
                                          </td>

                               
                    
                            

                                        <td class="text-center" > 

                                            <button data-toggle="modal" data-target="#ModaldelzoneCom"  @click="PushZoneCom(zonedeliv.zone_deliver)" class="btn btn-sm shadow-1    btn-danger "   ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                            <button data-toggle="modal" data-target="#Modaleditdeliver"  @click="PushEdit(zonedeliv.zone_deliver)" class="btn btn-sm shadow-1    btn-primary "   ><i style="margin:0px;"  class=" fas fa-user-edit"></i></button>
                                        </td>
                                    </tr>
                                 
                                 
                                </tbody>
                            </table>
                     

    <pagination :data="zondelivers" @pagination-change-page="getDeliversZone()">

    </pagination>
    <div>
            <deliver-add     v-bind:zone="url_id"     @deliver-added="getDeliversZone()">            </deliver-add>
            <deliver-delete  v-bind:ideliver="ideliver" @deliver-deleted="getDeliversZone"> </deliver-delete>
            <deliver-edit    v-bind:ShowDeliver="ShowDeliver" @deliver-edited="getDeliversZone">    </deliver-edit>
    </div>
</div>

</template>








<script>
import DeliverAdd from './add_deliver' ; 
import DeliverDelete from './del_deliver' ; 
import DeliverEdit from './edit_deliver' ; 

  export default {
     props:['url_id','user_id']  ,
 components: {
   'deliver-add':  DeliverAdd  ,
   'deliver-delete': DeliverDelete,
   'deliver-edit':  DeliverEdit  ,
  },

     data(){
 return {

zondelivers : {},
ShoWilaya : '',
ideliver : '',
ShowDeliver: {}

 }
  },
 created ()
 {

this.getDeliversZone() ; 


 },
 
 methods:{
 getDeliversZone(page = 1)
 {


     axios.get('/api/listdeliverszone/'+this.url_id+'?page='+ page)
     .then(response =>
     { 
       
     this.zondelivers = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
 PushZoneCom(idzone){

this.ideliver  = idzone ;


 },
 PushEdit(id){

   axios.get('/api/gotdeliverz/'+id )
     .then(response =>
     { 
        
     this.ShowDeliver = response.data
     
 }
     )
     .catch(err => console.log(err));


 },
 EnableDeliver(id){

 axios.patch('/api/enabldeliver/'+id )
     .then(response =>
     { 
    response.data,
    this.getDeliversZone();
     
 }
     )
     .catch(err => console.log(err));


 },
 DisableDeliver(id){

 axios.patch('/api/disabldeliver/'+id )
     .then(response =>
     { 
    response.data,
    this.getDeliversZone();
     
 }
     )
     .catch(err => console.log(err));


 }


 }


     }

      


</script>