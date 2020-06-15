<template>
        
  
                <div id="Modalprofileadd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-lock"></i> Ajouter une permission</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
<label><i class="fas fa-address-card"></i>  titre de profile :  </label>
<input class="form-control" v-model="nameroles" type="text" placeholder="Nom de profile " >  

                                </div>


                                          

                                <div class="form-group">
                                    <label for="validationCustomUsername"><i class="fas fa-clipboard-check"></i> Espace Colis livrée: </label>
                               <div class="row">
<div class="col-3 " v-for=" permissions  in permission " :key="permissions.id"  >
                                <div class="">
                                    <input type="checkbox" :id="'lab-'+permissions.id"  :value="permissions.name"  v-model="name" >

                                </div>
                                <label> {{ permissions.name }}</label>
                            </div>




                            
                       
                               </div>




                               
                                </div>





                    
                           

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="add_roles()">Sauvgarder <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>


<script>
  
     
    export default {
     
data(){
    return {



nameroles :'',

permission : {



},
 name:[
 ]

    }
},
created ()
 {

     this.getPermission();
 }
,
methods: {
   getPermission(page = 1)
 {


     axios.get('/api/getpermission?page='+ page)
     .then(response =>
     { 
       
      this.permission = response.data
     
 }
     ).catch(err => console.log(err));

 },
    GetVal()
 {

console.log(this.name  );
console.log(this.nameroles);

 }
 
 
 ,

add_roles(){
axios.post('/api/addroles', {
name: this.nameroles ,
permissions : this.name 
 
}).then(resposne=>location.reload() ).catch(error => console.log(error))


},
  
 getRoles(page = 1)
 {


     axios.get('/api/getprofiles?page='+ page)
     .then(response =>
     { 
       
      this.profiles = response.data
     
 }
     ).catch(err => console.log(err));

 }


},
           mounted() {
            console.log('Component mounted.')
        }
    }


</script>