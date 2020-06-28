<template>
    

    
  
                <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un utilisateur</h5>
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
                                    <label for="typeuser">Type de utilisateur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="typeuser"> <i class="fas fa-id-card-alt"></i> </span>
                                        </div>
  <select class="custom-select" required v-model="role">

        <option value="">Selectionner le role</option>
          <option v-for="role in roles " :key="role.id"  :value="role.name " > {{ role.name  }} </option>
  
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
  <select class="custom-select" required v-model="hubi" >
    <option value="">Selectionner le Hub</option>


    <option  v-for="hub in hubs " :key="hub.id_hub"  :value=" hub.id_hub " >{{hub.nom_hub }} </option>

    
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
hub :{},
hubi :'',

role :''
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

user_add(){
axios.post('/api/adduser', {
name: this.name,
email : this.email,
username  : this.username,
password : this.password , 
adresse : this.adresse,
role:this.role,
phone:this.phone,
hub : this.hubi


}).then(resposne=>this.$emit('users-added',resposne)).catch(error => console.log(error))


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
            console.log('Component mounted.')
        }
    }


</script>