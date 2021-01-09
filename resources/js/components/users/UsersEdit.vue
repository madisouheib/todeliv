<template>
    

    
  
                <div id="ModalEditUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier l'utilisateur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="usern">Nom d'utilisateur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tie"></i> </span>
                                        </div>
                                
                                        
                                        <input type="text" class="form-control"  id="usern" placeholder="Nom d'utilisateur " v-model="ShowUser.name" aria-describedby="inputGroupPrepend" required>


                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomprenom">Nom & prenom  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-address-card"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  v-model="ShowUser.full_name"  id="nomprenom" placeholder="Nom d'utilisateur " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailing">Email : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-envelope"></i> </span>
                                        </div>
                                        <input type="email" class="form-control" v-model="ShowUser.email" id="emailing" placeholder="Email " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a Email.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ntel">N-tel : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="number" class="form-control" v-model="ShowUser.phone" id="ntel" placeholder="Numéro de telephone " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a phone.
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="ntel">N-tel  Service Client : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="number" class="form-control" v-model="ShowUser.service_client" id="ntel" placeholder="Numéro de telephone " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a phone.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="typeuser">Type de utilisateur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="typeuser"> <i class="fas fa-id-card-alt"></i> </span>
                                        </div>
  <select class="custom-select" required v-model="ShowUser.role_id">


          <option  v-for="role in roles " :key="role.id"  :value="role.id" > {{ role.name  }} </option>
  
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a type.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustomUsername">Hub : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-sitemap"></i> </span>
                                        </div>
  <select class="custom-select" required v-model="ShowUser.id_hub" >
    <option value="">Selectionner le Hub</option>


    <option  v-for="hub in hubs " :key="hub.id_hub"  :value="hub.id_hub" >{{hub.nom_hub }} </option>

    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a Hub .
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomUsername">Adresse : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                                        <input type="text"  v-model="ShowUser.adresse" class="form-control" id="validationCustomUsername" placeholder="Adresse " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a adresse.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button  @click="user_edit()" data-dismiss="modal"  type="button" class="btn btn-success">Sauvgarder <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

</template>

<script>
  
     
    export default {
     props:['ShowUser'],
data(){
    return {

roles:{},
hubs: {}
    }
},
created ()
 {



this.getRoles() ; 
this.getHubs();

 },
methods: {

    getRoles(page  = 1 ){


     axios.get('/api/getprofiles?page='+ page)
     .then(response =>
     { 
       
      this.roles = response.data
     
 }
     ).catch(err => console.log(err));

    },

user_edit(){

    console.log('type : '+ this.ShowUser.id_hub);

axios.patch('/api/edituser', {
name: this.ShowUser.name,
email : this.ShowUser.email,
username  : this.ShowUser.full_name,
iduser : this.ShowUser.id,
adresse : this.ShowUser.adresse,
role:this.ShowUser.role_id,
phone:this.ShowUser.phone,
service_client:this.ShowUser.service_client,
hub : this.ShowUser.id_hub


}).then(resposne=>this.$emit('users-edited',resposne)).catch(error => console.log(error))


},
 getHubs()
 {


     axios.get('/api/huball')
     .then(response =>
     { 
       
     this.hubs = response.data
     //console.log(response.data)
     
 }
     )
     .catch(err => console.log(err));

 }


},
           mounted() {

        }
    }


</script>