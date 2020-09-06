<template>
    
     
                <div id="ModalValidFiche" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> <i class="fas fa-boxes"> </i> Validation </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p style="font-weight:bold; text-align:center;font-size:16px;color:red;" > Vous etes sure de valider les feuilles de route de :     </p>
                                <h4 class="text-center"> {{ id_liv.name }} <i class="fas fa-id-card-alt"></i> </h4>
<h5 class="text-center"> Montant Total Encaissé  : </h5>
<div class="text-center">
<label class="badge badge-success " style="padding:2%;font-size:18px;"> <i class="fas fa-money-bill"></i> {{id_liv.prices }} DA   </label>
                            </div></div>
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
    props:['id_liv']  ,
    methods : {


validation(){

axios.patch('/api/validelivery/',{idliv: this.id_liv.id }).then(resposne=>this.$emit('fiche-edited',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');


}



    }  ,

    
    mounted(){
console.log(this.id_liv);

    }


}
</script>