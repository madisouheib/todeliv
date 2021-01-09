<template>
<div>
    <hub-add>



    </hub-add>

  <table class="table">



                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="fas fa-map"></i> Nom de HUB</th>
                                        <th class="text-center"><i class="fas fa-globe"></i> Nombre wilayas</th>
                                        <th class="text-center" ><i class="fas fa-chalkboard-teacher"></i> Nombre utilisateurs</th>
                         
                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" hub  in hubs.data" :key="hub.id_hub"  >
                                        <th scope="row"> {{ hub.id_hub }}</th>
                                        <td> {{ hub.nom_hub }}  </td>
                                        <td class="text-center" ><span class="pcoded-badge label label-info">{{ hub.wilayas_count }}</span> </td>
                                        <td class="text-center" ><span class="pcoded-badge label label-primary">{{ hub.users_count }}</span> </td>
                            

                                        <td class="text-center" > <button data-toggle="modal" data-target="#Modaledithub" @click="GetHubId(hub.id_hub)"   class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button @click="del_hub(hub.id_hub)" class="btn btn-square  btn-danger " ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                              
                                  
                                </tbody>
                            </table>

                                <hub-add @hub-added="getHubs"></hub-add>
                                     <hub-edit v-bind:ShowHub="ShowHub"  @hub-edit="getHubs" > </hub-edit>
                                <pagination :data="hubs" @pagination-change-page="getHubs">
                                        </pagination>
                                     </div>

                                  
</template>


<script>
import HubAdd from './HubAdd.vue';
import HubEdit from './HubEdit.vue';
import VoerroTagsInput from '@voerro/vue-tagsinput';

  export default {
 components: {
    
   'hub-add' :  HubAdd,
      'hub-edit' :  HubEdit,
   "tags-input": VoerroTagsInput
  },
 

     data(){
 return {
  
  hubs: {},
  wilayas :  {},
id_hub :'',
  ShowHub : ''
   
    };
     },
 created ()
 {

this.getHubs() ; 




 },
   mounted() {

   
        },
 methods:{
  
 getHubs(page = 1)
 {


     axios.get('/api/hub?page='+ page)
     .then(response =>
     { 
       
     this.hubs = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
   
          del_hub(id){


   axios.delete('/api/deletehub/'+id)
     .then(res => { 


this.getHubs();


}
     ).catch(err => console.log(err));
     
 },
 GetHubId(id_hub){

   axios.get('/api/showhub/'+ id_hub)
     .then(response => this.ShowHub = response.data)
     .catch(err => console.log(err));





 }


 },
 


     }

      


</script>