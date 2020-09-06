<template>
    

     
                <div id="ModalDeleteColis" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Supprimer colis </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p> a  ce vous-etes sure de supprimer   ? </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-danger"  data-dismiss="modal" @click="deletecolis()">Signaler  <i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>



<script>
export default {
    props:['id_delivery']  ,
    methods : {


deletecolis(){

console.log(this.id_delivery);

axios.delete('/api/deletecolisfiche/'+this.id_delivery).then(resposne=>this.$emit('colis-deleted',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');


}



    }  ,

    
    mounted(){



    }


}
</script>