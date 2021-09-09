<template>
    
</template><template>
                <div id="Modaleditzone" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modification de la  zone</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                <div class="form-group">
                                    <label for="namewilaya">Nom de la zone : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="namewilaya"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" onfocus="this.value=''"  name="namezone" required v-model="ShowZone.field" id="namewilaya" placeholder="Nom de la zone " aria-describedby="inputGroupPrepend" >
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>
                                   <div class="form-group">
                                    <label for="namewilaya">Comission livreur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="namewilaya"> <i class="fas fa-credit-card"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" onfocus="this.value=''"  name="namezone" required v-model="ShowZone.pricing" id="namewilaya" placeholder="Comission livreur ..  " aria-describedby="inputGroupPrepend" >
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>



                              

                                </form>
                  
                          
                        
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="zone_edit()" data-dismiss="modal" >Modifier <i class="fas fa-edit"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </template>
<script>
  
     
    export default {
       props:['ShowZone']  ,
data(){
    return {



namezone :'',
hubid:'',
hubs :{}

    }
},
 created ()
 {






 },
methods: {

zone_edit(){
axios.patch('/api/editzone', {
idzone: this.ShowZone.idzone,
field : this.ShowZone.field,
comission : this.ShowZone.pricing



}).then(resposne=>this.$emit('zone-edited',resposne)).catch(error => console.log(error))


}


},
           mounted() {
            console.log('Component mounted.')
        }
    }


</script>