<template>
     
       
                <div id="MdalClotureManif" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Cloturé le Manifest </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p> a ce vous-etes sure de cloturé  le manifest de <h5 v-text="idcoms"> </h5>   </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" @click="ClotureManif"    data-dismiss="modal"   class="btn btn-success">Cloturé   <i class="fas fa-archive"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
</template>



<script>
export default {
    props:['idcoms']  ,

    methods : {

  ClotureManif(){

      
axios.patch('/api/cloturemanif/'+this.idcoms).then(resposne =>this.$emit('manif-cloture',resposne)


).catch(error => console.log(error))
    $('.toast-danger').toast('show');

}

    }  ,


}
</script>