<template>
    
     
                <div id="ModalValidFiche" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Validation </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p> a ce vous-etes sure de valider   ? </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success"    data-dismiss="modal"   @click="validation()"  >Valider  <i class="fas fa-check-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>


<script>
export default {
    props:['id_fiche']  ,
    methods : {


validation(){
console.log(this.id_fiche)
axios.patch('/api/invalidfiche/',{idfiche: this.id_fiche }).then(resposne=>this.$emit('fiche-edited',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');


}



    }  ,

    
    mounted(){


    }


}
</script>