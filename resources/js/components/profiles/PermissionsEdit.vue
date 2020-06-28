 <template>
                <div id="Modaleditpermissions" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier Permission</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nomwi">Name Permission : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input v-model="ShowPer.name"  type="text" class="form-control" name="name"  id="nomwilaya" placeholder="name of permission .. "  required>
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>
                  
                          
                                   <div class="form-group">
                                    <label for="nomwi"> Guard Permission  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas  fa-user-lock"></i> </span>
                                        </div>
                                        <input  type="text"  v-model="ShowPer.guard_name"   class="form-control" name="guard"  id="nomwilaya" placeholder="Gaurd of permission ..  "  required>
                                        <div class="invalid-feedback">
                                            Please choose a wilaya.
                                        </div>
                                    </div>
                                </div>
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" @click="updatePermission"  class="btn btn-primary" data-dismiss="modal" >Modifier <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                </template>

<script>
export default {
    props:['ShowPer']  ,

    
    methods : {
getPermission(page = 1)
 {


     axios.get('/api/getpermission?page='+ page)
     .then(response =>
     { 
       
      this.permission = response.data
     
 }
     ).catch(err => console.log(err));

 },
  updatePermission(){
axios.patch('/api/editpermission/'+ this.ShowPer.id, {
name: this.ShowPer.name,
guard: this.ShowPer.guard_name


}).then(
resposne=>this.$emit('permissions-edit',resposne)


).catch(error => console.log(error))
    $('.toast-success').toast('show');

}

    }  


}
</script>