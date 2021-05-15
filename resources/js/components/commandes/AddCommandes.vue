<template>
                <div id="ModaladdCom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter  Une Commande</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                <div class="form-group">
                                    <label for="namewilaya"> Raison Social  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="namewilaya"> <i class="fas fa-file-alt"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" onfocus="this.value=''"  name="namewilaya" required v-model="namecom" id="namewilaya" placeholder="Nom de la commandes " aria-describedby="inputGroupPrepend" >
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>


                         
                                </form>
                  
                          
                        
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="add_com" data-dismiss="modal" >Ajouter <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </template>


  <script>
  
     
    export default {
     props: ['auth_user'],
data(){
    return {
namecom :'',
iduser:''
    }
},
created(){


},
methods: {

add_com(){
axios.post('/api/addcom', {
namecom: this.namecom,
idclient : this.auth_user

}).then(




location.reload()






).catch(error => console.log(error))


}



}
    }


</script>