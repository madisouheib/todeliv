<template>
    
<div>
   

<table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center"><i class="fas fa-user-circle"></i> Nom d'utilisateur</th>
                                        <th class="text-center" ><i class="fas fa-envelope"></i> Email</th>
                                        <th class="text-center" ><i class="fas fa-id-card-alt"></i> Profile</th>
                                        <th class="text-center" ><i class="fas fa-plus-circle"></i> Plus </th>

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user,index)  in users.data" :key="index">
                                        <td  class="text-center" scope="row"> {{  user.id }} </td>
                                        <td class="text-center" >{{  user.name}} </td>
                                        <td class="text-center">{{  user.email}} </td>
                                        <td class="text-center" >{{  user.field_name }} </td>
                                        <td class="text-center" ><button data-toggle="modal" data-target="#Modalinfo" class="btn shadow-1  btn-sm   btn-primary " @click="getUser(user.id)"  ><i style="margin:0px;"  class=" fas fa-plus-circle"></i></button>
                                    </td>
                                        <td v-if="user.id !== 3" class="text-center" > <button data-toggle="modal" @click="getUser(user.id)"  data-target="#ModalEditUser"   class="btn btn-sm  shadow-1   btn-info"><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button  data-toggle="modal" data-target="#Modaldelete"  @click="getUserDel(user.id)"   class="btn shadow-1 btn-sm   btn-danger " ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                            <button  data-toggle="modal" data-target="#ModalEditPass" @click="getUser(user.id)"   class="btn shadow-1 btn-sm btn-warning "> <i style="margin:0px;"   class="fas fa-lock"></i></button>
                                        </td>
                                    </tr>
                           
                                    
                                   
                                </tbody>
                            </table>
         
                            <users-add @users-added="getUsers" v-bind:myhub="hub_id"  ></users-add>
                              <users-delete  v-bind:ShowUser="ShowUser"  @users-delete="getUsers"></users-delete>  
<view-user v-bind:ShowUser="ShowUser"   ></view-user>
<users-pass @users-edited="getUsers" v-bind:ShowUser="ShowUser" ></users-pass>
<users-edit @users-edited="getUsers" v-bind:ShowUser="ShowUser">  </users-edit>
                       <pagination :data="users" @pagination-change-page="getUsers">

    </pagination>

</div>
</template>

<script>
    import UsersAdd from './add_deliver.vue';
    import UserPass from './ChangePasswordUser.vue';
    import UsersEdit from './UsersEdit.vue';
    import ViewUser from './ViewUser.vue';
    import UsersDelete from './UsersDelete.vue';
  export default {
 props: ['hub_id'],
 components: {
       'users-add'  : UsersAdd,
       'view-user'  :   ViewUser,
       'users-delete': UsersDelete,
       'users-edit': UsersEdit ,
       'users-pass': UserPass

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



 }, 
 methods:{
 getUsers(page = 1)
 {


     axios.get('/api/delivers?page='+page)
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