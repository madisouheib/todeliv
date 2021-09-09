<template>
                <div id="ModalAddZone" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter  une zone</h5>
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
                                        <input type="text" class="form-control" onfocus="this.value=''"  name="namezone" required v-model="namezone" id="namewilaya" placeholder="Nom de la zone " aria-describedby="inputGroupPrepend" >
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>

         <div class="form-group">
                                    <label for="namewilaya"> Commission livreur : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="namewilaya"> <i class="fas fa-credit-card "></i> </span>
                                        </div>
                                        <input type="text" class="form-control" onfocus="this.value=''"  name="comission" required v-model="comission" id="namewilaya" placeholder="comission livreur ..  " aria-describedby="inputGroupPrepend" >
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>

   <div class="form-group">
                                    <label for="Adressehub"> Selectionner le hub    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
  <select class="custom-select" name="" required v-model="hubid">
    <option       v-for="hub in hubs " :key="hub.id_hub"  :value="hub.id_hub "  > {{ hub.nom_hub}}   </option>
    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>

                              

                                </form>
                  
                          
                        
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="zone_add()" data-dismiss="modal" >Ajouter <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </template>
<script>
  
     
    export default {
     
data(){
    return {



namezone :'',
hubid:'',
hubs :{},
comission :''

    }
},
 created ()
 {

this.get_hubs() ; 




 },
methods: {

zone_add(){
axios.post('/api/addzone', {
hub: this.hubid,
field : this.namezone,
comission : this.comission



}).then(resposne=>this.$emit('zone-added',resposne)).catch(error => console.log(error))


},
get_hubs(){
axios.get('/api/huball').then(resposne=> this.hubs = resposne.data).catch(error => console.log(error))


}


},
           mounted() {
            console.log('Component mounted.')
        }
    }


</script>