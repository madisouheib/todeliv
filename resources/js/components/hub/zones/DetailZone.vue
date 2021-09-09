
<template>
<div class="wil" >

    <div class="row">

<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">

<button class="btn btn-primary shadow-1 btn-sm" data-toggle="modal" data-target="#ModaladdComZone"   > Ajouter une commune <i class="fas fa-plus"></i>    </button>

</div>

    </div>
       <table class="table" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center" ><i class="fas fa-map-signs"></i> Nom de la commune</th>
                                        <th class="text-center" ><i class="fas fa-map"></i> Nom de la wilaya</th>
                                    <th class="text-center" ><i class="fas fa-map-pin"></i> Mat de la commune</th>
                                      

                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" zonecom  in zoncommuns.data" :key="zonecom.id_zonecom" >
                                        <th scope="row"> {{ zonecom.id_zonecom}} </th>
                                        <td class="text-center">{{ zonecom.nom}}  </td>
                                          <td class="text-center">{{ zonecom.nom_wilaya_ar}}  </td>
                                          <td class="text-center" >{{ zonecom.code_postal}}  </td>

                               
                    
                            

                                        <td class="text-center" > 

                                            <button data-toggle="modal" data-target="#ModaldelzoneCom"  @click="PushZoneCom(zonecom.id_zonecom)" class="btn btn-sm shadow-1    btn-danger "   ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                 
                                 
                                </tbody>
                            </table>
                     

    <pagination :data="zoncommuns" @pagination-change-page="getCommunsHub">

    </pagination>
    <div>
            <commune-add  v-bind:zone="url_id" @commune-added="getCommunsHub">           </commune-add>
            <commune-delete  v-bind:idzonecoms="idzonecom" @commune-deleted="getCommunsHub"> </commune-delete>
    </div>
</div>

</template>








<script>
import CommunAdd from './AddCommun' ; 
import CommunDelete from './DelCommun' ; 

  export default {
     props:['url_id','user_id']  ,
 components: {
   'commune-add':  CommunAdd  ,
   'commune-delete': CommunDelete

  },

     data(){
 return {

zoncommuns : {},
ShoWilaya : '',
idzonecom : ''

 }
  },
 created ()
 {

this.getCommunsHub() ; 


 },
 
 methods:{
 getCommunsHub(page = 1)
 {


     axios.get('/api/communsbyzone/'+this.url_id+'?page='+ page)
     .then(response =>
     { 
       
     this.zoncommuns = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
 PushZoneCom(idzone){

this.idzonecom  = idzone ;


 }


 }


     }

      


</script>