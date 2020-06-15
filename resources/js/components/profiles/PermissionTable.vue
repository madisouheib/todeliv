<template>
    
   <div class="card-block table-border-style">
       <div> 
<div v-if="seen" id="hide">
<div class="alert alert-success" role="alert">
Your Permission added Successfly
</div>
</div>
<div v-if="del" id="hide">
<div class="alert alert-danger" role="alert">
Your Permission deleted Successfly
</div>
</div>
<div style="margin-bottom:2%;">


<div class="row">    
    <div class="col-4">
        <label> Name of permission :  </label>
<input type="text" name="name"  v-model="name" class="form-control" placeholder="please type the name ... "></div>
    <div class="col-4">
        <label> guard of permission :  </label>
<input type="text" v-model="guard" name="guard" class="form-control" placeholder="please type the guard ... "></div>
<div class="col-4">
<button class="btn btn-info" @click="addpermission"> ADD Permission <i class="fas fa-lock"></i> </button>
</div>
 </div>
</div>


       </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="fas fa-user-circle"></i> Name</th>
                                        <th><i class="fas fa-users"></i>Guard name  </th>
                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" permissions  in permission " :key="permissions.id"  >
                                        <th scope="row">{{ permissions.id}}</th>
                                        <td> {{ permissions.name }} </td>
                   
                                      <td> {{ permissions.guard_name }} </td>

                                        <td class="text-center" > <button data-toggle="modal" data-target="#Modalprofileedit"  class="btn   btn-square   btn-info"><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button  class="btn btn-square  btn-danger " @click="deletePermission(permissions.id)" ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                  
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>



</template>



<script>



  export default {
 components: {
    

  },
 

     data(){
 return {
  
 permission: {},
 name:'',
 guard : '',
 id:'',
 seen : false ,
 del: false
   
    };
     },
 created ()
 {

this.getPermission() ; 




 },
   mounted() {

   
        },
 methods:{
  
 getPermission(page = 1)
 {


     axios.get('/api/getpermission?page='+ page)
     .then(response =>
     { 
       
      this.permission = response.data
     
 }
     ).catch(err => console.log(err));

 },
 addpermission(){
 
axios.post('/api/addpermission', {
name: this.name, 
guard: this.guard 



}).then(
 
res => { 

this.seen = true ;
this.getPermission()


}


  
  // method call to method2 
   ).catch(error => console.log(error))


},
deletePermission(id){
axios.delete('/api/deletepermission/'+ id).then(res => { 

this.del = true ;
this.getPermission()


}


).catch(error => console.log(error))
    $('.toast-danger').toast('show');

}


 },
 


     }

      


</script>