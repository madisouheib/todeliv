<template>
    
 
                <div id="Modaldelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Suppression d'utilisateur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p> a ce vous-etes sure de supprimer cet utilistaeur  ? <h5 v-text="ShowUser.full_name"> </h5> </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" @click="deleteUser()" >Supprimmer  <i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


</template>



<script>
export default {
    props:['ShowUser']  ,

    methods : {

  deleteUser(){
axios.delete('/api/deleteuser/'+ this.ShowUser.id).then(resposne =>this.$emit('users-delete',resposne)


).catch(error => console.log(error))
    $('.toast-danger').toast('show');

}

    }  ,


}
</script>


