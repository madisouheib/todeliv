<template>
<div>

<div class="row">


        <div class="col-md-4 col-lg-4  col-12 ">
<button class="btn btn-sm btn-primary shadow-1 " data-toggle="modal" data-target="#ModalAddZone" > Ajouter une zone <i class="fas fa-plus"></i> </button>

        </div>
</div>
  <table class="table">



                                <thead>
                                    <tr>
                                        <th>#</th>
                                       <th><i class="fas fa-map"></i> Nom de Zone</th>
                                        <th><i class="fas fa-list-ul"></i> Nom de Hub</th>
                                         <th><i class="fas fa-credit-card"></i> Comission livreur </th>
                                        <th class="text-center"><i class="fas fa-globe"></i> Nombre Commune</th>
                                        <th class="text-center" ><i class="fas fa-chalkboard-teacher"></i> Nombre livreur</th>
                                          <th class="text-center" ><i class="fas fa-list-alt"></i> liste des communes</th>
                                          <th class="text-center" ><i class="fas fa-list-alt"></i> liste des livreurs</th>
                         
                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" zone  in zones.data" :key="zone.id_zone"  >
                                        <td scope="row"> {{ zone.id_zone}}</td>
                                        <td class="text-center" >  {{ zone.field_zone}}  </td>
                                        <td class="text-center" >  {{ zone.nom_hub}}  </td>
                                        <td class="text-center">   {{ zone.pricing}} DA  </td>
                                        <td class="text-center" ><span class="pcoded-badge label label-info">{{ zone.communs_count }}</span> </td>
                                        <td class="text-center" ><span class="pcoded-badge label label-primary">{{ zone.users_count }}</span> </td>
                                        <td class="text-center" ><a :href="'/admin/zonecommunes/'+zone.id_zone" class="btn btn-primary shadow-1 btn-sm" > <i class="fas fa-list-alt"></i> liste des communes <i class="fas fa-map-signs"></i> </a></td>
                                                                                                                                                                <td class="text-center" ><a :href="'/admin/zonedelivers/'+zone.id_zone" class="btn btn-danger shadow-1 btn-sm" > <i class="fas fa-list-alt"></i> liste des livreurs <i class="fas fa-shipping-fast"></i> </a></td>
                            

                                        <td class="text-center" > <button data-toggle="modal" data-target="#Modaleditzone" @click="GetZone(zone.field_zone,zone.id_zone)"   class="btn btn-sm  shadow-1 btn-info"><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button data-toggle="modal" data-target="#Modaldelzone"  @click="GetZone(zone.field_zone,zone.id_zone)"   class="btn btn-sm  shadow-1 btn-danger " ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                              
                                  
                                </tbody>
                            </table>

                                <zone-add @zone-added="getZones"></zone-add>
                                <zone-edit v-bind:ShowZone="ShowZone"  @zone-edited="getZones" > </zone-edit>
                                <zone-delete v-bind:ShowZone="ShowZone"  @zone-deleted="getZones" > </zone-delete>
                                <pagination :data="zones" @pagination-change-page="getZones">  </pagination>
                                     </div>

                                  
</template>


<script>
import ZoneAdd from './ZoneAdd.vue';
import ZoneEdit from './ZoneEdit.vue';
import ZoneDel from './ZoneDel.vue';
import VoerroTagsInput from '@voerro/vue-tagsinput';

  export default {
 components: {
    
   'zone-add'    :  ZoneAdd,
   'zone-edit'   :  ZoneEdit,
   'zone-delete':  ZoneDel,
   'tags-input' : VoerroTagsInput
  },
 

     data(){
 return {
  
  zones: {},
  ShowZone: {
field : '',
idzone : ''

  },
 
   
    };
     },
 created ()
 {

this.getZones() ; 




 },
   mounted() {

   
        },
 methods:{
  
 getZones(page = 1)
 {


     axios.get('/api/zones?page='+ page)
     .then(response =>
     { 
       
     this.zones = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
 GetZone(field,idzone){

this.ShowZone.field = field ;

this.ShowZone.idzone = idzone;

 }
   
     



 },
 


     }

      


</script>