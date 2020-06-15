<template>
    
<div>
<table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="fas fa-user-circle"></i> Nom d'utilisateur</th>
                                        <th><i class="fas fa-envelope"></i> Email</th>
                                        <th><i class="fas fa-id-card-alt"></i> Profile</th>
                                        <th><i class="fas fa-plus-circle"></i> Plus </th>

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user,index)  in users.data" :key="index">
                                        <th scope="row"> {{  user.id }} </th>
                                        <td>{{  user.name}} </td>
                                        <td>{{  user.email}} </td>
                                        <td>{{  user.name}} </td>
                                        <td><button data-toggle="modal" data-target="#Modalinfo" class="btn btn-square  btn-primary " ><i style="margin:0px;"  class=" fas fa-plus-circle"></i></button></td>
                                        <td class="text-center" > <button data-toggle="modal" data-target="#Modaledituser"  class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button data-toggle="modal" data-target="#Modaldelete"  class="btn btn-square  btn-danger " ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                           
                                    
                                   
                                </tbody>
                            </table>
                            <users-add></users-add>

</div>
</template>

<script>
  import UsersAdd from './UsersAdd.vue';
  export default {

 components: {
       'users-add' : UsersAdd  

  },
 
     data(){


         
 return {

users : {}

 }
  },
 created ()
 {

this.getUsers() ; 


 }, 
 methods:{
 getUsers()
 {


     axios.get('/api/users')
     .then(response =>
     { 
        
     this.users = response.data
     
 }
     )
     .catch(err => console.log(err));

 }

 }


     }

      


</script>