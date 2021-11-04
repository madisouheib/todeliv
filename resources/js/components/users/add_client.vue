<template>
    

    
  
                <div id="AddClient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="usern">Nom d'utilisateur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tie"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" id="usern" placeholder="Nom d'utilisateur " v-model="username" aria-describedby="inputGroupPrepend" required>
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
                                        <input type="text" class="form-control"  v-model="name"  id="nomprenom" placeholder="Nom d'utilisateur " aria-describedby="inputGroupPrepend" required>
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
                                        <input type="email" class="form-control" v-model="email" id="emailing" placeholder="Email " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a Email.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passw">Mot de passe : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input type="password" class="form-control" v-model="password" id="passw" placeholder="Mot de passe " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a password.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ntel">N-tel : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="number" class="form-control" v-model="phone" id="ntel" placeholder="Numéro de telephone " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a phone.
                                        </div>
                                    </div>
                                </div>
                               

                                <div class="form-group">
                                    <label for="validationCustomUsername">Adresse : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                                        <input type="text"  v-model="adresse" class="form-control" id="validationCustomUsername" placeholder="Adresse " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a adresse.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button  @click="user_add()" data-dismiss="modal"  type="button" class="btn btn-success">Sauvgarder <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

</template>

<script>
  
     
    export default {
     props : ['myhub'],
data(){
    return {

roles:{},
username:'',
password:'',
email:'',
phone: '',
hubs : {},
adresse : '',
name: '',

hubi :'',

    }
},
created ()
 {

console.log(this.myhub)




 },
methods: {

   

user_add(){
axios.post('/api/addclient', {
name: this.name,
email : this.email,
username  : this.username,
password : this.password , 
adresse : this.adresse,
phone:this.phone,
hub : this.myhub


}).then(resposne=>this.$emit('users-added',resposne)).catch(error => console.log(error))


}


}
      
    }


</script>