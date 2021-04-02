<template>
    
     
                <div id="ModalRetour" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> <i class="fas fa-boxes"> </i> Validation par fiche  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p style="font-weight:bold; text-align:center;font-size:16px;color:red;" ><b>  Vous etes sure de basculer tous les colis vers le retour : </b>     </p>


</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success"    data-dismiss="modal"   @click="validation()"  >Transfert  <i class="fas fa-check-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>


<script>
export default {
    props:['userid']  ,
    methods : {


validation(){


axios.patch('/api/transversretour/'+this.userid).then(resposne=>this.$emit('trasn-retour',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');


}



    }  ,

    
    mounted(){


    }


}
</script>