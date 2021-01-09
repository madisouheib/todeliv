<template>
    

    
  
                <div id="ModalEditPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modification de Mot De passe </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="usern">Code Pin  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-fingerprint"></i> </span>
                                        </div>
                                
                                        
                                        <input type="password" class="form-control"  id="usern" placeholder="veuillez saisir le code pin " v-model="passkey" aria-describedby="inputGroupPrepend" required>


                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                          <div class="form-group">
                                    <label for="usern"> Password : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-lock"></i> </span>
                                        </div>
                                
                                        
                                        <input type="password" class="form-control"  id="usern" placeholder="veuillez saisir le nouveu mot de passe  " v-model="password" aria-describedby="inputGroupPrepend" required>


                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                             

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button  @click="user_pass_word()" data-dismiss="modal"  type="button" class="btn btn-warning btn-glow-warning">Modifier <i class="fas fa-save"></i></button>
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


passkey: '',
password: ''
    }
},
created ()
 {




 },
methods: {



user_pass_word(){



axios.patch('/api/editpassuser', {

    iduser : this.ShowUser.id ,
passkey: this.passkey,
password : this.password,



}).then(resposne=>this.$emit('users-edited',resposne)).catch(error => console.log(error))


}
 


},
           mounted() {

        }
    }


</script>