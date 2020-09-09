<template>
    
     
                <div id="ModalValidByGp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Validation  Groupé</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p> a ce vous-etes sure de valider   ? </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success"    data-dismiss="modal"   @click="validation_cash_gp()"  >Valider  <i class="fas fa-check-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>


<script>
export default {
    props:['colisvalidgp']  ,
    methods : {


validation_cash_gp(){

console.log(this.colisvalidgp.idliv);

axios.patch('/api/cashbygp/',{

idliv: this.colisvalidgp.idliv,
userid: this.colisvalidgp.iduser

}).then(resposne=>this.$emit('colis-edit',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');


}



    }  ,

    
    mounted(){




    }


}
</script>