<template>
    
<div>
     <div class="form-group col-3" >
                       
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tag"></i> </span>
                                </div>
                    <select class="custom-select" @change="getFetchUsers($event)" v-model="idrole" required>
                  <option  selected> tout les profiles</option>
            
                    <option  v-for=" role  in roles " :key="role.id"  :value="role.id"> {{  role.name }}  </option>
          
                    </select>
                                 <div class="invalid-feedback">
                                    Please choose a type.
                                </div>
                            </div>
                        </div>

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
                                        <td><button data-toggle="modal" data-target="#Modalinfo" class="btn btn-square  btn-primary " @click="getUser(user.id)"  ><i style="margin:0px;"  class=" fas fa-plus-circle"></i></button></td>
                                        <td v-if="user.id !== 3" class="text-center" > <button data-toggle="modal" data-target="#Modaledituser"   class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button  data-toggle="modal" data-target="#Modaldelete"  @click="getUserDel(user.id)"   class="btn btn-square  btn-danger " ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                           
                                    
                                   
                                </tbody>
                            </table>
         
                            <users-add @users-added="getUsers" ></users-add>
                              <users-delete  v-bind:ShowUser="ShowUser"  @users-delete="getUsers"></users-delete>  
<view-user v-bind:ShowUser="ShowUser"   ></view-user>

                       <pagination :data="users" @pagination-change-page="getUsers">

    </pagination>

</div>
</template>

<script>
  import UsersAdd from './UsersAdd.vue';
    import ViewUser from './ViewUser.vue';
    import UsersDelete from './UsersDelete.vue';
  export default {

 components: {
       'users-add' : UsersAdd,
       'view-user':   ViewUser,
       'users-delete': UsersDelete

  },
 
     data(){


         
 return {

users : {},
roles : {},
idrole:'',
ShowUser: ''


 }
  },
 created ()
 {

this.getUsers() ; 
this.getRoles();
this.getUser();


 }, 
 methods:{
 getUsers(page = 1)
 {


     axios.get('/api/users?page='+ page)
     .then(response =>
     { 
        
     this.users = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
 getFetchUsers(event){


var val =  event.target.value ; 
if(val == 'all' ){

this.getUsers();
}else {
 axios.get('/api/fetchuser/'+ val )
     .then(response =>
     { 
        
     this.users = response.data
     
 }
     )
     .catch(err => console.log(err));



}
    

 }


 ,
 getRoles(){


     axios.get('/api/getprofiles')
     .then(response =>
     { 
        
     this.roles = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
 getUser(id){


     axios.get('/api/getuser/'+ id )
     .then(response =>
     { 
        
     this.ShowUser = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
 getUserDel(id){


     axios.get('/api/getuserdelete/'+ id )
     .then(response =>
     { 
        
     this.ShowUser = response.data
     
 }
     )
     .catch(err => console.log(err));

 }



 }


     }

      


</script>