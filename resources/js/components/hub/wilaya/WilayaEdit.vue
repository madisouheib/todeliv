 <template>
                <div id="Modaleditwilaya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier la wialya</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nomwi">Nom de wilaya : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map"></i> </span>
                                        </div>
                                        <input v-model="ShoWilaya.nom_wilaya" type="text" class="form-control" name="nomwilaya"  id="nomwilaya" placeholder="Nom de la wilaya "  required>
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="nomwi">Matricule de wilaya : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-pin"></i> </span>
                                        </div>
                                        <input v-model="ShoWilaya.mat_wilaya" type="text" class="form-control" name="nomwilaya"  id="nomwilaya" placeholder="Nom de la wilaya "  required>
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>
                  
                          
                                
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" @click="updateWilaya" class="btn btn-primary" data-dismiss="modal" >Modifier <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                </template>

<script>
export default {
    props:['ShoWilaya']  ,
    methods : {

  updateWilaya(){
axios.patch('/api/editwilaya/'+ this.ShoWilaya.id_wilaya, {
name: this.ShoWilaya.nom_wilaya,
mat: this.ShoWilaya.mat_wilaya,



}).then(resposne=>this.$emit('wilaya-edit',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');

}

    }  


}
</script>