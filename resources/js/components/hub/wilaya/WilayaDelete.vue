<template>
     
       
                <div id="Modaldelwilaya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Suppression de wilaya</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p> a ce vous-etes sure de supprimer wilaya de <h5 v-text="ShoWilaya.nom_wilaya"> </h5>   </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" @click="deleteWilaya"    data-dismiss="modal"   class="btn btn-danger">Supprimer  <i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
</template>



<script>
export default {
    props:['ShoWilaya']  ,

    methods : {

  deleteWilaya(){
axios.delete('/api/deletewilaya/'+ this.ShoWilaya.id_wilaya).then(resposne =>this.$emit('wilaya-delete',resposne)


).catch(error => console.log(error))
    $('.toast-danger').toast('show');

}

    }  ,


}
</script>