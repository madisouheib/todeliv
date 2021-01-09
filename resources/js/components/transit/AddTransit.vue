<template>
    
<div>

 
                <div id="ModaladdTR" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">






                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> <i class="fas fa-sitemap"></i> Ajoter un transit  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <label>   ID TRANSIT : </label>
                             
                                <span class="pcoded-badge label label-info">#transit-   <i class="fas fa-list"></i> </span>
                            
                                    <div class="form-group">
                                        <label for="validationCustomUsername"> De Hub : </label>
                                    <h4> -  {{ Show.nom_hub }} </h4>
                                    </div>
             
                                
                                    <div class="form-group">
                                        <label for="validationCustomUsername"> Vers HUB  : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                            </div>
                                <select v-model="tohub" class="custom-select" required>
                     
                                <option v-for="hub in hubs"  :value="hub.id_hub" :key="hub.id_hub"> {{ hub.nom_hub}}  </option>
                   
                                </select>
                                
                                          
                                            <div class="invalid-feedback">
                                                Please choose a type.
                                            </div>
                                        </div>
                                    </div>
                      
                                    <div class="form-group">
                                        <label for="validationCustomUsername"> Remarque  : </label>
                                        <textarea v-model="field" class="form-control"></textarea>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="add_transit()">Ajouter   <i class="fas fa-sitemap"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


</div>

</template>

<script>
export default {
    props:['Show'],



    data() {
return{

hubs : {},
tohub : '',
field :''


}


    },
    created(){

this.list_hubs();

    },
    methods: {


list_hubs(){

axios.get('/api/huball').then( response=> {

this.hubs = response.data



}).catch(err => console.log(err))


},
add_transit(){


 
axios.post('/api/addtransit', {
vers_hub: this.tohub, 
de_hub : this.Show.hub_id ,
field : this.field,
idcord : this.Show.id

}).then(
 
  resposne=>location.reload() 
  
  // method call to method2 
   ).catch(error => console.log(error))



}




    }






}
</script>