<template>
    
   <div class="card-block table-border-style">
       <div> 



       </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="fas fa-user-circle"></i> Nom de profile</th>
                                        <th><i class="fas fa-users"></i>Nombre d'utilisateurs  </th>
                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" profile  in profiles " :key="profile.id"  >
                                        <th scope="row">{{ profile.id}}</th>
                                        <td> {{ profile.name }} </td>
                                        <td><span class="badge badge-info label label-info"> 30</span></td>
                            

                                        <td class="text-center" > <button data-toggle="modal" data-target="#Modalprofileedit"  class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button  @click="del_role(profile.id)"  class="btn btn-square  btn-danger " ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                  
                                  
                                </tbody>
                            </table>
                            <profiles-add></profiles-add>
                        </div>
                    </div>



</template>



<script>

import ProfilesAdd from './ProfilesAdd.vue';

  export default {
   
 components: {
       'profiles-add' : ProfilesAdd  

  },
 

     data(){
 return {
  
 profiles: {},
 name:'',
 guard : '',

   
    };
     },
 created ()
 {

this.getRoles() ; 




 },
   mounted() {

   
        },
 methods:{
  
 getRoles(page = 1)
 {


     axios.get('/api/getprofiles?page='+ page)
     .then(response =>
     { 
       
      this.profiles = response.data
     
 }
     ).catch(err => console.log(err));

 },
  del_role(id){


   axios.post('/api/delrole/'+id)
     .then(res => { 

console.log('hii succefly')
this.getRoles();


}
     ).catch(err => console.log(err));
     
 }



 },

 


     }

      


</script>